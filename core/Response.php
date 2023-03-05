<?php

namespace core;

class Response
{

    /**
     * @return void
     */
    public static function created($message = '')
    {
        header('HTTP/1.1 201 Created');
        header("Status: 401 Created");

        return $message;
    }

    public static function forbidden($message = '')
    {
        header('HTTP/1.1 403 Forbidden');
        header("Status: 403 Forbidden");

        return $message;
    }

    /**
     * @return void
     */
    public static function notFound()
    {
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");

        echo '404 Not Found';
    }

}