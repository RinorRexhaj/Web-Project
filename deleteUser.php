<?php
    $userId = $_GET['id'];
    include_once 'userRepo.php';

    $userRepo = new UserRepo();

    $userRepo->deleteUser($userId);

    header('Location: dashboard.php');
?>