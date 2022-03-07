<?php
$title = "Lav nyhed";
$al = 2;
require "./includes/_adminHeader.php";
require "./includes/_crud.php";

if ($_SESSION['accesslevel'] == 1 || $_SESSION['accesslevel'] == 2) {
    
    if (isset($_POST['submit'])) {
        include "./includes/_upload.php";
        $descWhere = $_POST['descWhere'];
        $descWhat = $_POST['descWhat'];
        $src = $file_name;
        $alt = $_POST['alt'];
        $userid = $_SESSION['userid'];
        if($uploadOk == 1 || $uploadOk == 2){
        insertinews($descWhere, $descWhat, $src, $alt, $userid);
        }
    }
    
    ?>
    <div class=" text-white">
        <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="mx-auto my-20">
            
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="descWhere" class="text-3xl ">Beskrivelse af elevens praktikplads:</label>
                <textarea name="descWhere" rows="5" cols="50" class="text-gray-700 rounded border-black border px-2 py-2 mb-4" placeholder="Maks 200 karakterer" required></textarea>
            </div>
            
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="descWhat" class="text-3xl  ">Beskrivelse af elevens praktikopgaver:</label>
                <textarea name="descWhat" rows="5" cols="50" class="text-gray-700 rounded border-black border px-2 py-2" placeholder="Maks 200 karakterer" required></textarea>
            </div>
            
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="src" class="text-3xl  ">Billede:</label>
                <input type="file" name="src"  class="border border-white bg-white text-gray-700">
            </div>
            
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="alt" class="text-3xl  ">Alt tekst til billede:</label>
                <input type="text" name="alt" value="" class="border text-gray-700" placeholder="Indsæt alternativ tekst til billedet">
            </div>
            <button name="submit" class="py-4 px-8 ml-6 border rounded border-black">Opret</button>
            
        </form>
        
    </div>
    
    <?php
} else {
    header("location: admin.php");
}


require "./includes/_footer.php";
