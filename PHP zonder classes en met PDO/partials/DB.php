<?php
/**
 * Created by PhpStorm.
 * User: Vabese
 * Date: 1-6-2018
 * Time: 12:43
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_database_simple";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, titel, body, datum FROM tasklist");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

function createTask($conn){
    $titel = $_POST["titel"];
    $body = $_POST["body"];
    $datum = $_POST["datum"];
    $sql = "INSERT INTO tasklist (titel, body, datum)
        VALUES ('" . $titel . "','" . $body . "','" . $datum . "')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Refresh:0");
}

function editTask($conn){
    $taskid = $_POST["task-id"];
    $sql = "SELECT * FROM tasklist WHERE id=".$taskid."";
    $stmt = $conn->prepare($sql);
    return $stmt->execute();
}

function updateTask($conn){
    $taskid = $_POST["task-id"];
    $titel = $_POST["titel"];
    $body = $_POST["body"];
    $datum = $_POST["datum"];
    $sql = "UPDATE tasklist 
        SET titel="."'".$titel."'".",
            body="."'".$body."'".",
            datum="."'".$datum."'"."
        WHERE id=".$taskid.";";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Refresh:0");
}

function deleteTask($conn){
    $taskid = $_POST["task-id"];
    $sql = "DELETE FROM tasklist WHERE id = " . $taskid;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("Refresh:0");
}