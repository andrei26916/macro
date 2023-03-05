<?php

namespace core;

interface RouteInterface
{
    public static function get($url, array $class);

    public static function post($url, array $class);

    public static function put($url, array $class);

    public static function delete($url, array $class);

}