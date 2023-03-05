<?php

namespace App\Http\Requests;

use core\RequestValidator;

class ShowArticleRequest extends RequestValidator
{
    protected $fillable = ['id'];

}