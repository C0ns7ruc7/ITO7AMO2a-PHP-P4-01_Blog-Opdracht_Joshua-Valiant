<?php
/**
 * Created by PhpStorm.
 * User: Joshua van den Bosch
 * Date: 3-7-2018
 * Time: 09:49
 */

class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'php_database_simple';
    protected $connection;

    public function __construct()
    {
        if(!isset($this->connection)){
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            if(!$this->connection){
                echo "Connection error";
                exit;
            }
        }
        return $this->connection;
    }
}