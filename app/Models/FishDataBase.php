<?php


namespace App\Models;

abstract class FishDataBase
{
    const OTHER = -1;
    const NONE  = -2;
    public $id;
    public $reference;

    public function __construct($id)
    {
        $this->id        = $id;
        $this->reference = static::all()[$id];
    }

    public static function all() {
        return collect([
            static::OTHER   => ['posType' => PosType::OTHER, 'name' => 'Otro'],
            static::NONE    => ['posType' => PosType::NONE, 'name' => 'Ninguno'],
        ]);
    }

    public static function find($id)
    {
        return new static($id);
    }

    public function __get($name)
    {
        return $this->reference[$name];
    }

    public static function other()
    {
        return ['posType' => -1, 'name' => 'Ágora'];
    }
}
