<?php

  session_start();

  // include "holidays_array.php";
  include_once "holidayRepo.php";
  include_once "userRepo.php";
  include_once "holiday.php";

  $holidayRepo = new HolidayRepo();
  $holidays = $holidayRepo->getHolidays();
  $your_holidays = [];
  if(isset($_SESSION['userID']))
    $your_holidays = $holidayRepo->getYourHolidays($_SESSION['userID']);
  
  function displayHoliday($h) {
    $userRepo = new UserRepo();
    $hUsername = ($userRepo->getUserbyId($h->getUserId()))['Username'];
    $edited = "";
    if($h->getEditedBy() != null) {
      $edited = "<br>Modified by: ".($userRepo->getUserbyId($h->getEditedBy()))['Username']."<br>";
    } 
    echo '
    <div class="holiday">
      <div class="image-container">
        <img src="uploads/' . $h->getImage() . '" alt="' . $h->getTitle() . '">
          <div class="description">
          <form action="holidays.php" method="post">
          <button class="pick" name="picked_holiday" type="submit">PICK THIS</button>
          <input name="picked_location" value="'.$h->getLocation().'" class="hidden">
          </form>
          <br>
          Posted by: '.$hUsername .'<br>'.$edited.'<br>
          '.$h->getDescription() . '</div>
          </div>
          <div class="place__details">
          <h2>' . $h->getTitle() . '</h2>
        <div class="location">
          <i class="fa-solid fa-location-dot"></i>
          <p>Location: ' . $h->getLocation() . '</p>
        </div>
        <div class="price">
          <i class="fa-solid fa-magnifying-glass-dollar"></i>
          <p>Price: ' . $h->getPrice() . '$' . '</p>
        </div>
      </div>
    </div>';
  }

  if (isset($_POST['add_tour'])) {
      $current_user = $_SESSION['userID'];
      
      $target = "uploads/".basename($_FILES['image']['name']);
      $image = $_FILES['image']['name'];
      
      $newHoliday = new Holiday(null, $_POST['title'], $_POST['description'], $_POST['location'], $_POST['price'], $image, $current_user);
      
      move_uploaded_file($_FILES['image']['tmp_name'], $target);

      $holidayRepo->insertHoliday($newHoliday);
      header('Location: holidays.php');
  }

  $_SESSION['picked_holidays'] = 'this_week';

  if(isset($_POST['this_week'])) {
    $_SESSION['picked_holidays'] = 'this_week';
    unset($_POST['all_time']);
    unset($_POST['your_holidays']);
  } 
  else if(isset($_POST['all_time'])) {
    $_SESSION['picked_holidays'] = 'all_time';
    unset($_POST['this_week']);
    unset($_POST['your_holidays']);    
  }
  else if(isset($_POST['your_holidays'])) {
    $_SESSION['picked_holidays'] = 'your_holidays';
    unset($_POST['this_week']);
    unset($_POST['all_time']);
  }

  if(isset($_POST['picked_holiday'])) {
    $_SESSION['picked_holiday'] = $_POST['picked_location'];
    header('Location: home.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holiday Website - Holidays</title>
    <link rel="stylesheet" href="./css/holidays.css">
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/footer.css">
    <script defer src="./js/holidays.js"></script>
    <script defer src="./js/preventRefresh.js"></script>
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
</head>
<body>
    <?php include "header.php"; ?>
    <form action="holidays.php" method="post" class="pick_holidays">
      <button type="submit" name="this_week" class="<?php if($_SESSION['picked_holidays'] == 'this_week') echo 'picked'; ?>">This Week</button>
      <button type="submit" name="all_time" class="<?php if($_SESSION['picked_holidays'] == 'all_time') echo 'picked'; ?>">All Time</button>
      <button type="submit" name="your_holidays" class="<?php if($_SESSION['picked_holidays'] == 'your_holidays') echo 'picked'; ?>">Your Holidays</button>
    </form>
    <main>
        <div class="this_week">
            <h1>
              <?php
                if($_SESSION['picked_holidays'] == 'this_week')
                  echo "This Week's Destinations";
                else if($_SESSION['picked_holidays'] == 'all_time') 
                  echo "All Time Favorites";
                else echo 'Your Holidays';
              ?>
            </h1>
            <button class="btn--show-modal">Add Your Next Tour Here</button>
        </div>     
        <div class="holiday__container">
        <?php
          if($_SESSION['picked_holidays'] == 'this_week') {
            foreach ($holidays as $holiday) {
              if(isset($_SESSION['admin']) && $_SESSION['admin']) {
                echo "<div class='your_holiday'><div class='action_btns'><a href='editHoliday.php?id={$holiday['ID']}' class='edit'>EDIT</a><a href='deleteHoliday.php?id={$holiday['ID']}' class='delete'>DELETE</a></div>";
              }
              $holiday = new Holiday($holiday['ID'],$holiday['Title'], $holiday['Description'], $holiday['Location'], $holiday['Price'],$holiday['Image'],$holiday['User_ID'], $holiday['EditedBy']);
              displayHoliday($holiday);
              if(isset($_SESSION['admin']) && $_SESSION['admin']) echo "</div>";
            }
          }
          else if($_SESSION['picked_holidays'] == 'your_holidays') {
            if(count($your_holidays) == 0) {
              echo "<h1>You haven't added any holidays...<h1>";
              return;
            }
            foreach ($your_holidays as $holiday) {
              echo "<div class='your_holiday'><div class='action_btns'><a href='editHoliday.php?id={$holiday['ID']}' class='edit'>EDIT</a><a href='deleteHoliday.php?id={$holiday['ID']}' class='delete'>DELETE</a></div>";
              $holiday = new Holiday($holiday['ID'],$holiday['Title'], $holiday['Description'], $holiday['Location'], $holiday['Price'], $holiday['Image'],$holiday['User_ID'], $holiday['EditedBy']);
              displayHoliday($holiday);
              echo "</div>";
            }
          }
          
        ?>
        </div>
        <div class="modal hidden">
            <button class="btn--close-modal">&times;</button>
            <?php
              if(isset($_SESSION['logged']) &&$_SESSION['logged']) {
                echo '
                <h2 class="modal__header">Where you want to go next?</h2>
                <form class="modal__form" method="post" action="holidays.php" enctype="multipart/form-data">
                    <input type="text" name="title" placeholder="Title" required>
                    <textarea name="description" placeholder="Description" required></textarea>
                    <input type="text" name="location" placeholder="Location" required>
                    <input type="number" name="price" placeholder="Price" required>
                    <input type="file" name="image" accept="image/*" required>
                    <button class="btn" type="submit" name="add_tour">Add Tour</button>
                </form>
                ';
              }
              else echo '
                <h2 class="modal__header">You need to be logged in to add a holiday.</h2>
                <a href="login.php" class="tour_login">Log In</a>
              ';
            ?>
        </div>
        <div class="overlay hidden"></div>
    </main>
    <!-- <?php include "footer.php"; ?> -->
  </body>
</html>