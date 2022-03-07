<?php

$host = "localhost"; //Ip of database, in this case my host machine
$user = "root"; //Username to use
$pass = ""; //Password for that user
$dbname = "infoscreen"; //Name of the database
$charset = "utf8"; //tegnset

try {
    //Databasehandler som tilslutter databasen med variablerne
    $connection = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass);


    //hvis der er en fejl laver den en PDOException
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Sørger for at det returnerede data bliver returned som et associative array
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //Udskriver fejlen hvis der er en fejl i forbindelsen til DB
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
