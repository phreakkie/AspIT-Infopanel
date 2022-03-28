<!-- Includes head-tags and body-open-tag -->

<?php
$title = "Infopanel";
require "./includes/_header.php";
require "./includes/_crud.php"; ?>


<div class="grid grid-cols-9 ">
  <section class="col-span-3 h-screen border-r-4 border-white">
    
      
      <!-- Foodplan -->
      <?php 
      include "./includes/_foodplan.php";
      ?>
      <!-- Daily events -->
      <div class="w-3/5 mx-auto border-t-2 text-white mt-16">
        <h2 class="text-3xl mt-12">Dagen i dag</h2>
        <p class="text-xl mt-4 flex items-baseline">
          Peter Joppersen
          <img class="h-4 ml-8" src="img/Danish-Flag.svg" alt="" />
        </p>
        <p class="text-xl mt-4">Alle har fri kl 14.30</p>
      </div>

  </section>
  <section class="col-span-6 flex flex-col">
    <!-- Header -->
    <header class="flex justify-between items-center text-white mt-2 pb-2 border-b-4">
      <h1 class="text-5xl ml-8">
        Asp<span class="aspit-red">IT</span> Nordjylland
      </h1>
      <img src="img/AspIT_logo_Hvid-150x150.png" alt="AspIT Logo" />
      <div class="text-center mr-4">
        <p id="clock" class="text-7xl">00:00</p>
        <p id="date" class="text-3xl text-gray-300">1. januar 2022</p>
      </div>
    </header>

    <section class="glide flex-grow border-white border-b-4">
      <div class="glide__track" data-glide-el="track">
        <div class="glide__slides ">

          <!-- Including _internNews -->
          <?php
          include "./includes/_internNews.php";
          ?>

        </div>
      </div>
    </section>

    <!-- News Feed -->
    <section class=" grid grid-cols-5 ">
      <div class="col-span-3 border-r-4 text-white">
        <div class="mt-8">
          <img class="mx-auto h-[200px]" src="https://unsplash.it/300/200" alt="" />
        </div>
        <h2 class="text-3xl mx-8 mt-8">Verdens flotteste skæg kåret</h2>
        <p class="text-2xl mx-8 mt-8">
          Mand fra Randers har det flotteste skæg i verden siger adskillige
          mennesker
        </p>
      </div>
      <!-- Weather section -->
      <div class="col-span-2 grid grid-cols-3 gap-1">
        <div class="col-span-3 flex items-center justify-evenly h-3/6 mt-16">
          <img class="w-2/5 bg-aspit-weather rounded-full" id="dailyIcon" src="" alt="" />
          <p class="text-white text-6xl">
            <span id="dailyTemp">5</span> °C
          </p>
        </div>
        <div class="col-span-1 flex flex-col justify-items-center items-center border-r-2 border-white mb-8">
          <p class="text-white text-2xl text-center" id="firstDate">man</p>
          <img class="h-20 aspect-auto object-fit bg-aspit-weather rounded-full" id="firstIcon" src="http://openweathermap.org/img/wn/10d@4x.png" alt="" />
          <p class="text-white text-2xl text-center">
            <span id="firstTemp">5</span> °C
          </p>
        </div>
        <div class="col-span-1 flex flex-col justify-items-center items-center border-r-2 border-white mb-8">
          <p class="text-white text-2xl text-center" id="secondDate">tir</p>
          <img class="h-20 aspect-auto object-fit bg-aspit-weather rounded-full" id="secondIcon" src="http://openweathermap.org/img/wn/10d@4x.png" alt="" />
          <p class="text-white text-2xl text-center">
            <span id="secondTemp">5</span> °C
          </p>
        </div>
        <div class="col-span-1 flex flex-col justify-items-center items-center">
          <p class="text-white text-2xl text-center" id="thirdDate">ons</p>
          <img class="h-20 aspect-auto object-fit bg-aspit-weather rounded-full" id="thirdIcon" src="http://openweathermap.org/img/wn/10d@4x.png" alt="" />
          <p class="text-white text-2xl text-center">
            <span id="thirdTemp">5</span> °C
          </p>
        </div>
      </div>
    </section>
  </section>
</div>
<!-- Inlcudes Script-tag and body-close-tag -->
<?php require "./includes/_footer.php" ?>