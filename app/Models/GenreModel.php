<?php

namespace App\Models;

use CodeIgniter\Model;

class GenreModel extends Model
{
    protected $table            = 'genres';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'name',
        'slug',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function findBySlug(string $slug): ?array
    {
        $genre = $this->where('slug', $slug)->first();

        return is_array($genre) ? $genre : null;
    }

    public function getAllWithAnimeCounts(): array
    {
        return $this->db->table('genres')
            ->select('genres.id, genres.name, genres.slug, COUNT(anime_genres.id) AS anime_count')
            ->join('anime_genres', 'anime_genres.genre_id = genres.id', 'left')
            ->groupBy('genres.id')
            ->orderBy('genres.name', 'ASC')
            ->get()
            ->getResultArray();
    }
}
