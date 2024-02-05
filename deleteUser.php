<?php

    session_start();

    if ((!isset($_SESSION['admin']) || !$_SESSION['admin'])) {
        echo '<h1 style="color: #f2f2f2;">Not Authorized</h1>
        <a href="home.php" style="text-decoration: none; color: #f2f2f2; font-size: 28px;">&larr;</a>';
        return;
    } 

    $userId = $_GET['id'];
    include_once 'userRepo.php';

    $userRepo = new UserRepo();

    $userRepo->deleteUser($userId);

    header('Location: dashboard.php');
?>