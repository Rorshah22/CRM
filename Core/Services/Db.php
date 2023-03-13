<?php

namespace Core\Services;

use Core\Exceptions\DbException;

class Db
{
    private $pdo;
    private static $instance;

    private function __construct()
    {
        $dbOptions = [
            'host' => '172.16.238.12',
            'dbname' => 'crm',
            'user' => 'root',
            'password' => ''
        ];
        try {
            $this->pdo = new \PDO(
                'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
                $dbOptions['user'],
                $dbOptions['password']
            );
        } catch (\PDOException $e) {
            throw new DbException('Ошибка подключения к базе данных: ' . $e->getMessage());
        }
        $this->pdo->exec('SET NAMES UTF8');
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            return self::$instance = new self();
        }
        return self::$instance;
    }

    public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);
        if ($result === false) {
            return null;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }

    public function getLastInsertId(): int
    {
        return $this->pdo->lastInsertId();
    }
}
