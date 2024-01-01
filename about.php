<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/about.css" />
    <link rel="stylesheet" href="./css/nav.css" />
    <link rel="stylesheet" href="./css/footer.css" />
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
    <script defer src="./js/about.js"></script>
    <script defer src="./js/nav.js"></script>
    <script defer src="./js/scroll.js"></script>
    <title>Holiday Website - About</title>
  </head>
  <body>
    <div class="banner">
      <?php include "header.php" ?>
      <div class="about--h1">
        <h1>About us</h1>
      </div>
    </div>
    <main>
      <div class="about__text--section">
        <div class="about--text">
          <h1>
            We are a very trusted tour and travel agency, standing for you all
          </h1>
          <div class="about--exp">
            <div class="first--icon">
              <i class="fa fa-tag" style="color: #00ff88"></i>
              <p>Affordable prices</p>
            </div>
            <div class="second--icon">
              <i class="fas fa-trophy" style="color: #00a6ff"></i>
              <p>Prioritize comfort</p>
            </div>
          </div>
          <p>
            At Holiday Website Deals, we are passionate about helping people
            explore the world. Our mission is to make travel accessible and
            enjoyable for everyone. We specialize in finding and selecting
            holidays based on your preferences and selections. Our committment
            to our work has earned us many valuable long-term customers, and we
            are thrilled to have more people to help achieve their dreams of
            visiting the world.
          </p>
        </div>
        <div class="boat--img" onclick="window.location='./contact.php'">
          <img src="./img/boat.webp" alt="" />
          <p>Contact Us</p>
          <div class="overlay"></div>
        </div>
      </div>

      <!-- the other section -->
      <div class="what-we-offer-section">
        <div class="passport" onclick="window.location='./home.php'">
          <img src="./img/pasport.jpeg" alt="" />
          <p>Pick a Holiday</p>
          <div class="overlay"></div>
        </div>
        <div class="tours__guide">
          <i class="fas fa-sun fa-4x"></i>
          <h4>Tours Guide</h4>
          <p>
            Our team consists of many cheerful and enthusiastic tour guides to
            be there with you in your dream adventure.
          </p>
        </div>
        <div class="safety__safe">
          <i class="fas fa-fire fa-4x"></i>
          <h4>Safety Safe</h4>
          <p>
            We believe that travel should be sustainable and responsible, and
            we're committed to minimize our impact on the environment.
          </p>
        </div>
        <div class="clear__price">
          <i class="fas fa-mountain fa-4x"></i>
          <h4>Clear Price</h4>
          <p>
            One of our priorities as a team is to make our prices affordable and
            reasonable so that everyone gets the dream vacation they deserve.
          </p>
        </div>
      </div>
      <div class="location">
        <h1>Come Visit Us</h1>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46940.16392808568!2d21.117527679971246!3d42.66643583189326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ee605110927%3A0x9365bfdf385eb95a!2sPristina!5e0!3m2!1sen!2s!4v1701004929686!5m2!1sen!2s"
          width="600"
          height="450"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </main>
    <?php include 'footer.php' ?>
  </body>
</html>
