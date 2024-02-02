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
      <a href="./about.php" class="links <?php if($current == 'about') echo 'current' ?>"><p>About Us</p></a>
      <a href="./login.php" class="links <?php if($current == 'login') echo 'current' ?>"><p>Login</p></a>
      <a href="./contact.php" class="links <?php if($current == 'contact') echo 'current' ?>"><p>Contact Us</p></a>
      <?php 
        if(isset($_SESSION['username']) && isset($_SESSION['admin'])) {
          $username = $_SESSION['username'];
          $isAdmin = $_SESSION['admin'];
          if(isset($_SESSION['profile']))
            $profile = $_SESSION['profile'];
          else $profile = '';
          $image = '<i class="fa-solid fa-user"></i>';
          if($profile != '') $image = '<img src="profiles/'.$profile.'">';
          echo '
          <div class="user__login">
            <div class="user">
            '.$image.'
            </div>
            <div class="user_info">
              <p class="username">'.$username.'</p>
              <a href="./profile.php" class="profileBtn">Profile</a>';

          if($isAdmin) {
            echo '<a href="./dashboard.php" class="dashboardBtn">Dashboard</a>';
          }

          if($current == 'login') echo '</div></div>';
          else echo '<button type="submit" class="logoutBtn">Logout</button></div></div>';

          echo '
          <div class="modal_logout hidden">
            <button class="btn--close-modal_logout">&times;</button>
            <h2 class="modal__header_logout">Are you sure you want to log out?</h2>
            <form class="modal__form_logout" method="post" action="login.php">
                <button class="logoutBtn" type="submit" name="logout">Log Out</button>
                <button type="button" class="btn_no">No</button>
            </form>
          </div>
        <div class="overlay_logout hidden"></div>
        ';
        }
      ?>
    </nav>
    <button class="menu">
      <i class="fa-solid fa-bars menuBtn"></i>
    </button>
</header>