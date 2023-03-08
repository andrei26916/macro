<?php

namespace core;

require_once 'RouteInterface.php';

class Router implements RouteInterface
{
    private static $lists = [
        'GET' => [],
        'POST' => [],
        'DELETE' => []
    ];

    private static function add($url, $method, array $class)
    {
        self::$lists[$method] = array_merge(self::$lists[$method], [
            $url => [
                'class' => $class
            ]
        ]);
    }

    /**
     * @return false
     */
    private static function generate()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = explode('?', $_SERVER['REQUEST_URI']);
        $url = $url[0];

        if (array_key_exists($url, self::$lists[$method])){
            $class = self::$lists[$method][$url]['class'][0];

            $func = self::$lists[$method][$url]['class'][1];

            $response = (new $class)->$func();

            if (!is_null($response)) {
                echo json_encode($response);
            }

            return true;
        }

        return false;
    }

    /**
     * @return void
     */
    public static function start()
    {
        if (!self::generate()){
            Response::notFound();
        }
    }

    /**
     * @param $url
     * @param  array  $class
     * @return void
     */
    public static function get($url, array $class)
    {
        self::add($url, 'GET', $class);
    }

    /**
     * @param $url
     * @param  array  $class
     * @return void
     */
    public static function post($url, array $class)
    {
        self::add($url, 'POST', $class);
    }

    /**
     * @param $url
     * @param  array  $class
     * @return void
     */
    public static function put($url, array $class)
    {
        self::add($url, 'PUT', $class);
    }

    /**
     * @param $url
     * @param  array  $class
     * @return void
     */
    public static function delete($url, array $class)
    {
        self::add($url, 'DELETE', $class);
    }
}