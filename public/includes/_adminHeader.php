<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require "./includes/_loginCheck.php";

if (!isset($_SESSION['username'])) {
    header("location: login.php?err=notLoggedIn");
} else {
    if ($al == 1) {
        if ($_SESSION['accesslevel'] != 1) {
            header("location: admin.php");
        }
    } else if ($al == 2) {
        if ($_SESSION['accesslevel'] == 3) {
            header("location: admin.php");
        }
    }
}
?>
<script>
    var t;
    window.onload = function(){
        resetTimer();
    }
    // DOM Events
    document.onmousemove = function(){
        resetTimer();
    }
    
    document.onkeypress = function(){
        resetTimer();
    }
    // document.addEventListener('mousemove', resetTimer())
    // document.addEventListener('keydown', resetTimer())
    console.log('loaded');

function logout() {
        alert("You are now logged out.")
        location.href = 'logout.php'
    }

    function resetTimer() {
		
        clearTimeout(t);
        t = setTimeout(logout, 600000)
        
    }
</script>
<?php 
  echo  '<nav>';
   echo  "<ul class='flex items-center text-white'>";
            
        if ($_SESSION['accesslevel'] == 1) {

            // Brugere button
            echo "<li class='flex-grow'><button  id='dropdownNavbarLink' data-dropdown-toggle='dropdownNavbar' class='w-full relative bg-gray-800 hover:bg-gray-600 hover:ease-in duration-150 text-center py-4 border-r'>Brugere</button>

                <div id='dropdownNavbar' class='hidden z-10 text-base list-none bg-gray-800 rounded divide-y divide-gray-100 shadow '>
                <ul class='' aria-labelledby='dropdownLargeButton'>
                  <li>
                    <a href='createUsers.php' class='block py-4 px-8 text-lg text-white hover:bg-gray-600 '>Opret bruger</a>
                  </li>
                  <li>
                    <a href='deleteUsers.php' class='block py-4 px-8 text-lg text-white hover:bg-gray-600 '>Slet bruger</a>
                  </li>
                  
                </ul>
                
            </div>
                
                </li>";
        }
        if ($_SESSION['accesslevel'] == 1 || $_SESSION['accesslevel'] == 2) {
            // Nyheder button
            echo "<li class='flex-grow'><button  id='dropdownNavbarLink' data-dropdown-toggle='dropdownNavbar1' class='w-full relative bg-gray-800 hover:bg-gray-600 hover:ease-in duration-150 text-center py-4 border-r'>Nyheder</button>

                <div id='dropdownNavbar1' class='hidden z-10  text-base list-none bg-gray-800 rounded divide-y divide-gray-100 shadow '>
                <ul class='' aria-labelledby='dropdownLargeButton'>
                  <li>
                    <a href='createNews.php' class='block py-4 px-8 text-lg text-white hover:bg-gray-600 '>Opret nyhed</a>
                  </li>
                  <li>
                    <a href='updateNews.php' class='block py-4 px-8 text-lg text-white hover:bg-gray-600 '>Opdater/slet nyhed</a>
                  </li>
                                  
                </ul>                
            </div> 
                </li>";

            // Events button
            echo "<li class='flex-grow'><button  id='dropdownNavbarLink' data-dropdown-toggle='dropdownNavbar2' class='w-full relative bg-gray-800 hover:bg-gray-600 hover:ease-in duration-150 text-center py-4 border-r'>Events</button>

                <div id='dropdownNavbar2' class='hidden z-10  text-base list-none bg-gray-800 rounded divide-y divide-gray-100 shadow '>
                <ul class='' aria-labelledby='dropdownLargeButton'>
                  <li>
                    <a href='createEvents.php' class='block py-4 px-8 text-lg text-white hover:bg-gray-600 '>Opret event</a>
                  </li>
                  <li>
                    <a href='updateEvents.php' class='block py-4 px-8 text-lg text-white hover:bg-gray-600 '>Opdater/slet event</a>
                  </li>
                                  
                </ul>                
            </div> 
                </li>";
        }

        if ($_SESSION['accesslevel'] == 1 || $_SESSION['accesslevel'] == 2 || $_SESSION['accesslevel'] == 3) { 
         echo  "<li class='flex-grow'><button id='dropdownNavbarLink' data-dropdown-toggle='dropdownNavbar3' class='w-full relative bg-gray-800 hover:bg-gray-600 hover:ease-in duration-150 text-center py-4 border-r'>Madplan</button>

                <div id='dropdownNavbar3' class='hidden z-10  text-base list-none bg-gray-800 rounded divide-y divide-gray-100 shadow '>
                    <ul class='' aria-labelledby='dropdownLargeButton'>
                        <li>
                            <a href='createFood.php' class='block py-4 px-8 text-lg text-white hover:bg-gray-600 '>Opret madplan</a>
                        </li>
                        <li>
                            <a href='updateFood.php' class='block py-4 px-8 text-lg text-white hover:bg-gray-600 '>Opdater/slet madplan</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- // Log ud button -->
            <li class='flex-grow'><a class='bg-gray-800 block hover:bg-gray-600 hover:ease-in 
            duration-150 text-center py-4 ' href='logout.php'>Log ud</a></li> ";
        } 
        echo    "</ul> 
                    </nav>";

