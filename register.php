<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    // Зберігаємо користувача у файл
    file_put_contents('users.txt', "$username|$password\n", FILE_APPEND);
    header('Location: login.php');
}
// Виконана Цись А.
?>
