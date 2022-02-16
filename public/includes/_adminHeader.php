<?php
require "./includes/_header.php";
require "./includes/_loginCheck.php";

if ($_SESSION['accesslevel'] == 1 || $_SESSION['accesslevel'] == 2 || $_SESSION['accesslevel'] == 3) {
?>
    <nav>
        <ul class="flex justify-between items-center py-6 text-white">
            <?php if ($_SESSION['accesslevel'] == 1) {
                echo "<li class='flex-grow'><a class='bg-gray-800 hover:bg-gray-600 text-center py-4 border rounded-lg' href='createUser.php'>Brugere</a></li>";
            }
            ?>
            <li class='flex-grow self-center'><a class='bg-gray-800 hover:bg-gray-600 text-center py-4 border rounded-lg' href="">Nyheder</a></li>
            <li class='flex-grow'><a class='bg-gray-800 hover:bg-gray-600 text-center py-4 border rounded-lg' href="">Events</a></li>
            <li class='flex-grow'><a class='bg-gray-800 hover:bg-gray-600 text-center py-4 border rounded-lg' href="">Madplan</a></li>
            <li class='flex-grow'><a class='bg-gray-800 hover:bg-gray-600 text-center py-4 border rounded-lg' href="logout.php">Log ud</a></li>
        </ul>
    </nav>

<?php
}
