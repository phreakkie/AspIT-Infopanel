(function myClock() {         
    setTimeout(function() {   
      const d = new Date();
      const n = d.toLocaleTimeString("en-GB", { hour: '2-digit', minute: '2-digit' });
      document.getElementById("clock").innerHTML = n; 
      const y = d.toLocaleDateString("da-DK", { year: 'numeric', month: 'long', day: 'numeric' });
      document.getElementById("date").innerHTML = y; 
      myClock();
          }, 1000)
        })();


fetch("https://api.openweathermap.org/data/2.5/onecall?lat=57.048&lon=9.9187&exclude=minutely,hourly,alerts&units=metric&lang=DK&appid=8037b8a4d3f213dec8c23b3195ebe5f8")
.then(response => response.json())
	.then(data => weather(data))
	.catch(err => console.error(err))

function weather(data){
  console.log(data)
  console.log(Math.round(data.current.temp));
  console.log(data.daily[1].dt)
  console.log(data.daily[1].weather[0].description)


  data.daily.forEach((day, i) => {
    let unix = day.dt
    const d = new Date(unix * 1000)
    const n = d.toLocaleDateString("da-DK", {weekday:"short"})
    console.log('d:', n)

    let temp = Math.round(day.temp.day)
    console.log('temp:', temp)

    let icon = day.weather[0].icon
    console.log(`http://openweathermap.org/img/w/${icon}.png`)
  });
}
