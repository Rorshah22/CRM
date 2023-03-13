<?php

namespace Core\Models;

use Core\Services\Db;

abstract class ActiveEntity
{
    protected int $id;
    public function __set($name, $value)
    {
        $camelCaseName = $this->unredscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }
    private function unredscoreToCamelCase(string $source):string
    {
        return lcfirst(str_replace('_', '',ucwords($source)));
    }
    public function getId():int
    {
        return $this->id;
    }

    public static function findAll(string $order='ASC'):array
    {
        $db = Db::getInstance();
       return  $db->query('SELECT * FROM `'.static::getTableName().'` ORDER BY id '. $order.';',
            [],
            static::class);
    }
    protected abstract static function getTableName():string;
}
