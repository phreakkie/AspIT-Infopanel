<?php
$title = "Login";
require "./includes/_crud.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    login($username, $password);
}
require "./includes/_header.php";
require "./includes/_indexHeader.php";


?>


<div class=" text-white h-screen flex justify-center items-center">
    <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" class=" flex flex-col items-center ">
        <input required type="text" name="username" value="" class="border rounded border-black px-2 py-2 mb-4 text-gray-700" placeholder="Brugernavn...">
        <input required type="password" name="password" value="" class="border rounded border-black px-2 py-2 mb-4 text-gray-700" placeholder="Password...">
        <button name="submit" class="py-4 px-8 border rounded border-black">Log Ind</button>
    </form>
</div>
<?php
require "./includes/_footer.php";
