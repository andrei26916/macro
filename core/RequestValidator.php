<?php

namespace core;

class RequestValidator
{
    protected $fillable = [];

    public function __construct()
    {
        $this->validate();
    }

    /**
     * @return void
     */
    private function validate()
    {
        $query = [];

        $parts = parse_url($_SERVER['REQUEST_URI']);

        if (array_key_exists('query', $parts)) {
            parse_str($parts['query'], $query);
        }

        $validator = new Validator($query);

        $validator->setFillable($this->fillable);

        if (!$validator->requred()){
            echo Response::forbidden($validator->getMessage());
            die();
        }
    }

}