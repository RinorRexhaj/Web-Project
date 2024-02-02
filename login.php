<?php 
//Login

  session_start();

  include "userRepo.php";
  include "user.php";

  $loggedUser;
  $regUser;

  //if(isset($_SESSION['userID'])) echo $_SESSION['userID'];
  
  // $_SESSION['logged'] = false;
  if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION['logged'] = false;
    
    $userRepo = new UserRepo();
    $users = $userRepo->getUsers();
    foreach($users as $user) {
      if($email == $user['Email']) {
          $_SESSION['wrong_email'] = false;
          if($password == $user['Password']) {
            $loggedUser = new User($user['ID'], $user['Username'], $user['FullName'], $user['Email'], $user['Password'], $user['Profile'], $user['Admin']);

            $_SESSION['userID'] = $user['ID'];
            $_SESSION['fullname'] = $loggedUser->getFullname();
            $_SESSION['username'] = $loggedUser->getUsername();
            $_SESSION['profile'] = $loggedUser->getProfile();
            $_SESSION['admin'] = $loggedUser->getAdmin();
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
        if(isset($loggedUser)) $loggedUser->unset();
        if(isset($regUser)) $regUser->unset();
        session_destroy();
        header('Location: login.php');
    }
  } 

//Register

  if(isset($_POST['register'])) {
    $userRepo = new UserRepo();
    $users = $userRepo->getUsers();

    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $reg_email = $_POST['reg_email'];
    $reg_password = $_POST['reg_password'];
    $_SESSION['registered'] = false;

    $_SESSION['exists_username'] = false;
    $_SESSION['exists_email'] = false;
    foreach($users as $user) {
      if($username == $user['Username']) {
        $_SESSION['exists_username'] = true;
        break;
      } 
      if($reg_email == $user['Email']) {
        $_SESSION['exists_email'] = true;
        break;
      }
    }

    if($_SESSION['exists_email'] || $_SESSION['exists_username']) {
      $_SESSION['registered'] = false;
      header('Location: login.php');
    } else {
      //kur t regjistrohet new user
      $regUser = new User(null, $username, $fullname, $reg_email, $reg_password, null, false);
      $userRepo->insertUser($regUser);

      $_SESSION['userID'] = ($userRepo->getUserByUsername($username))['ID'];

      $_SESSION['fullname'] = $fullname;
      $_SESSION['username'] = $username;
      $_SESSION['admin'] = false;
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
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
              echo "<script>
              document.addEventListener('DOMContentLoaded', function() {
                const hide = document.querySelector('.hide');
                hide.style.visibility = 'hidden';
            });
              </script>";
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
                    echo 'Wrong Email!';
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
                    echo 'Wrong Password!';
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
          <p class="hide">
            Don't have an account? <button class="signUpBtn hide">Sign up</button>
          </p>
          <hr />
          <div class="sign__with--other">
            <?php
              if(!isset($_SESSION['logged']) || !$_SESSION['logged']) {
                echo '<p class="hide">Or sign in with</p>
                <div>
                  <i class="fa-brands fa-google hide"></i>
                  <i class="fa-brands fa-twitter hide"></i>
                </div>';
              } 
              else if($_SESSION['logged'])      
                echo '';
            ?>
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
                  echo 'Username exists!';
                }
              ?>
            </div>
            <input type="text" placeholder="Full Name" id="emri" name="fullname"/>
            <div class="error error-emri"></div>
            <input type="email" placeholder="Email" id="emaili" name="reg_email"/>
            <div class="error error-emaili">
            <?php
                if(isset($_SESSION['exists_email']) && $_SESSION['exists_email']) {
                  echo 'User with this email exists!';
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
