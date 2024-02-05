<?php

    session_start();

    if ((!isset($_SESSION['admin']) || !$_SESSION['admin'])) {
        echo '<h1 style="color: #f2f2f2;">Not Authorized</h1>
        <a href="home.php" style="text-decoration: none; color: #f2f2f2; font-size: 28px;">&larr;</a>';
        return;
    } 

    $email = $_GET['email'];
    include_once 'newsletterRepo.php';

    $newsletterRepo = new NewsletterRepo();

    $newsletterRepo->deleteNewsletter($email);

    header('Location: dashboard.php');
?>