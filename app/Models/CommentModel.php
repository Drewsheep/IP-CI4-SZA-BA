<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table            = 'comments';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'anime_id',
        'user_id',
        'body',
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getForAnime(int $animeId, int $limit = 20): array
    {
        return $this->db->table($this->table)
            ->select('comments.id, comments.anime_id, comments.user_id, comments.body, comments.created_at, users.name AS user_name, users.username AS user_username')
            ->join('users', 'users.id = comments.user_id')
            ->where('comments.anime_id', $animeId)
            ->orderBy('comments.created_at', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    public function countForAnime(int $animeId): int
    {
        return (int) $this->where('anime_id', $animeId)->countAllResults();
    }
}
