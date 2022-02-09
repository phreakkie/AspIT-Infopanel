<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Infoskærm</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body class="font-OpenSans">
  <div class="grid grid-cols-9 aspit-green">
    <section class="col-span-3 h-screen border-r-4">
      <div class="pt-8">
        <h2 class="text-center text-white text-5xl">Madplan uge 5</h2>
        <div class="w-9/12 mx-auto h-3/6 border-l-2 pl-10">
          <div class="mandag text-white grid grid-cols-4 mt-14 text-2xl">
            <p class="col-span-1">Mandag:</p>
            <p class="col-span-3">
              Gule ærter med gule ærter og spæk og klister
            </p>
          </div>
          <div class="mandag text-white grid grid-cols-4 pt-10 text-2xl">
            <p class="col-span-1">Mandag:</p>
            <p class="col-span-3">
              Gule ærter med gule ærter og spæk og klister
            </p>
          </div>
          <div class="mandag text-white grid grid-cols-4 pt-10 text-2xl">
            <p class="col-span-1">Mandag:</p>
            <p class="col-span-3">
              Gule ærter med gule ærter og spæk og klister
            </p>
          </div>
          <div class="mandag text-white grid grid-cols-4 pt-10 text-2xl">
            <p class="col-span-1">Mandag:</p>
            <p class="col-span-3">
              Gule ærter med gule ærter og spæk og klister
            </p>
          </div>
          <div class="mandag text-white grid grid-cols-4 pt-10 text-2xl">
            <p class="col-span-1">Mandag:</p>
            <p class="col-span-3">
              Gule ærter med gule ærter og spæk og klister
            </p>
          </div>
        </div>
        <div class="w-3/5 mx-auto border-t-2 text-white mt-20">
          <h2 class="text-3xl mt-12">Dagen i dag</h2>
          <p class="text-xl mt-4 flex items-baseline">
            Peter Joppersen
            <img class="h-4 ml-8" src="img/Danish-Flag.svg" alt="" />
          </p>
          <p class="text-xl mt-4">Alle har fri kl 14.30</p>
        </div>
      </div>
    </section>
    <section class="col-span-6 flex flex-col">
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
      <main class="grid grid-cols-5 border-b-4 pb-4">
        <!-- 
            id
            descWhere
            descWhat
            userid
            src
            alt
           -->
        <?php
        include "./includes/_internNews.php";
        ?>


      </main>
      <section class="grid grid-cols-5 flex-grow">
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
        <div class="col-span-2 grid grid-cols-3 gap-1">
          <div class="col-span-3 flex items-center justify-evenly h-3/6 mt-16">
            <img class="w-2/5 bg-aspit-weather rounded-full" id="dailyIcon" src="" alt="" />
            <p class="text-white text-6xl">
              <span id="dailyTemp">5</span> °C
            </p>
          </div>
          <div class="col-span-1 flex flex-col justify-items-center items-center border-r-2 mb-8">
            <p class="text-white text-2xl text-center" id="firstDate">man</p>
            <img class="h-20 aspect-auto object-fit bg-aspit-weather rounded-full" id="firstIcon" src="http://openweathermap.org/img/wn/10d@4x.png" alt="" />
            <p class="text-white text-2xl text-center">
              <span id="firstTemp">5</span> °C
            </p>
          </div>
          <div class="col-span-1 flex flex-col justify-items-center items-center border-r-2 mb-8">
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
  <script src="script.js"></script>
</body>

</html>