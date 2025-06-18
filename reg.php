<?php
session_start();
if (isset($_GET['error'])) {
    $error = $_GET['error'] == 'email' ? 'Пользователь с таким email уже зарегистрирован' : 'Ошибка регистрации';
}
require_once 'style.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
</head>
<body>
    <div class="container">
    <h2>Регистрация</h2>
    <?php if (!empty($error)): ?>
        <div><?= $error ?></div>
    <?php endif; ?>
    <form action="regwork.php" method="post">
        <input type="text" name="name" placeholder="ФИО" required
        pattern="[А-Яа-яЁё\s]{3,}"
        title="Только русские буквы и пробелы">
        <input type="text" name="login" placeholder="Логин" required
        pattern="[A-Za-z]{5,}"
        title="Только латиница, не менее 5 символов">
        <input type="email" name="email" placeholder="Email" required>
        <input type="phone" name="phone" placeholder="Phone" required
        pattern="\+7\(\d{3}\)-\d{3}-\d{2}-\d{2}"
        title="Формат +7(XXX)-XXX-XX-XX">
        <input type="password" name="password" placeholder="Пароль" required minlength="6">
        <button type="submit">Зарегистрироваться</button>
    </form>
    <a href="index.php"><button>Главная</button></a>
</div>
</body>
</html>