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

<!DOCTYPE html>
<html>
<head>
    <title>Вхід</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Вхід</h1>
        <form method="POST">
            <input type="text" name="username" placeholder="Логін" required>
            <input type="password" name="password" placeholder="Пароль" required>
            <button type="submit">Увійти</button>
        </form>
    </div>
</body>
</html>
