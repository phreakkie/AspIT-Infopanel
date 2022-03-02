<?php
$title = "Slet bruger";
$al = 1;
require "./includes/_adminHeader.php";
require "./includes/_crud.php";
// $_GET['id'] != $_SESSION['userid'] tjekker at man ikke kan slette det ID man er logget ind med, altså ikke kan slette sig selv
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
            <th>Brugernavn</th>
            <th>Fornavn</th>
            <th>Efternavn</th>
            <th>Accesslevel</th>
            <th>Slet</th>
        </tr>
        <?php $allUsers = getAllFromTable("users");
        include "./includes/_userTable.php"
        ?>

    </table>

</div>

<?php
require "./includes/_footer.php";
