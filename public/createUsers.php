<?php
$title = "Opret bruger";
$al = 1;
require "./includes/_adminHeader.php";
require "./includes/_crud.php";




?>
<div class=" text-white">
<h2 class="text-4xl text-center mt-8">Opret bruger</h2>
    <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" class="mx-auto mt-8">


        <div class="grid grid-cols-2 pb-5 mb-5 mx-6 border-b border-white">
            <label for="firstName" class="text-3xl  ">Brugerens fornavn:</label>
            <input required type="text" name="firstName" value="" class="border text-gray-700 w-80" placeholder="Indsæt fornavn...">
        </div>

        <div class="grid grid-cols-2 pb-5 mb-5 mx-6 border-b border-white">
            <label for="lastName" class="text-3xl  ">Brugerens efternavn:</label>
            <input required type="text" name="lastName" value="" class="border text-gray-700 w-80" placeholder="Indsæt efternavn...">
        </div>

        <div class="grid grid-cols-2 pb-5 mb-5 mx-6 border-b border-white">
            <label for="username" class="text-3xl ">Nyt brugernavn:</label>
            <input required type="text" name="username" value="" class="border text-gray-700 w-80" placeholder="Indsæt nyt brugernavn...">
        </div>
        <div class="grid grid-cols-2 pb-5 mb-5 mx-6 border-b border-white">
            <label for="password" class="text-3xl ">Nyt password:</label>
            <input required type="password" name="password" value="" class="border text-gray-700 w-80" placeholder="Indsæt nyt password...">
        </div>
        <div class="grid grid-cols-2 pb-5 mb-5 mx-6 border-b border-white">
            <label for="passwordRepeat" class="text-3xl ">Gentag password:</label>
            <input required type="password" name="passwordRepeat" value="" class="border text-gray-700 w-80" placeholder="Gentag password...">
        </div>

        <div class="grid grid-cols-2 pb-5 mb-5 mx-6 ">
            <label for="accessLevel" class="text-3xl  ">Brugerens accesslevel (1-3):</label>
            <select required name="accessLevel" class="border text-gray-700 w-80">
                <option value="3">3 - Madplan</option>
                <option value="2">2 - Nyheder/Madplan</option>
                <option value="1">1 - Admin</option>
            </select>
        </div>
        <button name="submit" class="py-4 px-8 ml-6 border rounded border-black hover:bg-white/10 transition">Opret</button>

    </form>

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


    $stmt = getUser($username);

    if ($row = $stmt->fetch()) {
        echo "<p class='text-red-500 mx-auto py-6 px-8 bg-red-200 border rounded-lg border-red-500 absolute top-2/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2'>Brugernavnet findes allerede</p>";
    } else if ($password != $passwordRepeat) {
        echo "<p class='text-red-500 mx-auto py-6 px-8 bg-red-200 border rounded-lg border-red-500 absolute top-2/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2'>Passwords matcher ikke</p>";
    } else {
        echo "<p class='text-green-500 mx-auto py-6 px-8 bg-green-200 border rounded-lg border-green-500 absolute top-2/3 left-1/2 transform -translate-x-1/2 -translate-y-1/2'>Brugeren er oprettet</p>";
        createUser($username, $hash1, $firstName, $lastName, $accessLevel);
    }
}


require "./includes/_footer.php";
