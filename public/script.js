function myClock() {         
    setTimeout(function() {   
      const d = new Date();
      const n = d.toLocaleTimeString("en-GB", { hour: '2-digit', minute: '2-digit' });
      document.getElementById("clock").innerHTML = n; 
      myClock();             
    }, 1000)
  }
  myClock();  

  function myDate() {         
    setTimeout(function() {   
      const d = new Date();
      const n = d.toLocaleDateString("da-DK", {year: 'numeric', month: 'long', day: 'numeric' });
      document.getElementById("date").innerHTML = n; 
      myDate();             
    }, 1000)
  }
  myDate();  