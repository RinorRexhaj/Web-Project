<?php
  session_start();

  if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    echo '<h1>Not Authorized</h1>';
    
  } 

  include_once "userRepo.php";
  include_once "user.php";
  $userRepo = new UserRepo();
  $users = $userRepo->getUsers();

  include_once "newsletterRepo.php";
  $newsletterRepo = new NewsletterRepo();
  $newsletters = $newsletterRepo->getNewsletters();

  $holidays_arr = [];

  $contact_messages = [];

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/dashboard.css">
  <link rel="stylesheet" href="./css/nav.css">
  <script defer src="./js/dashboard.js"></script>
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
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
  <title>Dashboard</title>
</head>
<body>
  <div class="banner">
    <?php include "header.php"; ?>
  </div>
  <div class="container">
      <div class="sidebar">
        <h1>Tables</h1>
        <button>
          <i class="fa-solid fa-table"></i>
        </button>
        <div class="tables">
          <button type="submit" class="table current usersbtn">
            <span class="indc">
              <i class="fa-user fa-solid"></i>
            </span>
            <h3>Users</h3>
          </button>
          <button type="submit" class="table holidaysbtn">
            <span class="indc">
              <i class="fa-gift fa-solid"></i>
            </span>
            <h3>Holidays</h3>
          </button>
          <button type="submit" class="table newsletterbtn">
            <span class="indc">
              <i class="fa-newspaper fa-solid"></i>
            </span>
            <h3>Newsletter</h3>
          </button>
          <button type="submit" class="table contactbtn">
            <span class="indc">
              <i class="fa-message fa-solid"></i>
            </span>
            <h3>Contact</h3>
          </button>
        </div>
      </div>
      <div class="dashboard users_dash">
        <h1>Users: <?php echo count($users); ?></h1>
        <div class="table-container">
        <table>
          <thead class="fixed">
            <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Password</th>
              <th>Admin</th>
              <th colspan=2>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($users as $user) {
                $isAdmin = $user['Admin'] ? '&#9989' : '&#10060';
                echo "
                <tr>
                  <td>{$user['ID']}</td>
                  <td>{$user['Username']}</td>
                  <td>{$user['FullName']}</td>
                  <td>{$user['Email']}</td>
                  <td>{$user['Password']}</td>
                  <td>{$isAdmin}</td>
                  <td><a href='editUser.php?id={$user['ID']}' class='edit'>EDIT</a></td>
                  <td><a href='deleteUser.php?id={$user['ID']}' class='delete'>DELETE</a></td>
                </tr>";
              }
            ?>
          </tbody>
        </table>
      </div>

      </div>
      <div class="dashboard holidays_dash hidden">
        <h1>Added Tours: <?php echo count($holidays_arr); ?></h1>
        <div class="table-container">
        <table>
          <thead class="fixed">
            <tr>
              <th>Username</th>
              <th>Title</th>
              <th style="width:250px;">Description</th>
              <th>Location</th>
              <th>Price</th>
              <th>Image</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($holidays_arr as $holiday) {
                echo "<tr>";
                echo "<td>{$holiday['username']}</td>";
                echo "<td>{$holiday['title']}</td>";
                echo "<td>{$holiday['description']}</td>";
                echo "<td>{$holiday['location']}</td>";
                echo "<td>{$holiday['price']}</td>";
                echo "<td>{$holiday['img']}</td>";
                echo "</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>

      </div>
      <div class="dashboard newsletter_dash hidden">
        <h1>Newsletter Subscribers: <?php echo count($newsletters); ?></h1>
        <div class="table-container">
        <table>
          <thead class="fixed">
            <tr>
              <th>Email</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($newsletters as $newsletter) {
                echo "<tr>
                      <td>{$newsletter['Email']}</td>
                      <td><a href='deleteNewsletter.php?email={$newsletter['Email']}' class='delete'>DELETE</a></td>
                     </tr>";
              }
            ?>
          </tbody>
        </table>
      </div>

      </div>
      <div class="dashboard contact_dash hidden">
        <h1>Users Messages: <?php echo count($contact_messages); ?></h1>
        <div class="table-container">
        <table>
          <thead class="fixed">
            <tr>
              <th>Username</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Message</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $contact_messages = file_exists('contact_array.php') ? include 'contact_array.php' : [];
              foreach ($contact_messages as $message) {
                echo "<tr>
                      <td>{$message['username']}</td>
                      <td>{$message['fullname']}</td>
                      <td>{$message['email']}</td>
                      <td>{$message['message']}</td>
                      </tr>";
                }
              ?>
          </tbody>
        </table>
      </div>

      </div>
    </div>
</body>
</html>
