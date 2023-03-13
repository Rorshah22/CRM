<?php

namespace Core\Models;
class Manager extends ActiveEntity
{
    protected $username;
    protected $password;
    protected $login_date;




    protected static function getTableName(): string
    {
        return 'manager';
    }
}
