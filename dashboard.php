<?php
  session_start();

  if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
    echo '<h1>Not Authorized</h1>';
    
  } 

  include "users.php";
  include "holidays_array.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/dashboard.css">
  <link rel="stylesheet" href="./css/nav.css">
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
  <title>Dashboard</title>
</head>
<body>
  <div class="banner">
    <?php include "header.php"; ?>
  </div>
  <div class="container">
      <div class="sidebar">
        <h1>Tables</h1>
        <div class="tables">
          <div class="table current">
            <span class="indc">
              <i class="fa-gift fa-solid"></i>
            </span>
            <button type="submit">Holidays</button>
          </div>
          <div class="table">
            <span class="indc">
              <i class="fa-user fa-solid"></i>
            </span>
            <button type="submit">Users</button>
          </div>
          <div class="table">
            <span class="indc">
              <i class="fa-newspaper fa-solid"></i>
            </span>
            <button type="submit">Newsletter</button>
          </div>
          <div class="table">
            <span class="indc">
              <i class="fa-message fa-solid"></i>
            </span>
            <button type="submit">Contact</button>
          </div>
        </div>
      </div>
      <div class="dashboard">
        <h1>User Dashboard</h1>
        <table>
          <thead>
            <tr>
              <th>Username</th>
              <th>Full Name</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($users as $user) {
                echo "<tr>";
                echo "<td>{$user['username']}</td>";
                echo "<td>{$user['fullname']}</td>";
                echo "<td>{$user['email']}</td>";
                echo "</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
      <div class="dashboard hidden">
        <h1>Added Tour Dashboard</h1>
        <table>
          <thead>
            <tr>
              <th>Username</th>
              <th>Email</th>
              <th>Title</th>
              <th style="width:350px;">Description</th>
              <th>Location</th>
              <th>Price</th>
              <th>Image</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($holidays_arr as $holiday) {
                echo "<tr>";
                echo "<td>{$holiday['added_by']['username']}</td>";
                echo "<td>{$holiday['added_by']['email']}</td>";
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
</body>
</html>
