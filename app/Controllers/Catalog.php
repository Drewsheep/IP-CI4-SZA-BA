<?php

namespace App\Controllers;

use App\Models\AnimeModel;
use App\Models\GenreModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Catalog extends BaseController
{
    public function categories(?string $genreSlug = null): string
    {
        $genreModel = new GenreModel();
        $animeModel = new AnimeModel();

        $selectedGenre = null;
        if ($genreSlug !== null && $genreSlug !== '' && $genreSlug !== 'all') {
            $selectedGenre = $genreModel->findBySlug($genreSlug);

            if ($selectedGenre === null) {
                throw PageNotFoundException::forPageNotFound('A keresett kategória nem található.');
            }
        }

        $sort       = (string) ($this->request->getGet('sort') ?? 'title_asc');
        $allowed    = ['title_asc', 'views_desc', 'score_desc'];
        $sort       = in_array($sort, $allowed, true) ? $sort : 'title_asc';
        $page       = max(1, (int) ($this->request->getGet('page') ?? 1));
        $pagination = $animeModel->getCategoryPage($selectedGenre['slug'] ?? null, $sort, $page, 9);
        $page       = $pagination['page'];

        return $this->twig->render('templates/categories.twig', $this->withAuthData([
            'html_title'       => ($selectedGenre['name'] ?? 'Kategóriák') . ' animék',
            'html_description' => 'Anime lista kategóriák és műfajok szerint rendezve.',
            'selected_genre'   => $selectedGenre,
            'genres'           => $genreModel->getAllWithAnimeCounts(),
            'animes'           => $pagination['items'],
            'popular_animes'   => $animeModel->getPopular(5),
            'sort'             => $sort,
            'sort_options'     => [
                'title_asc'  => 'A-Z',
                'views_desc' => 'Legnézettebb',
                'score_desc' => 'Legjobb score',
            ],
            'pagination'       => [
                'page'        => $page,
                'total_pages' => $pagination['totalPages'],
                'has_prev'    => $pagination['hasPrevious'],
                'has_next'    => $pagination['hasNext'],
                'pages'       => range(1, $pagination['totalPages']),
            ],
            'base_category_url' => $selectedGenre !== null ? '/categories/' . $selectedGenre['slug'] . '/' : '/categories/',
        ]));
    }

    public function details(string $slug): string
    {
        $animeModel = new AnimeModel();
        $anime      = $animeModel->findBySlug($slug);

        if ($anime === null) {
            throw PageNotFoundException::forPageNotFound('A keresett anime nem található.');
        }

        $genres       = $animeModel->getGenresForAnime((int) $anime['id']);
        $genreIds     = array_map(static fn(array $genre): int => (int) $genre['id'], $genres);
        $recommendations = $animeModel->getRecommendations((int) $anime['id'], $genreIds, 4);

        return $this->twig->render('templates/details.twig', $this->withAuthData([
            'html_title'       => $anime['title'],
            'html_description' => mb_strimwidth(strip_tags((string) ($anime['synopsis'] ?? 'Anime adatlap.')), 0, 155, '...'),
            'anime'            => $anime,
            'genres'           => $genres,
            'recommendations'  => $recommendations,
            'stars'            => $this->buildStars((float) ($anime['rating_avg'] ?? 0)),
        ]));
    }

    private function buildStars(float $rating): array
    {
        $normalized = max(0.0, min(5.0, $rating / 2));
        $stars      = [];

        for ($index = 1; $index <= 5; $index++) {
            if ($normalized >= $index) {
                $stars[] = 'full';
                continue;
            }

            if ($normalized >= $index - 0.5) {
                $stars[] = 'half';
                continue;
            }

            $stars[] = 'empty';
        }

        return $stars;
    }

    private function withAuthData(array $data): array
    {
        return array_merge($data, [
            'auth' => [
                'isLoggedIn' => session()->get('is_logged_in') === true,
                'user'       => [
                    'id'       => session()->get('user_id'),
                    'name'     => session()->get('user_name'),
                    'username' => session()->get('user_username'),
                    'email'    => session()->get('user_email'),
                ],
            ],
        ]);
    }
}
