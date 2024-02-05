<?php
    session_start();

    if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
        echo '<h1 style="color: #f2f2f2;">Not Authorized</h1>
        <a href="home.php" style="text-decoration: none; color: #f2f2f2; font-size: 28px;">&larr;</a>';
        // return;
    } 

    $reservationId = $_GET['id'];
    include_once 'reservationRepo.php';

    $reservationRepo = new ReservationRepo();

    $reservation = $reservationRepo->getReservationById($reservationId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/edit.css">
    <link
    rel = 'stylesheet'
    href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'
    integrity = 'sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=='
    crossorigin = 'anonymous'
    referrerpolicy = 'no-referrer'
    />
    <link rel = 'preconnect' href = 'https://fonts.googleapis.com' />
    <link rel = 'preconnect' href = 'https://fonts.gstatic.com' crossorigin />
    <link
    href = 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap'
    rel = 'stylesheet'
    />
    <title>Edit Reservation</title>
</head>
<body>
    <?php if(!isset($_SESSION['admin']) || !$_SESSION['admin']) return; ?>
    <div class="modal">
        <a href="dashboard.php" class="btn--close-modal">&larr;</a>
        <h2 class="modal__header">Edit Reservation</h2>
        <form class="modal__form" method="post" action="">
            <input type="text" name="destination"  value="<?=$reservation['Destination']?>">
            <input type="text" name="from"  value="<?=$reservation['FromRs']?>">
            <input type="date" name="checkIn" value="<?=$reservation['CheckIn']?>">
            <input type="date" name="checkOut" value="<?=$reservation['CheckOut']?>">
            <button class="btn" type="submit" name="editReservation">SAVE</button>
        </form>
    </div>
</body>
</html>

<?php 

if(isset($_POST['editReservation'])){
    $destination = $_POST['destination'];
    $from = $_POST['from'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];

   $reservationRepo->updateReservation($reservationId, $destination, $from, $checkIn, $checkOut, $reservation['UserID']);

   header('Location: dashboard.php');
}
?>