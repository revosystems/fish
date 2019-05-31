<?php


namespace App\Models;

abstract class FishDataBase
{
    public $id;
    public $reference;

    public function __construct($id, $reference = null)
    {
        $this->id        = $id;
        $this->reference = $reference ? : static::all()[$id];
    }

    abstract public static function all();

    public static function find($id)
    {
        if ($id == -1) {
            return new static($id, ['name' => 'Otro']);
        }
        if ($id == -2) {
            return new static($id, ['name' => 'Ninguno']);
        }
        return new static($id);
    }

    public function __get($name)
    {
        return $this->reference[$name];
    }
}
