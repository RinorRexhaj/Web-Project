<?php
    $contactId = $_GET['id'];
    include_once 'contactRepo.php';

    $contactRepo = new ContactRepo();

    $contactRepo->deleteContact($contactId);

    header('Location: dashboard.php');
?>