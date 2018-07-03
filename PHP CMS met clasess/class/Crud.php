<?php
/**
 * Created by PhpStorm.
 * User: Joshua van den Bosch
 * Date: 3-7-2018
 * Time: 10:03
 */
include_once "Database.php";

class Crud extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTasks(){
        $sql = "SELECT * FROM tasklist";
        $tasks = $this->connection->query($sql);
        return $tasks;
    }

    public function makeTask(){
        $sql = "INSERT INTO tasklist (titel, body, datum)
        VALUES ('" . $_POST["titel"] . "','" . $_POST["body"] . "','" . $_POST["datum"] . "')";
        mysqli_query($this->connection, $sql);
        header("Refresh:0");
    }

    public function editTask(){
        $sql = "SELECT * FROM tasklist WHERE id=".$_POST["task-id"]."";
        return mysqli_query($this->connection, $sql);
    }

    public function updateTask(){
        $sql = "UPDATE tasklist 
        SET titel="."'".$_POST["titel"]."'".",
            body="."'".$_POST["body"]."'".",
            datum="."'".$_POST["datum"]."'"."
        WHERE id=".$_POST["task-id"].";";
        mysqli_query($this->connection, $sql);
        header("Refresh:0");
    }

    public function deleteTask(){
        mysqli_query($this->connection,"DELETE FROM tasklist WHERE id='".$_POST["task-id"]."'");
        header("Refresh:0");
    }
}