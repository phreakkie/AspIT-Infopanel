<?php
include "./includes/_connect.php";


$stmt = getAllFromTable("food");

while($row = $stmt->fetch()){
    $dateTime = new DateTime();
    $weekNumber = $dateTime->format("W");
    // $weekNumber++;
    if(ltrim($weekNumber)==ltrim($row['week'])){

?>
    <h2 class="text-center text-white text-5xl mt-16 mb-20">Madplan uge <span class="aspit-red"><?=ltrim($weekNumber)?></span></h2>
      <div class="w-3/4 mx-auto min-h-[500px] border-l-2 pl-10 border-white flex flex-col justify-between">
        <!-- Lunchplan -->
        <div class="mandag text-white grid grid-cols-6 text-3xl items-center">
          <div class="col-span-2 font-semibold italic">Mandag:</div>
          <div class="col-span-4 ">
            <?=$row['mon']?> 
          </div>
        </div>
        <div class="mandag text-white grid grid-cols-6 text-3xl items-center">
          <div class="col-span-2 font-semibold italic">Tirsdag:</div>
          <div class="col-span-4 rounded ">
          <?=$row['tue']?>
          </div>
        </div>
        <div class="mandag text-white grid grid-cols-6  text-3xl items-center">
          <div class="col-span-2 font-semibold italic">Onsdag:</div>
          <div class="col-span-4">
          <?=$row['wed']?>
          </div>
        </div>
        <div class="mandag text-white grid grid-cols-6  text-3xl items-center">
          <div class="col-span-2 font-semibold italic">Torsdag:</div>
          <div class="col-span-4">
          <?=$row['thu']?>
          </div>
        </div>
        <!-- Hvis det er lige uge og feltet er tomt, skriv FRI i databasen -->
        <div class="mandag text-white grid grid-cols-6  text-3xl items-center">
            <div class="col-span-2 font-semibold italic">Fredag:</div>
            <?php if(!empty($row['fri'])){ ?>
          <div class="col-span-4">
          <?=$row['fri']?>
          </div>
          <?php }elseif($weekNumber % 2 == 0 && empty($row['fri'])){?>
            <div class="col-span-4">
          Fri
          </div>
          <?php }?>
        </div>
        </div>
<?php
        
}}