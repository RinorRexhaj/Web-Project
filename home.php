<?php
  session_start();

  // if(isset($_SESSION['userID'])) echo $_SESSION['userID'];

  include_once "newsletterRepo.php";
  $newsletterRepo = new NewsletterRepo();

  include_once 'reservationRepo.php';
  include_once 'reservation.php';
  $reservationRepo = new ReservationRepo();


  if(isset($_POST['submit_reservation'])) {
    if(isset($_SESSION['userID'])) {
      $newReservation = new Reservation(null, $_POST['destination'], $_POST['from'], $_POST['checkIn'], $_POST['checkOut'], $_SESSION['userID']);
  
      $reservationRepo->insertReservation($newReservation);

      unset($_SESSION['picked_holiday']);
    }

    $_SESSION['reserved'] = true;
  }

  if(isset($_SESSION['newsletter'])) unset($_SESSION['newsletter']);

  if(isset($_POST['newsletter'])) {

    $email = $_POST['subscribe_email'];  

    $nletter = $newsletterRepo->getNewsletterById($email);
    
    if($nletter != false && $email == $nletter['Email']) {
      $_SESSION['newsletter'] = false;
    }
    else {
      $newsletterRepo->insertNewsletter($email);
      $_SESSION['newsletter'] = true;  
    }
   
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/home.css" />
    <link rel="stylesheet" href="./css/nav.css" />
    <link rel="stylesheet" href="./css/footer.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="./js/home.js"></script>
    <script defer src="./js/preventRefresh.js"></script>
    <title>Holiday Website - Home</title>
  </head>
  <body>
    <?php  
      $variable = "Giraffe";
      //$arr = array("one","two","three");
      //$arr = array("Jim"=>"A+","Pam"=>"B");
      //echo $variable;
      //echo "<br>";
      //echo sizeof($arr);
      //echo $arr["Jim"];
      function cube($num) {
        return pow($num,3);
      }
      $cubeResult = cube(5);
      //echo $cubeResult;
    ?>
  
    <div class="banner">
      <?php include "header.php" ?>
      <?php
        if((isset($_SESSION['reserved']) && $_SESSION['reserved']) && (!isset($_SESSION['logged']) || !$_SESSION['logged'])) {
          echo '
          <div class="modal_reservation">
            <button class="btn--close-modal">&times;</button>
            <h2 class="modal__header">You need to be logged in to make a reservation!</h2>
            <a href="login.php" class="tour_login">Log In</a>
          </div>
          <div class="overlay_modal"></div>
          ';
          $_SESSION['reserved'] = false;
        }
        if((isset($_SESSION['reserved']) && $_SESSION['reserved'])) {
          echo '
          <div class="modal_reservation">
            <button class="btn--close-modal">&times;</button>
            <h2 class="modal__header">Your reservation was submitted successfully!</h2>
            <i class="fa-solid fa-circle-check" style="color: #00ff88;font-size: 36px;"></i>
          </div>
          <div class="overlay_modal"></div>
          ';
          $_SESSION['reserved'] = false;
        }
        if(isset($_SESSION['newsletter']) && $_SESSION['newsletter']) {
          echo '
          <div class="modal_reservation">
            <button class="btn--close-modal">&times;</button>
            <h2 class="modal__header">Your subscription to the newsletter was submitted successfully!</h2>
            <i class="fa-solid fa-circle-check" style="color: #00ff88;font-size: 36px;"></i>
          </div>
          <div class="overlay_modal"></div>
          ';
          $_SESSION['reserved'] = false;
        }
        if(isset($_SESSION['newsletter']) &&  !$_SESSION['newsletter']) {
          echo '
          <div class="modal_reservation">
            <button class="btn--close-modal">&times;</button>
            <h2 class="modal__header">You are already subscribed to our newsletter!</h2>
          </div>
          <div class="overlay_modal"></div>
          ';
          $_SESSION['reserved'] = false;
        }
      ?>
      <div class="search__holiday">
        <div class="search__holidays">
          <h1>Explore</h1>
          <h2>The World</h2>
        </div>
        <form action="home.php" method="post" class="search__holiday--inputs">
          <div class="search">
            <i class="fa-solid fa-earth-americas fa-xl"></i>
            <input type="search" name="destination" placeholder="Your Destination or Hotel" value="<?php
                if(isset($_SESSION['picked_holiday'])) echo $_SESSION['picked_holiday'] ?>"/>
          </div>
          <div class="date">
            <i class="fa-solid fa-calendar fa-xl"></i>
            <input
              type="text"
              name="checkIn"
              placeholder="Check In"
              onfocus="(this.type='date')"
              onblur="(this.type='text')"
            />
            -
            <input
              type="text"
              name="checkOut"
              placeholder="Check Out"
              onfocus="(this.type='date')"
              onblur="(this.type='text')"
            />
          </div>
          <input type="text" name="from" class="invisible">
          <div class="only__for--btnColor">
            <button type="submit" name="submit_reservation" class="search__holiday--button">
              BOOK MY HOLIDAY
            </button>
        </form>
        </div>
        <div class="bora__bora">
          <p>
            <?php
              if(isset($_SESSION['userID']))
              {
                $reservationRepo = new ReservationRepo(); 
                $latestReservation = $reservationRepo->getLatestReservation($_SESSION['userID']);

                if($latestReservation == null) echo 'Bora Bora';
                else {
                $latestRes = new Reservation($latestReservation['ID'], $latestReservation['Destination'], $latestReservation['FromRs'], $latestReservation['CheckIn'], $latestReservation['CheckOut'], $latestReservation['UserID']);

                echo $latestRes->getFrom().' &rarr; '.$latestRes->getDestination();
                }
              }
              else echo 'Bora Bora';
            ?>
          </p>
          <div class="search__borabora">
            <p>
              <?php
                if(isset($_SESSION['userID'])) {
                  $reservationRepo = new ReservationRepo(); 
                  $latestReservation = $reservationRepo->getLatestReservation($_SESSION['userID']);

                  if($latestReservation == null) echo 'Bora Bora';
                  else {
                  $latestRes = new Reservation($latestReservation['ID'], $latestReservation['Destination'], $latestReservation['FromRs'], $latestReservation['CheckIn'], $latestReservation['CheckOut'], $latestReservation['UserID']);

                  $timestamp = date_create($latestRes->getCheckIn());
                  $date = date_format($timestamp, 'd/m/Y');

                  echo 'Your latest trip from '. $date;
                  }
                }
                else echo 'MATIRA BEACH';
              ?>
            </p>
            <button class="get-there">
              GET THERE <i class="fas fa-thin fa-angle-right"></i>
            </button>
          </div>
          <hr />
          <!-- Search Holiday -->
        </div>
      </div>
    </div>
    <main>
      <!-- Travel Planning -->
      <section class="travel__planning">
        <h1>CHOOSE YOUR TRAVEL METHOD</h1>
        <div class="travel__planning--label-info">
          <div class="travel__planning--labels">
            <button class="selected">HOLIDAY</button>
            <button>HOTEL ONLY</button>
            <button>FLYDRIVE</button>
            <button>CAR HIRE</button>
            <button>CRUISE</button>
            <button>TOURS</button>
          </div>
          <form action="home.php" method="post" class="travel__planning--informations">
            <div class="where_to">
              <p>Where to?</p>
              <div>
                <i class="fa-solid fa-globe"></i>
                <input type="text" placeholder="Your destination..." value="<?php
                if(isset($_SESSION['picked_holiday'])) echo $_SESSION['picked_holiday'] ?>"/>
              </div>
            </div>
            <div class="flying_from">
              <p>Flying from</p>
              <div>
                <i class="fa-solid fa-location-dot"></i>
                <input type="text" placeholder="Your departure..." />
              </div>
            </div>
            <div class="when">
              <p>When?</p>
              <div>
                <input type="date" placeholder="The start..." />
              </div>
            </div>
            <div class="how_long">
              <p>For how long?</p>
              <div>
                <select name="nights" id="nights">
                  <option value="1" selected>1 night</option>
                  <option value="2">2 nights</option>
                  <option value="3">3 nights</option>
                  <option value="4">4 nights</option>
                  <option value="5">5 nights</option>
                  <option value="6">6 nights</option>
                  <option value="7">7 nights</option>
                  <option value="other" class="option_scroll">Other</option>
                </select>
              </div>
            </div>
            <button type="submit" class="search_holiday">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </form>
        </div>
        <div class="travel__planning--icons">
          <div class="dots__icon">
            <i class="fas fa-circle"></i>
            <i class="fas fa-circle"></i>
            <i class="fas fa-circle"></i>
            <i class="fas fa-circle"></i>
            <i class="fas fa-circle"></i>
            <i class="fas fa-circle"></i>
          </div>

          <i class="fas fa-plane-departure fa-2x"></i>
        </div>
        <div class="dicover__destinations">
          <h1>START YOUR TRAVEL PLANNING HERE</h1>
          <a href="">DISCOVER OUR TOP DESTINATIONS</a>
        </div>
        <div class="travel__planning--links">
          <a href="">WORLWIDE</a>
          <a href="">POPULAR</a>
          <a href="">EXOTIC</a>
          <a href="">SPECIAL</a>
        </div>

        <!-- Images of travel planning section -->
        <div class="travel__planning--images">
          <!-- new york image -->
          <div class="image__container">
            <img src="img/newYork.jpeg" alt="" class="newYork" />
            <div class="overlay overlay__newYork">
              <div class="title">
                <h2>NEW YORK</h2>
                <span></span>
              </div>
              <div class="pick__deals">
                <div class="pick">
                  <p>PICK THIS</p>
                  <i class="fas fa-thin fa-angle-right"></i>
                </div>
                <div class="see__deals">
                  <p>SEE DEALS</p>
                  <i class="fas fa-thin fa-angle-right"></i>
                </div>
              </div>
            </div>
          </div>

          <!-- sydney image -->
          <div class="image__container">
            <img src="img/sydneyi.jpeg" alt="" class="sydney" />
            <div class="overlay overlay__sydney">
              <div class="title">
                <h2>SYDNEY</h2>
                <span></span>
              </div>
              <div class="pick__deals">
                <div class="pick">
                  <p>PICK THIS</p>
                  <i class="fas fa-thin fa-angle-right"></i>
                </div>
                <div class="see__deals">
                  <p>SEE DEALS</p>
                  <i class="fas fa-thin fa-angle-right"></i>
                </div>
              </div>
            </div>
          </div>

          <!-- paris image -->

          <div class="image__container">
            <img src="img/paris.jpg" alt="" class="paris" />
            <div class="overlay overlay__paris">
              <div class="title">
                <h2>PARIS</h2>
                <span></span>
              </div>
              <div class="pick__deals">
                <div class="pick">
                  <p>PICK THIS</p>
                  <i class="fas fa-thin fa-angle-right"></i>
                </div>
                <div class="see__deals">
                  <p>SEE DEALS</p>
                  <i class="fas fa-thin fa-angle-right"></i>
                </div>
              </div>
            </div>
          </div>

          <!-- tokyo image -->

          <div class="image__container">
            <img src="img/tokyoi.jpeg" alt="" class="tokyo" />
            <div class="overlay overlay__tokyo">
              <div class="title">
                <h2>TOKYO</h2>
                <span></span>
              </div>
              <div class="pick__deals">
                <div class="pick">
                  <p>PICK THIS</p>
                  <i class="fas fa-thin fa-angle-right"></i>
                </div>
                <div class="see__deals">
                  <p>SEE DEALS</p>
                  <i class="fas fa-thin fa-angle-right"></i>
                </div>
              </div>
            </div>
          </div>

          <!-- oslo image -->

          <div class="image__container">
            <img src="img/oslo.jpeg" alt="" class="oslo" />
            <div class="overlay overlay__oslo">
              <div class="title">
                <h2>OSLO</h2>
                <span></span>
              </div>
              <div class="pick__deals">
                <div class="pick">
                  <p>PICK THIS</p>
                  <i class="fas fa-thin fa-angle-right"></i>
                </div>
                <div class="see__deals">
                  <p>SEE DEALS</p>
                  <i class="fas fa-thin fa-angle-right"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="arrows__dots">
            <button class="slider__btn slider__btn--left">&larr;</button>
            <button class="slider__btn slider__btn--right">&rarr;</button>
            <div class="dots"></div>
          </div>
        </div>
        <button class="view__more">VIEW MORE</button>
      </section>
      <!-- End of travel planning -->
    </main>

    <!-- NewsLetter Section -->
    <section class="newsletter">
      <div class="newsletter__info">
        <h1>Subscribe to our Newsletter</h1>
        <p>Get to know the latest offers</p>
        <form class="newsletter__input" method="post" action="home.php">
          <div class="inp">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" placeholder="Email..." name="subscribe_email" />
          </div>
          <button type="submit" name="newsletter">SUBSCRIBE</button>
        </form>
      </div>
    </section>
    <section class="travel__deals">
      <div class="october__deals">
        <h2>BEST TRAVEL DEALS</h2>
        <p>OCT 12 - OCT 20</p>
      </div>
      <div class="canyon__deals">
        <div class="canyon">
          <p>Pick this Destination</p>
          <img src="./img/p1.jpeg" alt="" />
          <div class="canyon--text">
            <h4>8-Day Guided Canyon, Bryce Tour</h4>
            <div class="price">
              <p>ACTIVE, ADVENTUROUS</p>
              <h4>$ 2,399</h4>
            </div>
          </div>
        </div>
        <div class="canyon">
          <img src="./img/p2.jpeg" alt="" />
          <div class="canyon--text">
            <h4>3-Day Guided Tour</h4>
            <div class="price">
              <p>ACTIVE, TOUR</p>
              <h4>$ 2,099</h4>
            </div>
          </div>
        </div>
        <div class="canyon">
          <img src="./img/p3.jpeg" alt="" />
          <div class="canyon--text">
            <h4>5-Day Venice Tour</h4>
            <div class="price">
              <p>TOUR, ADVENTUROUS</p>
              <h4>$ 1,799</h4>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include 'footer.php'; ?>
  </body>
</html>
