<?php

use core\DB;
use core\Connector;
use core\Router;

define('ROOT', dirname(__DIR__));

require_once ROOT . '/core/Response.php';

require_once ROOT . '/core/Router.php';

require_once ROOT . '/routes/web.php';

require_once ROOT . '/core/Connector.php';

require_once ROOT . '/core/DB.php';


Router::start();
