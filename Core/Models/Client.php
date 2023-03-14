<?php

namespace Core\Models;

use Core\Exceptions\InvalidArgumentException;

class Client extends ActiveRecordEntity
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
        $this->comment .= '|'.$comment;
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function createFromData(array $arrayFields): void
    {
        if (empty($arrayFields['name'])) {
            throw new InvalidArgumentException('Не передано имя');
        }
        if (empty($arrayFields['lastName'])) {
            throw new InvalidArgumentException('Не передана фамилия');
        }
        if (mb_strlen($arrayFields['name']) > 50) {
            throw new InvalidArgumentException('В имени большое количество символов');
        }
        if (mb_strlen($arrayFields['lastName']) > 50) {
            throw new InvalidArgumentException('Фамилия содержит большое количество символов');
        }
        if (!preg_match('/^[A-Za-zА-Яа-яЁё]+$/u', $arrayFields['name'])) {
            throw new InvalidArgumentException('В имени некоректные символы');
        }
        if (!preg_match('/^[A-Za-zА-Яа-яЁё]+$/u', $arrayFields['lastName'])) {
            throw new InvalidArgumentException('В фамилии некоректные символы');
        }
        if (empty($arrayFields['phone'])) {
            throw new InvalidArgumentException('Не передан номер телефона');
        }

        $search = [' ', '(', ')', '-'];
        $replace = [''];
        $arrayFields['phone'] = str_replace($search, $replace, $arrayFields['phone']);

        if (!preg_match('/^\+[0-9]+$/m', $arrayFields['phone'])) {
            throw new InvalidArgumentException('В номере должны быть только цифры' . $arrayFields['phone']);
        }
        if (empty($arrayFields['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }
        if (!preg_match('/^[a-zA-Z0-9\.@]+$/m', $arrayFields['email'])){
         throw new InvalidArgumentException('Недопустимые символы в email'.$arrayFields['email']);
        }

        $request = new Client();
        $request->setName(trim($arrayFields['name']));
        $request->setLastName(trim($arrayFields['lastName']));
        $request->setPhone(trim($arrayFields['phone']));
        $request->setEmail(trim($arrayFields['email']));
        $request->insert();
    }
    public static function addComment(array $fields, User $user)
    {
        $comment = Client::getByID($fields['id_comment']);
        $comment->setComment($fields['comment']);
        $comment->save();
//        return $comment;
    }

    protected static function getTableName(): string
    {
        return 'client';
    }
}
