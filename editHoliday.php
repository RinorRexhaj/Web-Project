
<?php

    session_start();

    $holidayId = $_GET['id'];
    include_once 'holidayRepo.php';
    $holidayRepo = new HolidayRepo();
    $holiday = $holidayRepo->getHolidayById($holidayId);

    if ((!isset($_SESSION['admin']) || !$_SESSION['admin']) && $holiday['User_ID'] != $_SESSION['userID']) {
        echo '<h1 style="color: #f2f2f2;">Not Authorized</h1>
        <a href="home.php" style="text-decoration: none; color: #f2f2f2; font-size: 28px;">&larr;</a>';
        return;
    } 

    if(isset($_POST['editHoliday'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        $location = $_POST['location'];
        $price = $_POST['price'];
        if(isset($_POST['image'])) $image = $_POST['image'];
        else $image = $holiday->getImage();
    
        $holidayRepo->updateHoliday($holidayId, $title, $description, $location, $price, $image, $_SESSION['userID']);
    
        if ((!isset($_SESSION['admin']) || !$_SESSION['admin']) && isset($_SESSION['userID']))
            header('Location: holidays.php');
        else header('Location: dashboard.php');
    }
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
    <title>Edit Holiday</title>
</head>
<body>
    <?php if ((!isset($_SESSION['admin']) || !$_SESSION['admin']) && $holiday['User_ID'] != $_SESSION['userID']) return; ?>
    <div class="modal">
        <a href="dashboard.php" class="btn--close-modal">&larr;</a>
        <h2 class="modal__header">Edit Holiday</h2>
        <form class="modal__form" method="post" action="">
            <input type="text" name="title"  value="<?=$holiday['Title']?>">
            <textarea type="text" name="description"><?php echo $holiday['Description']; ?></textarea>
            <input type="text" name="location"  value="<?=$holiday['Location']?>">
            <input type="number" name="price"  value="<?=$holiday['Price']?>">
            <input type="file" name="image"  value="<?=$holiday['Image']?>" required>
            <button class="btn" type="submit" name="editHoliday">SAVE</button>
        </form>
    </div>
</body>
</html>
