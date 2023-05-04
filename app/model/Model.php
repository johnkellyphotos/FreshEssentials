<?php

namespace model;

use lib\model\Query;
use lib\model\QueryType;
use PDO;
use PDOException;
use src\lib\AppError;
use src\lib\Config;
use src\lib\Helper;

class Model
{
    use ModelTraits;

    private readonly string $model;
    private readonly string $database;
    private readonly string $table;
    private readonly array $columns;

    private readonly PDO $connection;

    public function __construct()
    {
        $credentials = Config::fetch('database');
        $this->database = $credentials['dbname'];
        $this->model = get_class($this);
        $this->table = Helper::modelNameToTableName($this->model);
        try {
            $this->connection = new PDO(
                'mysql:host=' . $credentials['host'] . ';dbname=' . $this->database,
                $credentials['username'],
                $credentials['password'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]
            );
            $this->columns = $this->describe();
        } catch (PDOException $e) {
            AppError::create($e);
        }
    }

    public function insertRow(array $parameters): bool
    {
        $sql = $this->buildQuery(QueryType::INSERT, [
            Query::COLUMNS => $this->toList(array_keys($parameters)),
            Query::VALUES => implode(',', array_fill(0, count($parameters), '?')),
        ]);

        $stmt = $this->connection->prepare($sql);
        $this->bindParameters($parameters, $stmt);

        return $stmt->execute();
    }

    public function insertRows(array $parameters): bool
    {
        $result = true;
        foreach ($parameters as $parameter) {
            $result &= $this->insertRow($parameter);
        }

        return $result;
    }

    public function fetch(array $query): array
    {
        $parameters = [];
        $sql = $this->buildQuery(QueryType::FETCH, [
            Query::FIELDS => $this->getFields($query),
            Query::WHERE => $this->getWhere($query, $parameters),
            Query::GROUP_BY => $this->getGroupBy($query),
            Query::ORDER_BY => $this->getOrderBy($query),
            Query::LIMIT => $this->getLimit($query),
        ]);

        $stmt = $this->connection->prepare($sql);
        $this->bindParameters($parameters, $stmt);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function describe(): array
    {
        $sql = $this->buildQuery(QueryType::DESCRIBE);
        $statement = $this->connection->prepare($sql);
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    public function update(array $query): bool
    {
        $parameters = [];
        $sql = $this->buildQuery(QueryType::UPDATE, [
            Query::UPDATE => $this->getUpdates($query, $parameters),
            Query::WHERE => $this->getWhere($query, $parameters),
            Query::LIMIT => $this->getLimit($query),
        ]);

        $statement = $this->connection->prepare($sql);
        $this->bindParameters($parameters, $statement);

        return $statement->execute();
    }

    public function delete(array $query): bool
    {
        $parameters = [];
        $sql = $this->buildQuery(QueryType::DELETE, [
            Query::DELETE => $this->getUpdates($query, $parameters),
            Query::WHERE => $this->getWhere($query, $parameters),
            Query::LIMIT => $this->getLimit($query),
        ]);

        $statement = $this->connection->prepare($sql);
        $this->bindParameters($parameters, $statement);

        return $statement->execute();
    }
}