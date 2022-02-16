<?php

require "./includes/_adminHeader.php";
require "./includes/_crud.php";

if ($_SESSION['accesslevel'] == 1 || $_SESSION['accesslevel'] == 2) {

    if (isset($_POST['submit'])) {
        $descWhere = $_POST['descWhere'];
        $descWhat = $_POST['descWhat'];
        $src = $_POST['src'];
        $alt = $_POST['alt'];
        insertinews($descWhere, $descWhat, $src, $alt);
    }

    if (isset($_GET['db'])) {
        echo "<p>Praktiknyhed oprettet i databasen!</p>";
    }

?>
    <div class=" text-white">
        <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" class="mx-auto my-20">

            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="descWhere" class="text-3xl ">Beskrivelse af elevens praktikplads:</label>
                <textarea name="descWhere" rows="5" cols="50" class="text-gray-700 rounded border-black border px-2 py-2 mb-4" placeholder="Kort beskrivelse af stedet eleven er i praktik" required></textarea>
            </div>

            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="descWhat" class="text-3xl  ">Beskrivelse af elevens praktikopgaver:</label>
                <textarea name="descWhat" rows="5" cols="50" class="text-gray-700 rounded border-black border px-2 py-2" placeholder="Kort beskrivelse af elevens opgaver på praktikstedet" required></textarea>
            </div>

            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="src" class="text-3xl  ">Billede:</label>
                <input type="text" name="src" value="" class="border text-gray-700" placeholder="Indsæt billede URL">
            </div>

            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="alt" class="text-3xl  ">Alt tekst til billede:</label>
                <input type="text" name="alt" value="" class="border text-gray-700" placeholder="Indsæt alternativ tekst til billedet">
            </div>
            <button name="submit" class="py-4 px-8 ml-6 border rounded border-black">Opret</button>

        </form>

    </div>

<?php
}


require "./includes/_footer.php";
