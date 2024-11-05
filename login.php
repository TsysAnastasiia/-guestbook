<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $users = file('users.txt', FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($fileUser, $filePass) = explode('|', $user);
        if ($fileUser === $username && password_verify($password, $filePass)) {
            $_SESSION['username'] = $username;
            header('Location: guestbook.php');
            exit;
        }
    }
    echo "Неправильний логін або пароль.";
}
// Виконана Цись А.
?>

