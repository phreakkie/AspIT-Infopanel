<?php
$al = 3;
$title = "Admin";
$meta ="Admin siden til AspIT inforpanel";
require "./includes/_adminHeader.php";
require "./includes/_indexHeader.php";

if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
?>

    <section class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 mx-auto w-fit ">
        <?php echo "<p class='text-white text-8xl'>Velkommen <span class='aspit-red'>" . $_SESSION['firstname'] . "</span></p>"; ?>
    </section>

<?php
} else {
    header("location: login.php");
}
require "./includes/_footer.php";
