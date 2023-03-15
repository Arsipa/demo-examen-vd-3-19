<?php
session_start();
require_once "./db/connect.php";
$session_id = $_SESSION["id"][0];
$user = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM `users` where id = '$session_id'"));
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Профиль - <?php echo $user["name"] ?></title>
</head>

<body>
    <?php include("inc/header.php"); ?>
    <main class="main">

        <a href="./api/logout.php">Выйти из профиля</a>

    </main>
    <?php include("inc/footer.php"); ?>
</body>

</html>