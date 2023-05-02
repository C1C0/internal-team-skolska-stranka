<?php

namespace App\Classes\Database;


use Config\Database;
use Config\DatabaseConnection;

class Connector
{

    private static self $instance;

    public function __construct(public Connection $connection)
    {
    }

    public static function make(): self
    {
        if (empty(self::$instance)) {
            self::$instance = new self(
                self::getConnectionFromName(Database::DEFAULT_CONNECTION)
            );
        }

        return self::$instance;
    }

    /**
     * Resolved Connection will be defined based on following parameters:
     * {CamelCasedName}Connection
     *
     * @param  string  $connectionName
     * @return Connection
     */
    public static function getConnectionFromName(string $connectionName): Connection
    {
        return new ("App\Classes\Database\\".ucfirst($connectionName).'Connection')(
            DatabaseConnection::HOST,
            DatabaseConnection::DATABASE_NAME,
            DatabaseConnection::USERNAME,
            DatabaseConnection::PASSWORD,
        );
    }
}