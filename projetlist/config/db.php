<?php

require_once('./config/define.php');

class Db
{
    private static $_instance = null;
    private $_pdo;
    private $_sth;
    private $_res;
    private $_rowcount;
    private $_lastInsertId;
    private $_error = false;

    private function __construct()
    {
        try {

            $this->_pdo = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_ROOT, DB_USER, DB_PWD);
            $this->_pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }

    function query($req, array $array = [])
    {
        $this->_sth = $this->_pdo->prepare($req);
        // foreach($array as $key => $value){
        //     self::$_sth->bindParam($key, $value);
        // }
        if ($this->_sth->execute($array)) {
            $this->_res = $this->_sth->fetchAll();
            $this->_rowCount = $this->_sth->rowCount();
            $this->_lastInsertId = $this->_pdo->lastInsertId();
        } else {
            $this->_error = true;
        }
    }

    function insert($tableName, $array, $where = "")
    {
        $insertToQuery = [];

        foreach ($array as $key => $value) {
            $insertToQuery[':' . $key] = $value;
        }
        $insert = "INSERT INTO " . $tableName . " (" . implode(',', array_keys($array)) . ") " . "values(" . implode(',', array_keys($insertToQuery)) . ")";
        $this->query($insert, $insertToQuery);
    }

    function update($tableName, $array, $where)
    {
        $updateQuery = [];
        $array1 = [];

        foreach ($array as $key => $value) {
            array_push($updateQuery, ":" . $array[$key]);
            array_push($array1, $value);
        }

        $insert = "UPDATE " . $tableName . " SET (". implode(',',array_merge($updateQuery, $array1)) . ")";
        echo $insert;
        // $this->query($insert, $insertToQuery);
    }

    function getResult()
    {
        return $this->_res;
    }

    function getError()
    {
        return $this->_error;
    }

    function getRowCount()
    {
        return $this->_rowcount;
    }

    function getLastInsertId()
    {
        return $this->_lastInsertId;
    }

    public static function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
}

$dbh = Db::getInstance();
