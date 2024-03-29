<?php
  session_start();

  include_once "contactRepo.php";

  if(isset($_POST['send_message'])) {
    if(isset($_SESSION['userID'])) {
      $message = $_POST['user_message'];
      $contactRepo = new ContactRepo();
      $contact = new Contact(null, $message, $_SESSION['userID']);
      $contactRepo->insertContact($contact);
    }
    $_SESSION['sendMessage'] = true;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/contact.css" />
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
    <script defer src="./js/contact.js"></script>
    <title>Holiday Website - Contact</title>
    <link rel="icon" type="image/x-icon" href="img/beach (1).ico">
  </head>
  <body>
    <div class="banner">
      <?php include "header.php" ?>
      <div class="lets__talk">Let's have a talk
      </div>
      <div class="contact__us">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d46940.16392808568!2d21.117527679971246!3d42.66643583189326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ee605110927%3A0x9365bfdf385eb95a!2sPristina!5e0!3m2!1sen!2s!4v1701004929686!5m2!1sen!2s"
          width="600"
          height="450"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
        <div class="meet__us">
          <h1>Meet us</h1>
          <div class="info">
            <div class="number">
              <i class="fas fa-phone"></i>
              <p>+38345123789</p>
            </div>
            <div class="email">
              <i class="fas fa-envelope"></i>
              <p>contact@gmail.com</p>
            </div>
            <div class="address">
              <i class="fas fa-location-dot"></i>
              <p>Prishtina</p>
            </div>
          </div>
        </div>
        <div class="pitch__us">
          <h1>Pitch Us</h1>
          <form action="contact.php" method="POST" class="message">
            <textarea
              name="user_message"
              id=""
              cols="30"
              rows="5"
              placeholder="<?php 
                if((isset($_SESSION['sendMessage']) && $_SESSION['sendMessage']) && (isset($_SESSION['logged']) && $_SESSION['logged']))
                 {
                   echo 'Message Sent Successfully!';
                    $_SESSION['sendMessage'] = false;
                 } 
                 else if((isset($_SESSION['sendMessage']) && $_SESSION['sendMessage']) && (!isset($_SESSION['logged']) || !$_SESSION['logged']))
                 {
                   echo 'You need to be logged in to send a message!';
                    $_SESSION['sendMessage'] = false;
                 } 
                 else echo 'Impress Us...';
              ?>"
            ></textarea>
            <button class="send" type="submit" name="send_message">Send</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
