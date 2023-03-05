<?php

namespace core;

class RequestValidator
{
    protected $fillable = [];

    private $query = [];

    public function __construct()
    {
        $this->check();
    }

    /**
     * @return array
     */
    public function validated(): array
    {
        $result = [];

        foreach ($this->fillable as $item){
            $result[$item] = $this->query[$item];
        }

        return $result;
    }

    /**
     * @return void
     */
    public function check()
    {
        $this->query  = array_merge($_POST, $_GET);

        $validator = new Validator($this->query);

        $validator->setFillable($this->fillable);

        if (!$validator->requred()){
            echo Response::forbidden($validator->getMessage());
            die();
        }
    }

}