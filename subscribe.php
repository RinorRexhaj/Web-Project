<?php
session_start();
include "users.php";
include "subscribed_users.php";

if (isset($_POST['newsletter'])) {
    $subscribe_email = $_POST['subscribe_email'];
    if ($_SESSION['email'] == $subscribe_email && !in_array($subscribe_email, $subscribed_users)) {
        $subscribed_users[] = $subscribe_email;
        $_SESSION['newsletter'] = true;
    }
}

file_put_contents("subscribed_users.php", "<?php\n\$subscribed_users = " . var_export($subscribed_users, true) . ";\n");
header('Location: home.php');

?>
