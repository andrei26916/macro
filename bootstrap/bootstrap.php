<?php

use core\DB;
use core\DbConnector;
use core\Router;

define('ROOT', dirname(__DIR__));

require_once ROOT . '/core/Response.php';

require_once ROOT . '/core/Router.php';

require_once ROOT . '/routes/web.php';

require_once ROOT . '/core/DbConnector.php';

Router::start();
