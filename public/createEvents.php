<?php
$title = "Opret Event";
$al = 2;
$meta ="Oprettelse af events";
require "./includes/_crud.php";


if (isset($_POST['submit'])) {
    $descr = $_POST['descr'];
    $date = $_POST['date'];
    // $userid = $_SESSION['userid'];
    if (isset($_POST['flag'])){
        $flag = 1;
    }else if(empty($_POST['flag'])){
        $flag = 0;
    }
    setEvents($descr, $date, $flag);
    header("location: createEvents.php?created=success");
}
require "./includes/_adminHeader.php";

if(isset($_GET['created'])){
    if($_GET['created'] == 'success'){
        echo "<p class='text-green-500 mx-auto py-6 px-8 bg-green-200 border rounded-lg border-green-500 absolute top-28 left-1/2 transform -translate-x-1/2 -translate-y-1/2 shadow-md'>Eventet er oprettet</p>";
    }
}
    ?>
    <div class=" text-white">

    <h2 class="text-4xl text-center mt-8">Opret events</h2>
        <form action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" class="w-1/2 mx-auto mt-8 flex flex-col justify-center">

            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="date" class="text-3xl  ">Dato:</label>
                <input required type="date" name="date" value="" class="border text-gray-700 w-48" placeholder="Dato">
            </div>
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="descr" class="text-3xl  ">Beskrivelse:</label>
                <input required type="text" maxlength="100" name="descr" value="" class="border text-gray-700" placeholder="Maks 100 karakterer">
            </div>
            <div class="grid grid-cols-2 mb-10 mx-6">
                <label for="flag"  class="text-3xl w-max mr-12">Fødselsdag:</label>
                <input name="flag" id="flag" class="rounded scale-150 appearance-none checked:text-gray-800 focus:ring-0 focus:ring-offset-0" type="checkbox">
            </div>
           
            

            <button name="submit" class="py-4 mx-auto w-1/3 text-2xl bg-aspit-news  rounded  hover:ring-2 hover:ring-green-300 hover:transition-all ease-in-out duration-200">Opret</button>
            
        </form>
        
    </div>
    
    <?php


require "./includes/_footer.php";
