<?php

use core\Router;

Router::get('/', [\App\Http\Controllers\Controller::class, 'index']);

Router::get('/article/', [\App\Http\Controllers\ArticleController::class, 'show']);

Router::post('/article', [\App\Http\Controllers\ArticleController::class, 'create']);

Router::post('/comment', [\App\Http\Controllers\CommentController::class, 'create']);

Router::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index']);