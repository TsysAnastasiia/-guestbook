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
// Виконана Цись А.
$messages = file('messages.txt', FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Гостьова книга</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Гостьова книга</h1>
        <form method="POST">
            <textarea name="message" placeholder="Ваше повідомлення" required></textarea>
            <button type="submit">Додати запис</button>
        </form>

        <h2>Записи</h2>
        <?php foreach ($messages as $msg): ?>
            <p><?php echo htmlspecialchars($msg); ?></p>
        <?php endforeach; ?>
    </div>
</body>
</html>