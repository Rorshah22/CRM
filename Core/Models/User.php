<?php

namespace Core\Models;
use Core\Exceptions\InvalidArgumentException;

class User extends ActiveRecordEntity
{
    protected $username;

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
    protected $password;
    protected $authToken;

    /**
     * @return mixed
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }
    protected $loginDate;

    /**
     * @return mixed
     */
    public function getLoginDate()
    {
        return $this->loginDate;
    }
    public function setLoginDate()
    {
        $newDate = date("Y-m-d H:i:s");
        $this->loginDate = $newDate;
    }


    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    public static function login(array $userData): User
    {
        if (empty($userData['username'])) {
            throw new InvalidArgumentException('Не введен username');
        }
        if (empty($userData['password'])) {
            throw new InvalidArgumentException('Не передан пароль');
        }
        $user = User::findOneByColumn('username', $userData['username']);
        if ($user === null) {
            throw new InvalidArgumentException('Нет пользователя с таким username');
        }
        if (!password_verify($userData['password'], $user->getPassword())) {
            throw new InvalidArgumentException('Неверный пароль');
        }
        $user->refreshAuthToken();
        $user->setLoginDate();
        $user->save();

        return $user;
    }
    public static function logout(): void
    {
        setcookie('token', '', 0, '/');
    }
    public function refreshAuthToken():void
    {
        $this->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
    }

    protected static function getTableName(): string
    {
        return 'manager';
    }
}
