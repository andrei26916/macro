<?php

namespace App\Http\Requests;

use core\RequestValidator;

class CreateArticleRequest extends RequestValidator
{
    protected $fillable = [
        'author_name',
        'description',
    ];

}