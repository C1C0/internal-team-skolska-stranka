<?php

namespace App\Classes\Database;

use PDOStatement;

interface Connection
{
    public function setAttribute(string $key, string $attribute): void;

    public function prepare(string $sql): false|PDOStatement;
}