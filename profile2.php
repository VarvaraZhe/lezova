<?php
session_start();
if (!isset($_SESSION['users_id'])) {
    header("Location: avtoriz.php");
    exit();
}
require_once 'style.php';
require_once 'db.php';?>
<body>
    <div class="container">
        <ul>
            <?php
            $users_id = $_SESSION['users_id'];
            $result = $db->query("SELECT `orders_id`, `orders`, `status`, `date`,`adres` 
        FROM `application` 
        JOIN `orders` USING (`orders_id`)
        JOIN `status` USING (`status_id`) 
        WHERE `users_id`='{$users_id}'
        ORDER BY `date` DESC");
            if (!$result) {
                die("Ошибка выполнения запроса: " . $db->error);
            }
            echo "<li>";
            while ($row = $result->fetch_assoc()) {
            echo "<span>{$row['adres']} </span>
            <span>{$row['date']} </span>
            <span> {$row['orders']} </span>
            <span>({$row['status']})</span> <br>";
            }
            echo "</li>"; ?>
            <a href="profile.php"><button>Назад</button></a>
        </ul>
    </div>
</body>