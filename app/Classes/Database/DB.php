<?php

namespace App\Classes\Database;

class DB
{
    private Connector $connector;

    public function __construct()
    {
        $this->connector = Connector::make();
    }

    public static function query(): self{
        return new self();
    }

    public function raw(string $sql): array{
        $preparedStatement = $this->connector->connection->prepare($sql);
        $preparedStatement->execute();
        return $preparedStatement->fetchAll();
    }
}