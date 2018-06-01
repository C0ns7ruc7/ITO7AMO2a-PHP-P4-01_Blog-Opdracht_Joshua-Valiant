<?php
/**
 * Created by PhpStorm.
 * User: Vabese
 * Date: 1-6-2018
 * Time: 12:44
 */

class DB
{

}

// todo:make class out of connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_database_simple";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();