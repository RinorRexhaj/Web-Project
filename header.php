<?php 
  // session_start();

  $url =  $_SERVER['REQUEST_URI'];
  $current = basename($url, ".php");
 
?>
<script defer src="./js/nav.js"></script>
<script defer src="./js/scroll.js"></script>
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
        if(isset($_SESSION['username'])) {
          $username = $_SESSION['username'];
          $isAdmin = isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin';

          echo '
          <form action="login.php" method="post" class="user__login">
            <div class="user">
              <i class="fa-solid fa-user"></i>
            </div>
            <div class="user_info">
              <p class="username">'.$username.'</p>
              <button class="profileBtn">Profile</button>';

          if($isAdmin) {
            echo '<button class="dashboardBtn">Dashboard</button>';
          }

          if($current == 'login') echo '</div></form>';
          else echo '<button type="submit" name="logout" class="logoutBtn">Logout</button></div></form>';
        }
      ?>
    </nav>
    <button class="menu">
      <i class="fa-solid fa-bars menuBtn"></i>
    </button>
</header>