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
        if(isset($_SESSION['username'])) {
          $username = $_SESSION['username'];
          $isAdmin = isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin';

          echo '<div class="user__login" style="display: flex; align-items:center; color:white; cursor: pointer;">';
          echo '<p style="font-weight: bold;margin-right: 10px;">' . $username . '</p>';

          if($isAdmin) {
            echo '<button class="dashboardBtn" style="margin-right: 10px;">Dashboard</button>';
          }

          echo '<button class="logoutBtn" style="display: none;">Logout</button><i class="fa-solid fa-user"></i></div>';
        }
      ?>
    </nav>
    <button class="menu">
      <i class="fa-solid fa-bars menuBtn"></i>
    </button>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
            const userLogin = document.querySelector('.user__login');
            const logoutBtn = document.querySelector('.logoutBtn');
            const dashboardBtn = document.querySelector('.dashboardBtn');

            userLogin.addEventListener('click', function () {
              logoutBtn.style.display = (logoutBtn.style.display === 'block') ? 'none' : 'block';
              dashboardBtn.style.display = (dashboardBtn.style.display === 'block') ? 'none' : 'block';

            });

            logoutBtn.addEventListener('click', function () {
                window.location.href = 'login.php?logout=true'; 
            });

            dashboardBtn.addEventListener('click', function () {
                window.location.href = 'dashboard.php'; 
            });
        });
    </script>
</header>