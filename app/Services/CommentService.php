<?php

namespace App\Services;

use App\Models\Comment;

class CommentService
{
    /**
     * @param  array  $data
     * @return int
     */
    public function create(array $data): int
    {
        return (new Comment())->insert($data);
    }

}