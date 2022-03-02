<?php
$title = "Slet bruger";
$al = 1;
require "./includes/_adminHeader.php";
require "./includes/_crud.php";
if (isset($_GET['id']) && $_GET['id'] != $_SESSION['userid']) {
    $id = $_GET['id'];
    delete($id, "users");
}
?>
<div class=" text-white">
    <!-- 1. Get all users -->
    <!-- 2. Generere table row med alt data  med link til deleteUsers.php?id=$row['userid']-->
    <!-- 3. Tjek om $_GET['id'] er isset -->
    <!-- 4. Kør _crud function som sletter ID'et  -->
    <table class="w-1/2 mx-auto">
        <tr>
            <td>Brugernavn</td>
            <td>Fornavn</td>
            <td>Efternavn</td>
            <td>Accesslevel</td>
            <td>Slet</td>
        </tr>
        <?php $allUsers = getAllFromTable("users");
        include "./includes/_userTable.php"
        ?>

    </table>

</div>

<?php

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];
    $accessLevel = $_POST['accessLevel'];
    $hash1 = password_hash($password, PASSWORD_DEFAULT);


    getUser($username);

    if ($row = $stmt->fetch()) {
        echo "<p class='text-red-500 mx-auto py-6 px-8 bg-red-200 border rounded-lg border-red-500 absolute top-2/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2'>Brugernavnet findes allerede</p>";
    } else if ($password != $passwordRepeat) {
        echo "<p class='text-red-500 mx-auto py-6 px-8 bg-red-200 border rounded-lg border-red-500 absolute top-2/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2'>Passwords matcher ikke</p>";
    } else {
        echo "<p class='text-green-500 mx-auto py-6 px-8 bg-green-200 border rounded-lg border-green-500 absolute top-2/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2'>Brugeren er oprettet</p>";
        createUser($username, $hash1, $firstName, $lastName, $accessLevel);
    }
}
// $_GET['id'] != $_SESSION['userid'] tjekker at man ikke kan slette det ID man er logget ind med, altså ikke kan slette sig selv

require "./includes/_footer.php";
