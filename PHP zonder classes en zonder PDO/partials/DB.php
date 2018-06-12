<?php
/**
 * Created by PhpStorm.
 * User: Vabese
 * Date: 1-6-2018
 * Time: 12:41
 */

// Make connection
$mysqli = new mysqli("localhost", "root", "", "php_database_simple");

// Check connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get tasks
$getTasks = 'SELECT * FROM tasklist';
$tasks = $mysqli->query($getTasks);

// Make task
function makeTask($mysqli)
{
    $sql = "INSERT INTO tasklist (titel, body, datum)
        VALUES ('" . $_POST["titel"] . "','" . $_POST["body"] . "','" . $_POST["datum"] . "')";
    mysqli_query($mysqli, $sql);
    header("Refresh:0");
}

// Delete task
function deleteTask($mysqli){
    mysqli_query($mysqli,"DELETE FROM tasklist WHERE id='".$_POST["task-id"]."'");
    header("Refresh:0");
}

?>