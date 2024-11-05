<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = htmlspecialchars(trim($_POST['message']));
    $username = $_SESSION['username'];
    file_put_contents('messages.txt', "$username: $message\n", FILE_APPEND);
}
// Виконала Цись А.
$messages = file('messages.txt', FILE_IGNORE_NEW_LINES);
?>

