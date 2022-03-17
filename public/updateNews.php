<?php
$title = "Opdater/slet Nyheder";
$al = 2;
require "./includes/_crud.php";
if (isset($_GET['deleteID'])) {
    $id = $_GET['deleteID'];
    delete($id, "inews");
    header('Location: updateNews.php');
}
if (isset($_POST['submit'])) {
        include "./includes/_upload.php";
        $descWhere = $_POST['descWhere'];
        $descWhat = $_POST['descWhat'];
        $src = $file_name;
        $alt = $_POST['alt'];
        $id = $_GET['updateID'];
        if (isset($_POST['active'])){
            $active = 1;
        }else if(empty($_POST['active'])){
            $active = 0;
        }
        if($uploadOk == 1 || $uploadOk == 2){
        updateNews($descWhere, $descWhat, $src, $alt, $active, $id);
        }
        header("location: updateNews.php");

}
require "./includes/_adminHeader.php";

if (isset($_GET['updateID'])) {
    $id = $_GET['updateID'];
    $stmt = getSingleNews($id);
    if ($row = $stmt->fetch()) {
?>
        <div class=" text-white">
            <form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" class="w-2/3 mx-auto my-20 flex flex-col justify-center">

                <div class="grid grid-cols-2 mb-10 mx-6">
                    <label for="descWhere" class="text-3xl w-max mr-12">Beskrivelse af elevens praktikplads:</label>
                    <textarea name="descWhere" id="descWhere" rows="5" cols="50" class="text-gray-700 rounded border-black border px-2 py-2 mb-4" placeholder="Kort beskrivelse af stedet eleven er i praktik" required><?php echo $row['descWhere']; ?></textarea>
                </div>

                <div class="grid grid-cols-2 mb-10 mx-6">
                    <label for="descWhat" class="text-3xl w-max mr-12 ">Beskrivelse af elevens praktikopgaver:</label>
                    <textarea name="descWhat" id="descWhat" rows="5" cols="50" class="text-gray-700 rounded border-black border px-2 py-2" placeholder="Kort beskrivelse af elevens opgaver på praktikstedet" required><?php echo $row['descWhat']; ?></textarea>
                </div>

                <div class="grid grid-cols-2 mb-10 mx-6">
                    <label for="src" class="text-3xl  w-max mr-12">Billede:</label>
                    <input type="file" name="src" id="src" data-value="<?php echo $row['src']; ?>" class="border border-white bg-white text-gray-700" >
                </div>

                <div class="grid grid-cols-2 mb-10 mx-6">
                    <label for="alt" class="text-3xl w-max mr-12 ">Alt tekst til billede:</label>
                    <input type="text" name="alt" id="alt" value="<?php echo $row['alt']; ?>" class="border text-gray-700" placeholder="Indsæt alternativ tekst til billedet">
                </div>
                <div class="grid grid-cols-2 mb-10 mx-6 items-center">
                <label for="active"  class="text-3xl w-max mr-12">Aktiv:</label>
                <input name="active" id="active" class="rounded scale-150 appearance-none checked:text-gray-800 focus:ring-0 focus:ring-offset-0" type="checkbox"<?php if($row['active'] == 1){
                    echo "checked";} ?>>
                </div>

                <button name="submit" class="py-4 mx-auto w-1/3 text-2xl bg-green-500  rounded  hover:ring-2 hover:ring-green-300 hover:transition-all ease-in-out duration-200">Opdater</button>

            </form>

        </div>
<?php
    }
}
if(!isset($_GET['updateID'])){
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
        </tr>
        <?php $allUsers = getAllFromTable("inews");
        require "./includes/_newsTable.php"
        ?>

    </table>

</div>

<?php
}
require "./includes/_footer.php";
