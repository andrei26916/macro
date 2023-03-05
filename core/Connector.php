<?php

namespace core;

final class Connector
{
    private static $_instance = null;

    private static $pdo = null;

    private function __construct()
    {
        $config = require_once '../config/database.php';

        try {
            self::$pdo = new \PDO($config['driver'].':host='.$config['connect'].';dbname='.$config['database'],
                $config['login'], $config['password']);
        } catch (\Exception $exception) {
            print "Database Error!: ".$exception->getMessage();
            die();
        }
    }

    private function __clone()
    {
        //
    }

    /**
     * @return PDO|null
     */
    public static function init()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$pdo;
    }

}