<?php
include "./includes/_connect.php";


$stmt = getAllFromTable("events");
$dateTime = new DateTime();
// print_r($dateTime);
$date = $dateTime->format("Y-m-d");

?>
<div class="w-3/5 mx-auto border-t-2 text-white mt-16">
    <h2 class="text-3xl mt-12">Dagen i dag</h2>

<?php while($row = $stmt->fetch()){
    if($row['date'] == $date){
        ?>
        <p class="text-xl mt-4 flex items-center">
        <?=$row['descr']?>
        <?php if($row['flag'] == 1){?>
            <img class="h-4 ml-8" src='img/Danish-Flag.svg' alt=''>
            <?php }?>
        </p>
        
<?php
}}
?>
      </div>