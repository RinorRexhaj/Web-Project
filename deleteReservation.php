<?php
    $reservationId = $_GET['id'];
    include_once 'reservationRepo.php';

    $reservationRepo = new ReservationRepo();

    $reservationRepo->deleteReservation($reservationId);

    header('Location: dashboard.php');
?>