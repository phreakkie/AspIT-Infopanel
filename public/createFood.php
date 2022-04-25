<?php
$title = "Lav madplan";
$al = 3;
$meta ="Oprettelse af madplan";
require "./includes/_crud.php";

if (isset($_POST['submit'])) {
    $week = $_POST['week'];
    $mon = $_POST['mon'];
    $tue = $_POST['tue'];
    $wed = $_POST['wed'];
    $thu = $_POST['thu'];
    $fri = $_POST['fri'];
    // $userid = $_SESSION['userid'];
    setFoodplan($week, $mon, $tue, $wed, $thu, $fri);
    header("location: createFood.php?created=success");
}

if(isset($_GET['created'])){
    if($_GET['created'] == 'success'){
        echo "<p class='text-green-500 mx-auto py-6 px-8 bg-green-200 border rounded-lg border-green-500 absolute top-28 left-1/2 transform -translate-x-1/2 -translate-y-1/2 shadow-md'>Madplanen er oprettet</p>";
    }
}
require "./includes/_adminHeader.php";
require "./includes/_indexHeader.php";
    ?>
    <div class=" text-white">
    <h2 class="text-4xl text-center mt-8">Opret madplan</h2>
        <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" class="w-1/2 mx-auto mt-8 flex flex-col justify-center">

            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="week" class="text-3xl  ">Uge nummer:</label>
                <input required type="number" min="1" max="52" name="week" value="" class="border text-gray-700 w-24" placeholder="Uge nr">
            </div>
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="mon" class="text-3xl  ">Mandag:</label>
                <input required type="text" name="mon" value="" class="border text-gray-700" placeholder="Madplan for Mandag">
            </div>
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="tue" class="text-3xl  ">Tirsdag:</label>
                <input required type="text" name="tue" value="" class="border text-gray-700" placeholder="Madplan for Tirsdag">
            </div>
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="wed" class="text-3xl  ">Onsdag:</label>
                <input required type="text" name="wed" value="" class="border text-gray-700" placeholder="Madplan for Onsdag">
            </div>
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="thu" class="text-3xl  ">Torsdag:</label>
                <input required type="text" name="thu" value="" class="border text-gray-700" placeholder="Madplan for Torsdag">
            </div>
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="fri" class="text-3xl  ">Fredag:</label>
                <input type="text" name="fri" value="" class="border text-gray-700" placeholder="Madplan for Fredag">
            </div>
            

            <button name="submit" class="py-4 mx-auto w-1/3 text-2xl bg-aspit-news  rounded  hover:ring-2 hover:ring-green-300 hover:transition-all ease-in-out duration-200">Opret</button>
            
        </form>
        
    </div>
    
    <?php


require "./includes/_footer.php";
