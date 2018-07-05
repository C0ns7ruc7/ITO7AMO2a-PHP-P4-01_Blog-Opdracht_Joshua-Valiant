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

function getDB()
{
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->exec("set names utf8");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}