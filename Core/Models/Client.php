<?php

namespace Core\Models;

class Client extends ActiveEntity
{
    protected $name;
    protected $lastName;
    protected $phone;
    protected $email;
    protected $comment;


    protected static function getTableName(): string
    {
        return 'client';
    }
}
