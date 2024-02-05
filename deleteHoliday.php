<?php

    session_start();

    $holidayId = $_GET['id'];
    include_once 'holidayRepo.php';

    $holidayRepo = new HolidayRepo();
    $holiday = $holidayRepo->getHolidayById($holidayId);

    if((isset($_SESSION['admin']) && $_SESSION['admin']) || $holiday['User_ID'] == $_SESSION['userID']) {
        $holidayRepo->deleteHoliday($holidayId);
        header('Location: holidays.php');
        return;
    }

    if ($holiday['User_ID'] != $_SESSION['userID']) {
        echo '<h1 style="color: #f2f2f2;">Not Authorized</h1>
        <a href="home.php" style="text-decoration: none; color: #f2f2f2; font-size: 28px;">&larr;</a>';
        return;
    } 
?>