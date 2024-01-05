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
      <a href="./holidays.php" class="links <?php if($current == 'holidays') echo 'current' ?>"><p>Holidays</p></a>
      <a href="./about.php" class="links <?php if($current == 'about') echo 'current' ?>">About Us</a>
      <a href="./login.php" class="links <?php if($current == 'login') echo 'current' ?>">Login</a>
      <a href="./contact.php" class="links <?php if($current == 'contact') echo 'current' ?>">Contact Us</a>
      <?php 
        if(isset($_SESSION['username']) && isset($_SESSION['admin'])) {
          $username = $_SESSION['username'];
          $isAdmin = $_SESSION['admin'];

          echo '
          <div class="user__login">
            <div class="user">
              <i class="fa-solid fa-user"></i>
            </div>
            <div class="user_info">
              <p class="username">'.$username.'</p>
              <a href="./profile.php" class="profileBtn">Profile</a>';

          if($isAdmin) {
            echo '<a href="./dashboard.php" class="dashboardBtn">Dashboard</a>';
          }

          if($current == 'login') echo '</div></div>';
          else echo '<form action="login.php" method="post" class="logoutBtn"><button type="submit" name="logout">Logout</button></form></div></div>';
        }
      ?>
    </nav>
    <button class="menu">
      <i class="fa-solid fa-bars menuBtn"></i>
    </button>
</header>