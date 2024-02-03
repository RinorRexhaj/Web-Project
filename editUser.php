
<?php

    session_start();

    if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
        echo '<h1 style="color: #f2f2f2;">Not Authorized</h1>
        <a href="home.php" style="text-decoration: none; color: #f2f2f2; font-size: 28px;">&larr;</a>';
    } 

    $userId = $_GET['id'];
    include_once 'userRepo.php';

    $userRepo = new UserRepo();

    $user = $userRepo->getUserById($userId);
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
    <title>Edit User</title>
</head>
<body>
    <?php if (!isset($_SESSION['admin']) || !$_SESSION['admin']) return; ?>
    <div class="modal">
        <a href="dashboard.php" class="btn--close-modal">&larr;</a>
        <h2 class="modal__header">Edit User</h2>
        <form class="modal__form" method="post" action="">
            <input type="text" name="username"  value="<?=$user['Username']?>">
            <input type="text" name="fullname"  value="<?=$user['FullName']?>">
            <input type="text" name="email"  value="<?=$user['Email']?>">
            <input type="text" name="password"  value="<?=$user['Password']?>">
            <div class="admin">
                <p>Admin?</p>
                <div class="admin_input">
                    <input type="radio" id="admin1" name="admin" value="1" <?php if($user['Admin'] == '1') echo 'checked';
                    ?>>
                    <label for="admin1">&#9989</label>
                </div>
                <div class="admin_input">
                    <input type="radio" id="admin0" name="admin" value="0" <?php if($user['Admin'] == '0') echo 'checked';
                    ?>>
                    <label for="admin0">&#10060</label>
                </div>
            </div>
            <button class="btn" type="submit" name="edit">SAVE</button>
        </form>
    </div>
</body>
</html>

<?php 
if(isset($_POST['edit'])){
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $admin = $_POST['admin'];

    $userRepo->updateUser($userId,$username,$fullname,$email,$password,$admin);

    header("Location: dashboard.php");
}
?>