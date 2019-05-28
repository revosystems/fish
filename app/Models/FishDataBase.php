<?php


namespace App\Models;

abstract class FishDataBase
{
    public $id;
    public $reference;

    public function __construct($id)
    {
        $this->id        = $id;
        $this->reference = static::all()[$id];
    }

    abstract public static function all();

    public static function find($id)
    {
        return new static($id);
    }

    public function __get($name)
    {
        return $this->reference[$name];
    }
}
