<?php
require "./includes/_header.php";

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
?>

    <section>
        <?php echo "<p class='text-white text-2xl'>Velkommen <span class='aspit-red'>" . $_SESSION['firstname'] . "</span></p>"; ?>

        <?php
        if ($_SESSION['accesslevel'] == 1 || $_SESSION['accesslevel'] == 2) {
        ?>
            <button class="text-white border border-black rounded-lg p-2 bg-gray-800"><a href="createNews.php">Opret ny praktiknyhed</a></button>
        <?php
        }
        ?>

        <div class=""><a class=" hover:underline text-white text-lg" href="logout.php">Log ud</a></div>
    </section>

<?php
} else {
    header("location: login.php");
}
require "./includes/_footer.php";
