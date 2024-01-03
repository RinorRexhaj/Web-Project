<?php
  session_start();
  if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: login.php');
    exit();
  }
  include "users.php";
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

</body>
</html>
