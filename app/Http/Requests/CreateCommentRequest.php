<?php

namespace App\Http\Requests;

use App\Models\Article;
use core\RequestValidator;
use core\Response;

class CreateCommentRequest extends RequestValidator
{
    protected $fillable = [
        'article_id',
        'author_name',
        'description',
    ];

    /**
     * @return void
     */
    public function check()
    {
        parent::check();

        $data = $this->validated();

        if (!(new Article())->where('id', $data['article_id'])->select('id')->first()){
            echo Response::forbidden('article not found');
            die();
        }
    }


}