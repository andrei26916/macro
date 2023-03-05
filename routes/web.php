<?php

use core\Router;

Router::get('/', [\App\Http\Controllers\Controller::class, 'index']);