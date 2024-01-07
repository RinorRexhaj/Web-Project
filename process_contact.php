<?php
session_start();

if (isset($_POST['submit_message'])) {
    $user_message = $_POST['user_message'];
    $contact_messages = file_exists('contact_array.php') ? include 'contact_array.php' : [];
    $contact_messages[] = [
        'username' => $_SESSION['username'],
        'fullname' => $_SESSION['fullname'],
        'email' => $_SESSION['email'],
        'message' => $user_message,
    ];
    file_put_contents("contact_array.php", "<?php\nreturn " . var_export($contact_messages, true) . ";\n");
    header('Location: contact.php');
}
?>
