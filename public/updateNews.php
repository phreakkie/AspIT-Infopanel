<!-- 1. crud: getAllFromTable("inews") -->
<!-- 2. Generer tabel ud fra returneret array med news -->
<!-- 3. Tjek om $_GET['deleteID'] $_GET['updateID'] er sat for at bruge til hhv slette og opdatere nyheder -->
<!-- 4. Hvis updateID er sat skal en formular genereres med values fra db-->
<!-- 5. Når opdater knappen trykes skal SQL bruge UPDATE inews SET title = ?, descWhere = ?... -->
<?php
$title = "Opdater/slet Nyheder";
$al = 2;
require "./includes/_adminHeader.php";
require "./includes/_crud.php";
if (isset($_GET['deleteID'])) {
    $id = $_GET['deleteID'];
    delete($id, "inews");
    header('Location: '.$_SERVER['PHP_SELF']);
    die;
}
if (isset($_POST['submit'])) {
    $descWhere = $_POST['descWhere'];
    $descWhat = $_POST['descWhat'];
    $src = $_POST['src'];
    $alt = $_POST['alt'];
    $id = $_GET['updateID'];
    updateNews($descWhere, $descWhat, $src, $alt, $id);
    header('Location: '.$_SERVER['PHP_SELF']);
}

if (isset($_GET['updateID'])) {
    $id = $_GET['updateID'];
    $stmt = getSingleNews($id);
    if ($row = $stmt->fetch()) {
?>
        <div class=" text-white">
            <form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="mx-auto my-20">

                <div class="grid grid-cols-2 mb-10 mx-6">
                    <label for="descWhere" class="text-3xl ">Beskrivelse af elevens praktikplads:</label>
                    <textarea name="descWhere" rows="5" cols="50" class="text-gray-700 rounded border-black border px-2 py-2 mb-4" placeholder="Kort beskrivelse af stedet eleven er i praktik" required> <?php echo $row['descWhere']; ?> </textarea>
                </div>

                <div class="grid grid-cols-2 mb-10 mx-6">
                    <label for="descWhat" class="text-3xl  ">Beskrivelse af elevens praktikopgaver:</label>
                    <textarea name="descWhat" rows="5" cols="50" class="text-gray-700 rounded border-black border px-2 py-2" placeholder="Kort beskrivelse af elevens opgaver på praktikstedet" required> <?php echo $row['descWhat']; ?> </textarea>
                </div>

                <div class="grid grid-cols-2 mb-10 mx-6">
                    <label for="src" class="text-3xl  ">Billede:</label>
                    <input type="text" name="src" value="<?php echo $row['src']; ?>" class="border text-gray-700" placeholder="Indsæt billede URL">
                </div>

                <div class="grid grid-cols-2 mb-10 mx-6">
                    <label for="alt" class="text-3xl  ">Alt tekst til billede:</label>
                    <input type="text" name="alt" value="<?php echo $row['alt']; ?> " class="border text-gray-700" placeholder="Indsæt alternativ tekst til billedet">
                </div>
                <button name="submit" class="py-4 px-8 ml-6 border rounded border-black">Opdater</button>

            </form>

        </div>
<?php
    }
}
?>
<div class=" text-white">
    <table class="w-2/3 mx-auto">
        <tr>
            <th>Beskrivelse: Hvor</th>
            <th>Beskrivelse: Hvad</th>
            <th>Billede</th>
            <th>Alternativ Beskrivelse</th>
            <th>Opdater</th>
            <th>Slet</th>
            <th>Aktiv</th>
        </tr>
        <?php $allUsers = getAllFromTable("inews");
        require "./includes/_newsTable.php"
        ?>

    </table>

</div>

<?php

require "./includes/_footer.php";
