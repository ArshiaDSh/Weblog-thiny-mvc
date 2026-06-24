<?php

namespace database;

use PDO;
use PDOException;


class Database
{
    private $connection;
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    private $dbHost = DB_HOST;
    private $dbUserName = DB_USERNAME;
    private $dbName = DB_NAME;
    private $dbPassword = DB_PASSWORD;
    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName, $this->dbUserName, $this->dbPassword, $this->options);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
    public function select($sql, $values = null)
    {
        try {
            $sta = $this->connection->prepare($sql);
            if ($values == null) {
                $sta->execute();
            } else {
                $sta->execute($values);
            }
            return $sta->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function insert($tableName, $fieldsAndValus)
    {
        try {
            $sta = $this->connection->prepare("INSERT INTO " . $tableName . "(" . implode(', ', array_keys($fieldsAndValus)) . " , created_at) VALUES (" . str_repeat("?, ", count(array_values($fieldsAndValus))) . "now())");
            $sta->execute(array_values($fieldsAndValus));
            return $sta->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function update($tableName, $fieldsAndValus, $id)
    {
        $sql = "UPDATE " . $tableName . " SET " . implode("=?,", array_keys($fieldsAndValus)) . "=?, updated_at=NOW() WHERE id=?";
        try {
            $sta = $this->connection->prepare($sql);
            $sta->execute(array_merge(array_values($fieldsAndValus), [$id]));
            return $sta;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function delete($sql, $values = null)
    {
        try {
            $sta = $this->connection->prepare($sql);
            if ($values == null) {
                $sta->execute();
            } else {
                $sta->execute([$values]);
            }
            return $sta->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
