(function myClock() {         
    setTimeout(function() {   
      const d = new Date();
      const n = d.toLocaleTimeString("en-GB", { hour: '2-digit', minute: '2-digit' });
      document.getElementById("clock").innerHTML = n; 
      const y = d.toLocaleDateString("da-DK", {year: 'numeric', month: 'long', day: 'numeric' });
      document.getElementById("date").innerHTML = y; 
      myClock();
          }, 1000)
        })();

