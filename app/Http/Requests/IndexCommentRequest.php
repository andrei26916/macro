<?php

namespace App\Http\Requests;

use core\RequestValidator;

class IndexCommentRequest extends RequestValidator
{
    protected $fillable = ['article_id'];

}