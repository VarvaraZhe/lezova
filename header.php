<header>
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="index.php">Главная</a>
    </li>
    <?php if (isset($_SESSION['users_id'])): ?>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Личный кабинет</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="die.php">Выход</a>
      </li>
    <?php else: ?>
      <li class="nav-item">
        <a class="nav-link" href="auto.php">Вход</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reg.php">Регистрация</a>
      </li>
    <?php endif; ?>
  </ul>
</header>