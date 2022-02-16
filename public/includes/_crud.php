<?php
include "_connect.php";

function insertinews($descWhere, $descWhat, $src, $alt)
{
    global $connection;
    $sql = "INSERT INTO inews(descWhere, descWhat, src, alt) VALUES(?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$descWhere, $descWhat, $src, $alt]);
    header("location: createNews.php?db=succes");
}

function selectinews()
{
}


function login($username, $password)
{
    global $connection;
    $sql = "SELECT * FROM users WHERE dbUsername = ? AND dbPassword = ?";
    $stmt =  $connection->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $stmt->execute();

    if (empty($row = $stmt->fetch())) {
        echo "<p class='text-red-500 mx-auto py-6 px-8 bg-red-200 border rounded-lg border-red-500 absolute top-1/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2'>Brugernavn eller Password er forkert</p>";
    } else {
        session_start();
        $_SESSION['username'] = $row['dbUsername'];
        $_SESSION['accesslevel'] = $row['accesslevel'];
        $_SESSION['firstname'] = $row['firstname'];

        header("location: admin.php");
    }
}


// AccessLevel:
// 1: Kan lave alt, incl brugere
// 2: Kan lave nyheder/madplan 
// 3: Kan lave madplan