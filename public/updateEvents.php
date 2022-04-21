<?php
$title = "Opdater/slet events";
$al = 2;
require "./includes/_crud.php";
if (isset($_GET['deleteID'])) {
    $id = $_GET['deleteID'];
    delete($id, "events");
    header('Location: updateEvents.php');
}
if (isset($_POST['submit'])) {
    $descr = $_POST['descr'];
    $date = $_POST['date'];
    $id = $_GET['updateID'];
    // $userid = $_SESSION['userid'];
    if (isset($_POST['flag'])){
        $flag = 1;
    }else if(empty($_POST['flag'])){
        $flag = 0;
    }
    updateEvents($descr, $date, $flag, $id);
    header("location: updateEvents.php");
}

require "./includes/_adminHeader.php";
require "./includes/_indexHeader.php";
if (isset($_GET['updateID'])) {
    $id = $_GET['updateID'];
    $stmt = getSingleEvent($id);
    if ($row = $stmt->fetch()) {
?>
        <div class=" text-white">

        <h2 class="text-4xl text-center mt-8">Opdater events</h2>
        <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" class="w-1/2 mx-auto mt-8 flex flex-col justify-center">

            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="date" class="text-3xl  ">Dato:</label>
                <input required type="date" name="date" value="<?php echo $row['date']; ?>" class="border text-gray-700 w-48" placeholder="Dato">
            </div>
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="descr" class="text-3xl  ">Beskrivelse:</label>
                <input required type="text" maxlength="100" name="descr" value="<?php echo $row['descr']; ?>" class="border text-gray-700" placeholder="Beskrivelse af event">
            </div>
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="flag"  class="text-3xl w-max mr-12">Fødselsdag:</label>
                <input name="flag" id="flag" class="rounded scale-150 appearance-none checked:text-gray-800 focus:ring-0 focus:ring-offset-0" type="checkbox" <?php if($row['flag'] == 1){
                    echo "checked";} ?>>
            </div>
           
            

            <button name="submit" class="py-4 mx-auto w-1/3 text-2xl bg-aspit-news  rounded  hover:ring-2 hover:ring-green-300 hover:transition-all ease-in-out duration-200">Opdater</button>
            
        </form>
        
    </div>
<?php
    }
}
if(!isset($_GET['updateID'])){
?>
<div class=" text-white">
<h2 class="text-4xl text-center mt-8">Events</h2>
    <table class="w-2/3 mx-auto mt-8">
        <tr>
            <th class="text-xl">Dato</th>
            <th class="text-xl">Beskrivelse</th>
            <th class="text-xl">Fødselsdag</th>
        </tr>
        <?php $allUsers = getAllFromTable("events");
        require "./includes/_eventTable.php"
        ?>

    </table>

</div>

<?php
}
require "./includes/_footer.php";