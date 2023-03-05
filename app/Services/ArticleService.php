<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Comment;
use core\DB;

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
    public function paginate(int $numberPage = 1, int $pageSize = 15)
    {
        $offset = ($numberPage - 1) * $pageSize;

        $articles = (new Article())->limit($pageSize, $offset)->get();

        foreach ($articles as $article){
            $article->comments = (new Comment())->where('article_id', $article->id)->orderBy('id', 'DESC')->limit(3)->get();
        }

        return $articles;
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