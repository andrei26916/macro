<?php

use core\DB;
use core\Connector;
use core\Router;
use core\Validator;

define('ROOT', dirname(__DIR__));

require_once ROOT . '/core/Response.php';

require_once ROOT . '/core/Router.php';

require_once ROOT . '/routes/web.php';

require_once ROOT . '/core/Connector.php';

require_once ROOT . '/core/DB.php';

require_once ROOT . '/core/Validator.php';

require_once ROOT . '/core/RequestValidator.php';

Router::start();
