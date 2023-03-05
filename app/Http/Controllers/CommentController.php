<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Services\CommentService;
use core\Response;

class CommentController
{

    /**
     * @return string|void
     */
    public function create()
    {
        $data = (new CreateCommentRequest())->validated();

        return Response::created((new CommentService())->create($data));
    }

}