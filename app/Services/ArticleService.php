<?php

namespace App\Services;

use App\Models\Article;

class ArticleService
{
    /**
     * @param  int  $id
     * @return mixed
     */
    public function show(int $id)
    {
        return (new Article())->where('id', $id)->first();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return (new Article())->get();
    }

    /**
     * @param  array  $data
     * @return int
     */
    public function create(array $data): int
    {
        return (new Article())->insert($data);
    }

}