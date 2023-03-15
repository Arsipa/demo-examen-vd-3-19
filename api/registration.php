<?php

session_start();
require_once "../db/connect.php";

$login = $_POST["login"];
$password = $_POST["password"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$patronymic = $_POST["patronymic"];
$email = $_POST["email"];

$check = mysqli_fetch_array(mysqli_query($connection, "SELECT id FROM `users` WHERE email = '$email' OR login = '$login'"));

if ($check) {
    echo "Почта или логин уже зарегистрированы";
} else {
    $user = mysqli_query($connection, "INSERT INTO `users`(`login`, `password`, `name`, `surname`, `patronymic`, `email`) VALUES ('$login', '$password', '$name', '$surname', '$patronymic', '$email')");

    if ($user) {
        echo "success";
    } else {
        echo "error";
    };
};
