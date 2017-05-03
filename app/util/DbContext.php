<?php
namespace App\Util;

use PDO, PDOException;

class DbContext {
    private static $db = null;

    public static function initialize() {
        if(empty(self::$db)) {
            try {
                self::$db = new PDO('sqlite:database.sqlite');
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }

    public static function getInstance() {
        return self::$db;
    }
    
    public static function generateSchema() {
        $command = '
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name VARCHAR(100) NOT NULL,
            last_name VARCHAR(100) NOT NULL,
            address VARCHAR(100) NOT NULL,
            telephone VARCHAR(100) NOT NULL,
            cellphone VARCHAR(100) NOT NULL,
            avatar VARCHAR(100) NOT NULL
        )';

        try {
            self::$db->exec($command);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
