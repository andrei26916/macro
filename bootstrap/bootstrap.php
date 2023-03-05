<?php

use core\Router;

define('ROOT', dirname(__DIR__));

require_once ROOT . '/core/Response.php';

require_once ROOT . '/core/Router.php';

require_once ROOT . '/routes/web.php';

Router::start();
