<?php

namespace Kdf\BelajarOop\Config;

class Database
{
    private static ?\PDO $pdo = null;

    public static function getConnection(string $driver = 'mysql', string $env = 'dev'): \PDO
    {
        if (self::$pdo == null) {
            require_once __DIR__ . '/../../config/database.php';
            $config = getDatabaseConfig();
            self::$pdo = new \PDO(
                $config['database'][$driver][$env]['url'],
                $config['database'][$driver][$env]['username'],
                $config['database'][$driver][$env]['password'],
            );
        }

        return self::$pdo;
    }

    public static function beginTransaction()
    {
        self::$pdo->beginTransaction();
    }

    public static function commitTransaction()
    {
        self::$pdo->commit();
    }

    public static function rollbackTransaction()
    {
        self::$pdo->rollBack();
    }
}
