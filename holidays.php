<?php
    session_start();
    include "holidays_array.php";

    class Holiday {
        private $title;
        private $img;
        private $description;
        private $location;
        private $price;

        public function __construct($title, $img, $description, $location, $price) {
            $this->title = $title;
            $this->img = $img;
            $this->description = $description;
            $this->location = $location;
            $this->price = $price;
        }

        //Getters
        public function getTitle() {
          return $this->title;
        }
        public function getImg() {
          return $this->img;
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

        //Setters
        public function setTitle($title) {
          $this->title = $title;
        }
        public function setImg($img) {
          $this->img = $img;
        }
        public function setDescription($description) {
          $this->description = $description;
        }
        public function setLocation($location) {
          $this->location = $location;
        }
        public function setPrice($price) {
          $this->price = $price;
        }

        public function displayHoliday() {
            echo '<div class="holiday">
                    <div class="image-container">
                      <img src="' . $this->img . '" alt="' . $this->title . '">
                        <div class="description">' . $this->description . '</div>
                        </div>
                        <h2>' . $this->title . '</h2>
                        <div class="place__details">
                      <p>Location: ' . $this->location . '</p>
                      <p>Price: ' . $this->price . '$' . '</p>
                    </div>
                  </div>';
        }
    }

    $holidays;

    foreach($holidays_arr as $holiday) {
      $h = new Holiday($holiday['title'], $holiday['img'], $holiday['description'], $holiday['location'], $holiday['price']);
      $holidays[] = $h;
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
</head>
<body>
    <?php include "header.php"; ?>
    <form action="holidays.php" method="post" class="pick_holidays">
      <button type="submit" name="this_week">This Week</button>
      <button type="submit" name="all_time">All Time</button>
      <button type="submit" name="your_holidays">Your Holidays</button>
    </form>
    <main>
        <div class="this_week">
            <h1>This Week's Destinations</h1>
            <button class="btn--show-modal">Add Your Next Tour Here</button>
        </div>     
        <div class="holiday__container">
        <?php
            foreach($holidays as $holiday) {
              $holiday->displayHoliday();
            }
        ?>
        </div>
        <div class="modal hidden">
            <button class="btn--close-modal">&times;</button>
            <h2 class="modal__header">Where you want to go next?</h2>
            <form class="modal__form">
                <input type="text" name="title" placeholder="Title" required>
                <textarea name="description" placeholder="Description" required></textarea>
                <input type="text" name="location" placeholder="Location" required>
                <input type="number" name="price" placeholder="Price" required>
                <input type="file" name="img" accept="image/*" required>
                <button class="btn">Add Tour</button>
            </form>
        </div>
        <div class="overlay hidden"></div>
    </main>
    <!-- <?php include "footer.php"; ?> -->
  </body>
</html>
