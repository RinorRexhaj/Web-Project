<?php 
//Login
  //if(isset($_SESSION['logged']) && !$_SESSION['logged']) session_destroy();

  session_start();
// session_destroy();

  include "users.php";

  // $_SESSION['logged'] = false;
  if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION['logged'] = false;

    for($i = 0; $i < count($users); $i++) {
      if($email == $users[$i]['email']) {
          $_SESSION['wrong_email'] = false;
          if($password == $users[$i]['password']) {
            $_SESSION['email'] = $email;                    
            $_SESSION['password'] = $password;        
            $_SESSION['username'] = $users[$i]['username'];
            $_SESSION['fullname'] = $users[$i]['fullname'];
            $_SESSION['admin'] = $users[$i]['admin'];
            $_SESSION['logged'] = true;
            $_SESSION['wrong_password'] = false;
            header('Location: home.php');
          }
          else $_SESSION['wrong_password'] = true;
          break;
      } else $_SESSION['wrong_email'] = true;
    }
  }

// Log Out
  if(isset($_POST['logout'])) {
    if(isset($_SESSION['logged']) && $_SESSION['logged']) {
        session_destroy();
        header('Location: login.php');
    }
  } 

//Register

  if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $reg_email = $_POST['reg_email'];
    $reg_password = $_POST['reg_password'];
    $_SESSION['registered'] = false;

    $_SESSION['exists_username'] = false;
    $_SESSION['exists_email'] = false;
    for($i = 0; $i < count($users); $i++) {
      if($username == $users[$i]['username']) {
        $_SESSION['exists_username'] = true;
        break;
      } 
      if($reg_email == $users[$i]['email']) {
          $_SESSION['exists_email'] = true;
          break;
      }
    }

    if($_SESSION['exists_email'] || $_SESSION['exists_username']) {
      $_SESSION['registered'] = false;
      header('Location: login.php');
    } else {
      $_SESSION['email'] = $reg_email;                    
      $_SESSION['username'] = $username;
      $_SESSION['fullname'] = $fullname;
      $_SESSION['logged'] = true;
      $_SESSION['registered'] = true;
      header('Location: home.php');
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/login.css" />
    <link rel="stylesheet" href="./css/nav.css" />
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
    <title>Holiday Website - Login</title>
  </head>
  <body>
    <div class="banner">
      <?php include "header.php" ?>
      <div class="login__register">
      <div class="login__form login <?php 
        if(!isset($_SESSION['logged']) && isset($_SESSION['registered'])) echo "hidden";
        ?>">
          <?php 
            if(!isset($_SESSION['logged']) || !$_SESSION['logged']) {
              echo "<h1>Login to Holiday Website</h1>";
            } 
            else if($_SESSION['logged']) {
              $fullname = $_SESSION['fullname'];
              echo "<h1>Logged in as $fullname</h1>";
            }
          ?>
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
                  if(isset($_SESSION['wrong_email']) && $_SESSION['wrong_email']) {
                    echo 'Email-i eshte gabim!';
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
            <div class="error error-password">
              <?php
                  if(isset($_SESSION['wrong_password']) && $_SESSION['wrong_password']) {
                    echo 'Password-i eshte gabim!';
                  }
              ?>
            </div>
            <button type="submit" id="submit" name="submit" class="<?php 
              if(isset($_SESSION['logged'])) {
                if(!$_SESSION['logged'])
                  echo '';
                else echo 'hidden';
              }        
            ?>">Sign In</button>
            <button type="submit" id="logout" name="logout" class="<?php 
              if(!isset($_SESSION['logged']) || !$_SESSION['logged']) {
                echo 'hidden';
              }     
              else if(isset($_SESSION['logged']) && $_SESSION['logged'])
                  echo '';   
            ?>">Log Out</button>
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
        <div class="login__form <?php
          if(isset($_SESSION['logged']) || !isset($_SESSION['registered'])) echo "hidden";
        ?>" id="register">
          <button class="back"><- Login Page</button>
          <h1>Register to Holiday Website</h1>
          <form action="login.php" method="post">
            <input type="text" placeholder="Username" id="perdoruesi" name="username" />
            <div class="error error-perdoruesi">
              <?php
                if(isset($_SESSION['exists_username']) && $_SESSION['exists_username']) {
                  echo 'Username ekziston!';
                }
              ?>
            </div>
            <input type="text" placeholder="Full Name" id="emri" name="fullname"/>
            <div class="error error-emri"></div>
            <input type="email" placeholder="Email" id="emaili" name="reg_email"/>
            <div class="error error-emaili">
            <?php
                if(isset($_SESSION['exists_email']) && $_SESSION['exists_email']) {
                  echo 'Ekziston perdoruesi me kete email!';
                }
              ?>
            </div>
            <input type="password" placeholder="Password" id="passwordi" name="reg_password" />
            <div class="error error-passwordi"></div>
            <button type="submit" id="register" name="register">Register</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
