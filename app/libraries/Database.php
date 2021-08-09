<?php

namespace App\Libraries;

class Database
{

    protected $host = DB_HOST;
    protected $dbName = DB_NAME;
    protected $userName = DB_USERNAME;
    protected $password = DB_PASSWORD;

    protected $db;
    protected $stmt;
    protected $error;


    public function __construct()
    {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;

            $option = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            $this->db = new PDO($dsn, $this->userName, $this->password, $option);

        } catch (PDOException $e) {

            $this->error = $e->getMessage();

            echo $e->getMessage();
        }

    }

    public function query($query)
    {
        $this->stmt = $query;

        $this->stmt = $this->db->prepare($this->stmt);
    }

    public function bindValue($param, $value, $type = null)
    {
        if ($type == null) {
            switch (true) {
                case (is_numeric($value)):
                    $type = PDO::PARAM_INT;
                    break;
                case (is_bool($value)):
                    $type = PDO::PARAM_BOOL;
                    break;
                case (is_null($value)):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function getResult()
    {
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

}
