<?php

namespace core;

class Validator
{
    protected $fillable = [];

    private $data = [];

    private $message = '';

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * @param  array  $data
     * @return void
     */
    public function setFillable(array $data)
    {
        $this->fillable = $data;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return bool
     */
    public function requred(): bool
    {
        foreach ($this->fillable as $item)
        {
            if (!array_key_exists($item, $this->data)){
                $this->message = $item . ': requred';
                return false;
            }
        }

        return true;
    }


}