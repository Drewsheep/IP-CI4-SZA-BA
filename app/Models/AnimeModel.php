<?php

namespace App\Models;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model;

class AnimeModel extends Model
{
    protected $table            = 'animes';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'title',
        'slug',
        'original_title',
        'synopsis',
        'poster_image',
        'type',
        'status',
        'studio',
        'aired_from',
        'aired_to',
        'duration',
        'quality',
        'episode_current',
        'episode_total',
        'views_count',
        'comments_count',
        'score',
        'score_count',
        'rating_avg',
        'rating_count',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getCategoryPage(?string $genreSlug, string $sort, int $page, int $perPage = 9): array
    {
        $totalBuilder = $this->createListingBuilder($genreSlug);
        $total        = (int) $totalBuilder->select('animes.id')->distinct()->countAllResults();
        $totalPages   = max(1, (int) ceil($total / $perPage));
        $page         = min(max(1, $page), $totalPages);
        $offset       = ($page - 1) * $perPage;

        $builder = $this->createListingBuilder($genreSlug);
        $builder->select('animes.*')->distinct();
        $this->applySort($builder, $sort);

        $items = $builder
            ->limit($perPage, $offset)
            ->get()
            ->getResultArray();

        return [
            'items'       => $items,
            'page'        => $page,
            'perPage'     => $perPage,
            'total'       => $total,
            'totalPages'  => $totalPages,
            'hasPrevious' => $page > 1,
            'hasNext'     => $page < $totalPages,
        ];
    }

    public function findBySlug(string $slug): ?array
    {
        $anime = $this->where('slug', $slug)->first();

        return is_array($anime) ? $anime : null;
    }

    public function getPopular(int $limit = 5): array
    {
        return $this->orderBy('views_count', 'DESC')
            ->orderBy('title', 'ASC')
            ->findAll($limit);
    }

    public function getGenresForAnime(int $animeId): array
    {
        return $this->db->table('genres')
            ->select('genres.id, genres.name, genres.slug')
            ->join('anime_genres', 'anime_genres.genre_id = genres.id')
            ->where('anime_genres.anime_id', $animeId)
            ->orderBy('genres.name', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getRecommendations(int $animeId, array $genreIds, int $limit = 4): array
    {
        $builder = $this->db->table('animes')
            ->select('animes.*')
            ->where('animes.id !=', $animeId);

        if ($genreIds !== []) {
            $builder->join('anime_genres', 'anime_genres.anime_id = animes.id')
                ->whereIn('anime_genres.genre_id', $genreIds)
                ->groupBy('animes.id')
                ->orderBy('COUNT(anime_genres.genre_id)', 'DESC', false);
        }

        return $builder
            ->orderBy('animes.views_count', 'DESC')
            ->orderBy('animes.title', 'ASC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    private function createListingBuilder(?string $genreSlug): BaseBuilder
    {
        $builder = $this->db->table('animes');

        if ($genreSlug !== null && $genreSlug !== '') {
            $builder->join('anime_genres', 'anime_genres.anime_id = animes.id')
                ->join('genres', 'genres.id = anime_genres.genre_id')
                ->where('genres.slug', $genreSlug);
        }

        return $builder;
    }

    private function applySort(BaseBuilder $builder, string $sort): void
    {
        switch ($sort) {
            case 'views_desc':
                $builder->orderBy('animes.views_count', 'DESC')
                    ->orderBy('animes.title', 'ASC');
                break;

            case 'score_desc':
                $builder->orderBy('animes.score', 'DESC')
                    ->orderBy('animes.title', 'ASC');
                break;

            case 'title_asc':
            default:
                $builder->orderBy('animes.title', 'ASC');
                break;
        }
    }
}
