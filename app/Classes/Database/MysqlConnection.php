<?php

namespace App\Classes\Database;

use PDO;
use PDOStatement;

class MysqlConnection implements Connection
{
    private PDO $connection;
    private array $attributes = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];

    public function __construct(
        public string $host,
        public string $dbname,
        public string $username,
        public string $secret,
    ) {
        $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->secret);
        $this->setDefaultAttributes();
    }

    private function setDefaultAttributes(): void{
        foreach ($this->attributes as $key => $attribute){
            $this->setAttribute($key, $attribute);
        }
    }

    public function setAttribute(string $key, string $attribute): void{
        $this->attributes[$key] = $attribute;
        $this->connection->setAttribute($key, $attribute);
    }

    public function prepare(string $sql): false|PDOStatement
    {
        return $this->connection->prepare($sql);
    }
}