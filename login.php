<?php 

  session_start();

  include "users.php";

  if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION['logged'] = false;

    for($i = 0; $i < count($users); $i++) {
<<<<<<< HEAD
      if($email == $users[$i]['email'] && $password == $users[$i]['password']) {
          $_SESSION['email'] = $email;                    
          $_SESSION['password'] = $password;        
          $_SESSION['username'] = $users[$i]['username'];
          $_SESSION['fullname'] = $users[$i]['fullname'];
          $_SESSION['admin'] = $users[$i]['admin'];
          $_SESSION['logged'] = true;
          header('Location: home.php');
      }
    }
  }
=======
          if($email == $users[$i]['email'] && $password == $users[$i]['password']) {
              $_SESSION['email'] = $email;                    
              $_SESSION['password'] = $password;        
              $_SESSION['username'] = $users[$i]['username'];
              $_SESSION['fullname'] = $users[$i]['fullname'];
              $_SESSION['admin'] = $users[$i]['admin'];
              $_SESSION['logged'] = true;
              header('Location: home.php');
          }
    }

>>>>>>> 40ae9efbd7ce26667e6403acc8aac93a63780763
    if(isset($_SESSION['logged'])) {
      if(!$_SESSION['logged'])
        session_destroy();
    }
<<<<<<< HEAD
  
=======
  }
>>>>>>> 40ae9efbd7ce26667e6403acc8aac93a63780763

  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/login.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&
      family=Lato:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <script defer src="./js/login.js"></script>
    <script defer src="./js/nav.js"></script>
    <title>Holiday Website - Login</title>
  </head>
  <body>
    <div class="banner">
      <?php include "header.php" ?>
      <div class="login__register">
        <div class="login__form login">
<<<<<<< HEAD
        <?php 
            if(!isset($_SESSION['logged']) || !$_SESSION['logged']) {
              echo "<h1>Login to Holiday Website</h1>";
            } 
            else if($_SESSION['logged']) {
              $fullname = $_SESSION['fullname'];
              echo "<h1>Logged in as $fullname</h1>";
            }
          ?>
          <!-- <h1>Login to Holiday Website</h1> -->
          <form action="login.php" method="post" id="login">
            <?php
              if(!isset($_SESSION['logged']) || !$_SESSION['logged']) {
                  echo '<input type="email" placeholder="Email" id="email" name="email" />';
              } 
              else if($_SESSION['logged'])      
                echo '';
            ?>
            <div class="error error-email">
                <?php 
                  if(isset($_SESSION['logged'])) {
                    if(!$_SESSION['logged']) {
                      echo "Te dhenat jane gabim!";
                    }
                  }
                ?>
            </div>
            <?php
              if(!isset($_SESSION['logged']) || !$_SESSION['logged']) {
                echo '<input type="password" placeholder="Password" id="password" name="password" />';
              } 
              else if($_SESSION['logged'])      
                echo '';
            ?>
=======
          <h1>Log in to Holiday Website</h1>
          <form action="login.php" method="post" id="login">
            <input type="email" placeholder="Email" id="email" name="email" />
            <div class="error error-email">
              <?php 
                if(isset($_SESSION['logged']) && !$_SESSION['logged']) {
                   echo "Te dhenat jane gabim!";
                }
              ?>
            </div>
            <input type="password" placeholder="Password" id="password" name="password" />
>>>>>>> 40ae9efbd7ce26667e6403acc8aac93a63780763
            <div class="error error-password"></div>
            <button type="submit" id="submit" name="submit">Sign in</button>
          </form>
          <p>
            Don't have an account? <button class="signUpBtn">Sign up</button>
          </p>
          <hr />
          <div class="sign__with--other">
            <p>Or sign in with</p>
            <div>
              <i class="fa-brands fa-google"></i>
              <i class="fa-brands fa-twitter"></i>
            </div>
          </div>
        </div>
        <div class="login__form hidden" id="register">
          <button class="back"><- Login Page</button>
          <h1>Register to Holiday Website</h1>
          <form>
            <input type="text" placeholder="Username" id="perdoruesi" />
            <div class="error error-perdoruesi"></div>
            <input type="text" placeholder="Full Name" id="emri" />
            <div class="error error-emri"></div>
            <input type="email" placeholder="Email" id="emaili" />
            <div class="error error-emaili"></div>
            <input type="password" placeholder="Password" id="passwordi" />
            <div class="error error-passwordi"></div>

            <button type="submit" id="submit2" name="submit2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
