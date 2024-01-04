<?php
    session_start();
    include "holidays_array.php";

    class Holidays {
        private $holidays;

        public function __construct($holidays) {
            $this->holidays = $holidays;
        }

        public function displayHolidays() {
            foreach ($this->holidays as $holiday) {
                echo '<div class="holiday">';
                echo '<h2>' . $holiday['title'] . '</h2>';
                echo '<div class="image-container">';
                echo '<img style="width:350px; height:250px;" src="' . $holiday['img'] . '" alt="' . $holiday['title'] . '">';
                echo '<div class="description">' . $holiday['description'] . '</div>';
                echo '</div>';
                echo '<div class="place__details">';
                echo '<p style="font-weight:600;">Location: ' . $holiday['location'] . '</p>';
                echo '<p style="font-weight:600;">Price: ' . $holiday['price'] . '$' . '</p>';
                echo '</div>';
                echo '</div>';
            }
        }
    }

    $holidaysInstance = new Holidays($holidays);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holiday Website - Holidays</title>
    <link rel="stylesheet" href="./css/holidays.css">
    <link rel="stylesheet" href="./css/nav.css">
    <script defer scr="./js/holidays.js"></script>
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
    <main>
        <div class="this_week">
            <h1>This Week's Destinations</h1>
            <button class="btn--show-modal">Add Your Next Tour Here</button>
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
        <div class="holiday__container">
        <?php
            $holidaysInstance->displayHolidays();
        ?>
        </div>
        
    </main>
    <script>
    const modal = document.querySelector(".modal");
const overlay = document.querySelector(".overlay");
const btnCloseModal = document.querySelector(".btn--close-modal");
const btnsOpenModal = document.querySelectorAll(".btn--show-modal");

const toggleModal = function (e) {
  e.preventDefault();
  modal.classList.toggle("hidden");
  overlay.classList.toggle("hidden");
};

btnsOpenModal.forEach((btn) => {
  btn.addEventListener("click", toggleModal);
});

btnCloseModal.addEventListener("click", toggleModal);
overlay.addEventListener("click", toggleModal);

document.addEventListener("keydown", function (e) {
  if (e.key === "Escape") {
    modal.classList.add("hidden");
    overlay.classList.add("hidden");
  }
});
</script>
</body>
</html>
