<?php

namespace Saga\Config;

class Database {

    private static $conn = null;

    public static function getConnection() {
        if (is_null(self::$conn)) {
            $param = DB_CONFIG;
            self::$conn = new \PDO(
                    "mysql:host={$param['host']};dbname={$param['dbname']};", $param['username'], $param['password']
            );
            self::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }

}
