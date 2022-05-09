<?php
include "_connect.php";

function insertinews($title, $descWhere, $descWhat, $src, $alt, $userid)
{
    global $connection;
    $sql = "INSERT INTO inews(title, descWhere, descWhat, src, alt, userid) VALUES(?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$title, $descWhere, $descWhat, $src, $alt, $userid]);
}

function updateNews($title, $descWhere, $descWhat, $src, $alt, $active, $id)
{
    global $connection;
    $sql = "UPDATE inews SET title=?, descWhere=?, descWhat=?, src=?, alt=?, active=? WHERE id=?" ;
    $stmt = $connection->prepare($sql);
    $stmt->execute([$title, $descWhere, $descWhat, $src, $alt, $active,$id]);
    
}

function active()
{
    global $connection;
    $sql = "SELECT * FROM inews WHERE active = 1";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    return $stmt;
}

function setFoodplan($week, $mon, $tue, $wed, $thu, $fri){
    global $connection;
    $sql = "INSERT INTO food(week, mon, tue, wed, thu, fri) VALUES(?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$week, $mon, $tue, $wed, $thu, $fri]);
    
}

function updateFood($week, $mon, $tue, $wed, $thu, $fri, $id)
{
    global $connection;
    $sql = "UPDATE food SET week=?, mon=?, tue=?, wed=?, thu=?, fri=? WHERE id=?" ;
    $stmt = $connection->prepare($sql);
    $stmt->execute([$week, $mon, $tue, $wed, $thu, $fri, $id]);
    
}

function setEvents($descr, $date, $flag){
    global $connection;
    $sql = "INSERT INTO events(descr, date, flag) VALUES(?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$descr, $date, $flag]);
    
}
function updateEvents($descr, $date, $flag, $id)
{
    global $connection;
    $sql = "UPDATE events SET descr=?, date=?, flag=? WHERE id=?" ;
    $stmt = $connection->prepare($sql);
    $stmt->execute([$descr, $date, $flag, $id]);
    
}

function login($username, $password)
{
    global $connection;
    $sql = "SELECT * FROM users WHERE dbUsername = ?";
    $stmt =  $connection->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->execute();

    if (empty($row = $stmt->fetch())) {
        echo "<p class='text-red-500 mx-auto py-6 px-8 bg-red-200 border rounded-lg border-red-500 absolute top-1/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2 shadow-md'>Brugernavn eller Password er forkert</p>";
    } else if (password_verify($password, $row['dbPassword'])) {
        session_start();
        $_SESSION['username'] = $row['dbUsername'];
        $_SESSION['accesslevel'] = $row['accesslevel'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['userid'] = $row['userid'];

        header("location: admin.php");
    } else {
        echo "<p class='text-red-500 mx-auto py-6 px-8 bg-red-200 border rounded-lg border-red-500 absolute top-1/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2 shadow-md'>Brugernavn eller Password er forkert</p>";
    }
}

function createUser($username, $hash1, $firstName, $lastName, $accessLevel)
{
    global $connection;
    $sql = "INSERT INTO users (dbUsername, dbPassword, firstName, lastName, accessLevel) VALUES(?,?,?,?,?)";
    $stmt =  $connection->prepare($sql);
    $stmt->execute([$username, $hash1, $firstName, $lastName, $accessLevel]);
}

function getUser($username)
{
    global $connection;
    $sql = "SELECT * FROM users WHERE dbUsername = ?";
    $stmt =  $connection->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->execute();
    return $stmt;
}

function getSingleNews($id)
{
    global $connection;
    $sql = "SELECT * FROM inews WHERE id = ?";
    $stmt =  $connection->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    return $stmt;
}
function getSingleFood($id)
{
    global $connection;
    $sql = "SELECT * FROM food WHERE id = ?";
    $stmt =  $connection->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    return $stmt;
}

function getAllFromTable($table)
{
    switch ($table) {
        case "users":
            $tableID = "userid";
            break;
        case "inews":
            $tableID = "id";
            break;
        case "food":
            $tableID = "id";
            break;
        case "events":
            $tableID = "date";
            break;
    }
    global $connection;
    $sql = "SELECT * FROM $table ORDER BY $tableID DESC" ;
    $stmt =  $connection->prepare($sql);
    $stmt->execute();
    return $stmt;
}
// AccessLevel:
// 1: Kan lave alt, incl brugere
// 2: Kan lave nyheder/madplan 
// 3: Kan lave madplan

function delete($id, $table)
{
    switch ($table) {
        case "users":
            $tableID = "userid";
            break;
        case "inews":
            $tableID = "id";
            break;
        case "food":
            $tableID = "id";
            break;
        case "events":
            $tableID = "id";
            break;
    }
    global $connection;
    try {
        $sql = "DELETE FROM $table WHERE $tableID = ?";
        $stmt = $connection->prepare($sql);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo "Der er sket en fejl i sletningen" . $e->getMessage();
    }
}


function getSingleEvent($id)
{
    global $connection;
    $sql = "SELECT * FROM events WHERE id = ?";
    $stmt =  $connection->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    return $stmt;
}
function getSingleEventByDate($date)
{
    global $connection;
    $sql = "SELECT * FROM events WHERE date = ?";
    $stmt =  $connection->prepare($sql);
    $stmt->execute([$date]);
    return $stmt;
}

function getFood($week)
{
    global $connection;
    $sql = "SELECT * FROM food WHERE week = ?";
    $stmt =  $connection->prepare($sql);
    $stmt->bindParam(1, $week);
    $stmt->execute();
    return $stmt;
}