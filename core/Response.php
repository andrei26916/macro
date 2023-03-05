<?php

namespace core;

class Response
{
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