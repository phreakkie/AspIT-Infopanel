<?php

$host = "localhost"; //Ip of database, in this case my host machine
$user = "root"; //Username to use
$pass = ""; //Password for that user
$dbname = "infoscreen"; //Name of the database
$charset = "utf8";

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
