<?php
  session_start();

    if (!isset($_SESSION['userID'])) {
        echo '<h1 style="color: #f2f2f2;">Not Logged In</h1>
        <a href="login.php" style="text-decoration: none; color: #f2f2f2; font-size: 28px;">Log In</a>';
    } 

    include_once 'userRepo.php';
    include_once 'user.php';
    $userRepo = new UserRepo();

    $current_user = $userRepo->getUserById($_SESSION['userID']);

    $user = new User($current_user['ID'], $current_user['Username'], $current_user['FullName'], $current_user['Email'], $current_user['Password'], $current_user['Profile'], $current_user['Admin']);

    if (isset($_POST['save_profile'])) {
      $current = $_SESSION['userID'];
      
      $target = "profiles/".basename($_FILES['image']['name']);
      $image = $_FILES['image']['name'];
      
      move_uploaded_file($_FILES['image']['tmp_name'], $target);
      
      if(!isset($_POST['image'])) $_POST['image'] = $user->getProfile();
      
      if(!isset($_FILES['image']['name']) || $_FILES['image']['name'] == '') $_FILES['image']['name'] = $user->getProfile();

      $userRepo->updateUser($_SESSION['userID'] ,$_POST['username'], $_POST['fullname'], $_POST['email'], $_POST['password'], $_FILES['image']['name'], $user->getAdmin());

      $_SESSION['profile'] = $_FILES['image']['name'];
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['fullname'] = $_POST['fullname'];

      header('Location: profile.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profile.css" />
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
    <script src="./js/profile.js" defer></script>
    <title>Profile</title>
</head>
<body>
    <?php if (!isset($_SESSION['userID'])) return; ?>
    <div class="banner">
        <?php include "header.php"; ?>
        <form action="profile.php" method="POST" class="profile__container" enctype="multipart/form-data">
          <div class="left-container">
            <img src="<?php if(isset($user)) echo './profiles/'.$user->getProfile(); ?>" alt="Profile Image" class="profile">
            <input type="file" name="image" id="profile" accept="image/*">
            <label for="profile" class="add_profile"><i class="fa-solid fa-plus"></i></label>
            <h2 style="color:white; text-align:center;"><?php echo $user->getFullname(); ?></h2>
            <p class="gradienttext">Travel Enthusiast</p>
          </div>
          <div class="right-container">
            <h3 class="gradienttext">Profile Details</h3>
            <table>
                <tr>
                    <td>Username :</td>
                    <td><input type="text" name="username" value="<?php
                    echo $user->getUsername(); ?>" required></td>
                  </tr>
              <tr>
                <td>Fullname :</td>
                <td><input type="text" name="fullname" value="<?php
                    echo $user->getFullname(); ?>" required></td>
              </tr>
              <tr>
                <td>Email :</td>
                <td><input type="text" name="email" value="<?php
                    echo $user->getEmail(); ?>" required></td>
              </tr>
              <tr>
                <td>Password :</td>
                <td><input type="text" name="password" value="<?php
                    echo $user->getPassword(); ?>" required></td>
              </tr>
            </table>
            <button type="submit" name="save_profile" class="save">SAVE</button>
            <div class="credit">You Make Plans, We Make Offers</div>
          </div>
        </form>    
    </div>
</body>
</html>