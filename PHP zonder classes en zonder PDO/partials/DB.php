<?php
/**
 * Created by PhpStorm.
 * User: Vabese
 * Date: 1-6-2018
 * Time: 12:41
 */

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM tasklist";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - title: " . $row["title"]. " - datum: " . $row["post_datum"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>