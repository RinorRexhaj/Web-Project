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
  <title>Dashboard</title>
</head>
<body>
  <div class="banner">
    <?php include "header.php"; ?>
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
    <div class="dashboard">
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
