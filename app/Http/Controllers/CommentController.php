<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\IndexCommentRequest;
use App\Services\CommentService;
use core\Response;

class CommentController
{
    /**
     * @return mixed
     */
    public function index()
    {
        $data = (new IndexCommentRequest())->validated();

        return (new CommentService())->index($data['article_id']);
    }

    /**
     * @return string|void
     */
    public function create()
    {
        $data = (new CreateCommentRequest())->validated();

        return Response::created((new CommentService())->create($data));
    }

}