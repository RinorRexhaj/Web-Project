<?php
    $email = $_GET['email'];
    include_once 'newsletterRepo.php';

    $newsletterRepo = new NewsletterRepo();

    $newsletterRepo->deleteNewsletter($email);

    header('Location: dashboard.php');
?>