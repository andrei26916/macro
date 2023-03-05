<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\ShowArticleRequest;
use App\Services\ArticleService;
use core\Response;

class ArticleController
{
    /**
     * @return mixed
     */
    public function show()
    {
        $query = (new ShowArticleRequest())->validated();

        $response = (new ArticleService())->show($query['id']);

        if (!$response){
            Response::notFound();
        }

        return $response;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $page = 1;

        if (array_key_exists('page', $_GET)){
            if ((int)$_GET['page'] > 0){
                $page = $_GET['page'];
            }
        }

        return (new ArticleService())->paginate($page);
    }

    /**
     * @return string|void
     */
    public function create()
    {
        $query = (new CreateArticleRequest())->validated();

        return Response::created((new ArticleService())->create($query));
    }

}