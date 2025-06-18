<?php
// Начало сессии для хранения данных пользователя
session_start();
?>
<?php require_once 'style.php'?>
<!DOCTYPE html>
<html>
<head>
  <title>Главная</title>
</head>
<body>
    <div class="container">
    <h2>Добро пожаловать!</h2>
    <a href="auto.php"><button>Войти</button></a>
    <a href="reg.php"><button>Регистрация</button></a>
  </div>
</body>
</html>