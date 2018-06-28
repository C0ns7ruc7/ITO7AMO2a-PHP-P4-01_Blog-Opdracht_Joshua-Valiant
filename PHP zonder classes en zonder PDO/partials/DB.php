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

// edit Task
function editTask($mysqli){

    $sql = "SELECT * FROM tasklist WHERE id=".$_POST["task-id"]."";

    return mysqli_query($mysqli, $sql);
}

// update task
function updateTask($mysqli){
    $sql = "UPDATE tasklist 
        SET titel="."'".$_POST["titel"]."'".",
            body="."'".$_POST["body"]."'".",
            datum="."'".$_POST["datum"]."'"."
        WHERE id=".$_POST["task-id"].";";

    if (mysqli_query($mysqli, $sql)) {
        echo "Record updated successfully";
        header("Refresh:2");
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }
}

// Delete task
function deleteTask($mysqli){
    mysqli_query($mysqli,"DELETE FROM tasklist WHERE id='".$_POST["task-id"]."'");
    header("Refresh:0");
}

?>