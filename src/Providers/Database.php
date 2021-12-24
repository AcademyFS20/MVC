<?php

namespace Provider;

use \PDO;
use \PDOException;

abstract class Database
{

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $con;
    private $stmt;

    public function __construct()
    {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        );
        // Create a new PDO instanace
        try {
            $this->con = new PDO($dsn, $this->user, $this->pass, $options);
        } // Catch any errors
         catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    protected function query($query)
    {
        $this->stmt = $this->con->prepare($query);
    }

    protected function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    protected function exec()
    {
        return $this->stmt->execute();
    }

    protected function resultset()
    {
        $this->exec();
        $res = $this->stmt->fetchAll(PDO::FETCH_OBJ);
        $this->stmt->closeCursor();
        return $res;
    }

    protected function single()
    {
        $this->exec();
        $data = $this->stmt->fetch(PDO::FETCH_OBJ);
        return $data;
    }

    protected function rowCount()
    {
        return $this->stmt->rowCount();
    }

    protected function lastInsertId()
    {
        return $this->con->lastInsertId();
    }

    protected function beginTransaction()
    {
        return $this->con->beginTransaction();
    }

    protected function endTransaction()
    {
        return $this->con->commit();
    }

    protected function cancelTransaction()
    {
        return $this->con->rollBack();
    }
}