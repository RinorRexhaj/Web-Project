<?php
    session_start();
    include "holidays_array.php";
    include_once "holidayRepo.php";
    
    $holidayRepo = new HolidayRepo();
    $holidays = $holidayRepo->getHolidays();

    class Holiday {
      private $id;
      private $title;
      private $description;
      private $location;
      private $price;
      private $image;
      private $userId;
      private $user;

      public function __construct($id,$title,$description,$location,$price,$image,$userId,$user) {
          $this->id = $id;
          $this->title = $title;
          $this->description = $description;
          $this->location = $location;
          $this->price = $price;
          $this->image = $image;
          $this->userId = $userId;
          $this->user = $user;
      }

      //Getters
      public function getId() {
          return $this->id;
        }
      public function getTitle() {
        return $this->title;
      }
      public function getDescription() {
        return $this->description;
      }
      public function getLocation() {
        return $this->location;
      }
      public function getPrice() {
        return $this->price;
      }
      public function getImage() {
          return $this->image;
      }
      public function getUserId() {
        return $this->userId;
      }
      public function getUser() {
        return $this->user;
      }

      public function displayHoliday() {
          echo '<div class="holiday">
                  <div class="image-container">
                    <img src="' . $this->image . '" alt="' . $this->title . '">
                    <div class="description">Posted by: '.$this->id .'<br><br>'. $this->description . '</div>
                  </div>
                  <div class="place__details">
                    <h2>' . $this->title . '</h2>
                    <div class="location">
                      <i class="fa-solid fa-location-dot"></i>
                      <p>Location: ' . $this->location . '</p> 
                    </div>
                    <div class="price">
                      <i class="fa-solid fa-magnifying-glass-dollar"></i>
                      <p>Price: ' . $this->price . '$' . '</p>
                    </div>
                  </div>
                </div>';
      }
  }

    // foreach($holidays as $holiday) {
    //   $h = new Holiday($holiday['ID'],$holiday['Title'], $holiday['Description'], $holiday['Location'], $holiday['Price'],$holiday['Image'],$holiday['User_ID'], $holiday['username']);
    // }

    if (isset($_POST['add_tour'])) {
      $current_user = $_SESSION['username'];
      
      $newTour = [
          'title' => $_POST['title'],
          'description' => $_POST['description'],
          'location' => $_POST['location'],
          'price' => $_POST['price'],
          'image' => $_POST['image'],
          'username' => $current_user,
      ];
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

  $your_holidays= [];

  foreach($holidays as $holiday) {
    if(isset($_SESSION['username']) && ($_SESSION['username'] == $holiday->getUser()))
      $your_holidays[] = $holiday;
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
              $holiday = new Holiday($holiday['ID'],$holiday['Title'], $holiday['Description'], $holiday['Location'], $holiday['Price'],$holiday['Image'],$holiday['User_ID'], $holiday['username']);
              $holiday->displayHoliday();
            }
          }
          else if($_SESSION['picked_holidays'] == 'your_holidays') {
            if(count($your_holidays) == 0) {
              echo "<h1>You haven't added any holidays...<h1>";
            }
            foreach ($your_holidays as $holiday) {
              $holiday->displayHoliday();
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
                <form class="modal__form" method="post" action="holidays.php">
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