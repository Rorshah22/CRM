<?php

namespace Core\Models;

class Client extends ActiveEntity
{
    protected $name;
    protected $lastName;
    protected $phone;
    protected $email;
    protected $comment;
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment): void
    {
        $this->comment = $comment;
    }
    public static function createFromData(array $arrayFields)
    {
        $request = new Client();
        $request->id = 3;
        $request->setName($arrayFields['name']);
        $request->setLastName($arrayFields['lastName']);
        $request->setPhone($arrayFields['phone']);
        $request->setEmail($arrayFields['email']);
        var_dump($request);

    }


    protected static function getTableName(): string
    {
        return 'client';
    }
}
