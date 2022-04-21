<?php
$title = "Opdater/slet Madplan";
$al = 3;
require "./includes/_crud.php";
if (isset($_GET['deleteID'])) {
    $id = $_GET['deleteID'];
    delete($id, "food");
    header('Location: updateFood.php');
}
if (isset($_POST['submit'])) {
    $week = $_POST['week'];
    $mon = $_POST['mon'];
    $tue = $_POST['tue'];
    $wed = $_POST['wed'];
    $thu = $_POST['thu'];
    $fri = $_POST['fri'];
    $id = $_GET['updateID'];
    // $userid = $_SESSION['userid'];
    updateFood($week, $mon, $tue, $wed, $thu, $fri, $id);
    header('Location: updateFood.php');
}

require "./includes/_adminHeader.php";
require "./includes/_indexHeader.php";

if (isset($_GET['updateID'])) {
    $id = $_GET['updateID'];
    $stmt = getSingleFood($id);
    if ($row = $stmt->fetch()) {
?>
        <div class=" text-white">
        <h2 class="text-4xl text-center mt-8">Opdater madplan</h2>
        <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" class="w-1/2 mx-auto mt-8 flex flex-col justify-center">

            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="week" class="text-3xl  ">Uge nummer:</label>
                <input required type="number" min="1" max="52" name="week" value="<?=$row['week']?>" class="border text-gray-700 w-24" placeholder="Uge nr">
            </div>
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="mon" class="text-3xl  ">Mandag:</label>
                <input required type="text" name="mon" value="<?=$row['mon']?>" class="border text-gray-700" placeholder="Madplan for Mandag">
            </div>
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="tue" class="text-3xl  ">Tirsdag:</label>
                <input required type="text" name="tue" value="<?=$row['tue']?>" class="border text-gray-700" placeholder="Madplan for Tirsdag">
            </div>
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="wed" class="text-3xl  ">Onsdag:</label>
                <input required type="text" name="wed" value="<?=$row['wed']?>" class="border text-gray-700" placeholder="Madplan for Onsdag">
            </div>
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="thu" class="text-3xl  ">Torsdag:</label>
                <input required type="text" name="thu" value="<?=$row['thu']?>" class="border  text-gray-700" placeholder="Madplan for Torsdag">
            </div>
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="fri" class="text-3xl  ">Fredag:</label>
                <input type="text" name="fri" value="<?=$row['fri']?>" class="border text-gray-700" placeholder="Madplan for Fredag">
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
<h2 class="text-4xl text-center mt-8">Madplaner</h2>
    <table class="w-2/3 mx-auto mt-8">
        <tr>
            <th class="text-xl">Uge Nr</th>
            <th class="text-xl">Mandag</th>
            <th class="text-xl">Tirsdag</th>
            <th class="text-xl">Onsdag</th>
            <th class="text-xl">Torsdag</th>
            <th class="text-xl">Fredag</th>
            <th class="text-xl">Opdatér</th>
            <th class="text-xl">Slet</th>
        </tr>
        <?php $allUsers = getAllFromTable("food");
        require "./includes/_foodTable.php"
        ?>

    </table>

</div>

<?php
}
require "./includes/_footer.php";