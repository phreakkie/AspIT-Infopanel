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
  setInterval(printCurrent(data.current), 3600000)
  let firstDate = document.querySelector("#firstDate")
  let firstIcon = document.querySelector("#firstIcon")
  let firstTemp = document.querySelector("#firstTemp")
  let secondDate = document.querySelector("#secondDate")
  let secondIcon = document.querySelector("#secondIcon")
  let secondTemp = document.querySelector("#secondTemp")
  let thirdDate = document.querySelector("#thirdDate")
  let thirdIcon = document.querySelector("#thirdIcon")
  let thirdTemp = document.querySelector("#thirdTemp")
  
  data.daily.forEach((day, i) => {
    let temp = Math.round(day.temp.day)
    console.log('temp:', temp)
    let icon = day.weather[0].icon
    let iconLink = `http://openweathermap.org/img/wn/${icon}@4x.png`
    let unix = day.dt
    const d = new Date(unix * 1000)
    const weekday = d.toLocaleDateString("da-DK" , {weekday:"short"})
    if(i==1){
      firstDate.innerHTML = weekday
      firstTemp.innerHTML = temp
      firstIcon.src = iconLink
    } else if(i == 2){
      secondDate.innerHTML = weekday
      secondTemp.innerHTML = temp
      secondIcon.src = iconLink
    }else if(i==3){
      thirdDate.innerHTML = weekday
      thirdTemp.innerHTML = temp
      thirdIcon.src = iconLink
    }
  });
}

function printCurrent(data){
  console.log('data:', data)
  let dailyIcon = document.querySelector("#dailyIcon")
  let dailyTemp = document.querySelector("#dailyTemp")
  let icon = data.weather[0].icon
  let temp = Math.round(data.temp)
  iconLink = `http://openweathermap.org/img/wn/${icon}@4x.png`
  dailyIcon.src = iconLink
  dailyTemp.innerHTML = temp
}