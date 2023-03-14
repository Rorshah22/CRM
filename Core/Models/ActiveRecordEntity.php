<?php

namespace Core\Models;

use Core\Services\Db;

abstract class ActiveRecordEntity
{
    protected $id;

    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    public function getId(): int
    {
        return $this->id;
    }

    public static function findAll(string $order = 'ASC', string $condition = ''): array
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `' .
            static::getTableName() . '`'.
            $condition.' ORDER BY id ' . $order . ';';
        return $db->query($sql,
            [],
            static::class);
    }

    private function mapPropertiesToDbFormat(): array
    {
        $reflection = new \ReflectionObject($this);
        $properties = $reflection->getProperties();
        $mappedProperties = [];
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $propertyNameAsUnderscore = $this->camelCaseToUnderscore($propertyName);
            $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
        }
        return $mappedProperties;
    }

    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }

    public function save(): void
    {
        $mappedProperties = $this->mapPropertiesToDbFormat();
        if ($this->id === null) {
            $this->insert($mappedProperties);
        } else {
            $this->update($mappedProperties);
        }
    }

    public function insert(array $mappedProperties): void
    {

        $db = Db::getInstance();
        $properties = array_filter($mappedProperties);
        $columnName = [];
        $paramsColumn = [];
        $paramToValue = [];
        $index = 1;
        foreach ($properties as $column => $param) {
            $columnName[] = $column;
            $paramToValue[] = ':param' . $index;
            $paramsColumn[':param' . $index] = $param;
            $index++;
        }
        $sql = 'INSERT INTO `' . static::getTableName() . '` (' . implode(', ', $columnName) . ') VALUES (' . implode(',', $paramToValue) . ')';
        $db->query($sql, $paramsColumn);
        $this->id = $db->getLastInsertId();
        $this->refresh();
    }

    private function refresh(): void
    {
        $objectFromDb = static::getByID($this->id);
        $reflector = new \ReflectionObject($objectFromDb);
        $properties = $reflector->getProperties();

        foreach ($properties as $property) {
            $property->setAccessible(true);
            $propertyName = $property->getName();
            $this->$propertyName = $property->getValue($objectFromDb);
        }
    }

    public function update(array $mappedProperties): void
    {
        $columnName = [];
        $paramsColumn = [];
        $index = 1;
        foreach ($mappedProperties as $column => $param) {
            $columnName[] = $column . '= :param' . $index;
            $paramsColumn[':param' . $index] = $param;
            $index++;
        }
        $sql = 'UPDATE `' . static::getTableName() . '` SET ' . implode(', ', $columnName) . ' WHERE id= ' . $this->id;
        $db = Db::getInstance();
        $db->query($sql, $paramsColumn, static::class);
    }

    public static function getByID(int $id): ?self
    {
        $db = Db::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class);
        return $entities ? $entities[0] : null;
    }

    public static function findOneByColumn(string $columnName, $value): ?self
    {
        $db = Db::getInstance();
        $result = $db->query('SELECT * FROM `' . static::getTableName() . '` WHERE ' . $columnName . '= :value',
            [':value' => $value],
            static::class);
        if ($result === []) {
            return null;
        }
        return $result[0];
    }

    protected abstract static function getTableName(): string;
}
