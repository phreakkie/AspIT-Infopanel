<?php
$title = "Slet bruger";
$al = 1;
require "./includes/_adminHeader.php";
require "./includes/_crud.php";
// $_GET['id'] != $_SESSION['userid'] tjekker at man ikke kan slette det ID man er logget ind med, altså ikke kan slette sig selv
if($_SESSION['accesslevel'] == 1){
    if (isset($_GET['id']) && $_GET['id'] != $_SESSION['userid']) {
        $id = $_GET['id'];
        delete($id, "users");
    }
}
?>
<div class=" text-white">
    <!-- 1. Get all users -->
    <!-- 2. Generere table row med alt data  med link til deleteUsers.php?id=$row['userid']-->
    <!-- 3. Tjek om $_GET['id'] er isset -->
    <!-- 4. Kør _crud function som sletter ID'et  -->
    <table class="w-1/2 mx-auto mt-12">
        <tr>
            <th class="text-xl">Brugernavn</th>
            <th class="text-xl">Fornavn</th>
            <th class="text-xl">Efternavn</th>
            <th class="text-xl">Accesslevel</th>
            <th class="text-xl">Slet</th>
        </tr>
        <?php $allUsers = getAllFromTable("users");
        include "./includes/_userTable.php"
        ?>

    </table>

</div>

<?php
require "./includes/_footer.php";
