<?php 
  // session_start();

  $url =  $_SERVER['REQUEST_URI'];
  $current = basename($url, ".php");
?>
<header>
    <div class="company__name">
      <h2>Holiday</h2>
      <span class="travel_title"><b>Website</b></span>
      <b>Deals</b>
    </div>
    <nav>
      <a href="./home.php" class="links <?php if($current == 'home') echo 'current' ?>"><p>Home</p></a>
      <a href="./about.php" class="links <?php if($current == 'about') echo 'current' ?>">About Us</a>
      <a href="./login.php" class="links <?php if($current == 'login') echo 'current' ?>">Login</a>
      <a href="./contact.php" class="links <?php if($current == 'contact') echo 'current' ?>">Contact Us</a>
      <?php 
<<<<<<< HEAD
        // if(isset($_SESSION['username'])) {
        //   $username = $_SESSION['username'];
        //   echo "<p>$username</p>";
        // }
=======
        if(isset($_SESSION['username'])) {
          $username = $_SESSION['username'];
          echo "<p>$username</p>";
        }
>>>>>>> 40ae9efbd7ce26667e6403acc8aac93a63780763
      ?>
    </nav>
    <button class="menu">
      <i class="fa-solid fa-bars menuBtn"></i>
    </button>
</header>