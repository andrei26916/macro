<?php

use core\Router;

Router::get('/', [\App\Http\Controllers\Controller::class, 'index']);

Router::get('/article', [\App\Http\Controllers\ArticleController::class, 'show']);

Router::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index']);

Router::post('/article', [\App\Http\Controllers\ArticleController::class, 'create']);

Router::get('/comments', [\App\Http\Controllers\CommentController::class, 'index']);

Router::post('/comment', [\App\Http\Controllers\CommentController::class, 'create']);

