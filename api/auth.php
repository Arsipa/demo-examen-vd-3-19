<?php

session_start();
require_once "../db/connect.php";

$login = $_POST["login"];
$password = $_POST["password"];
$user_id = mysqli_fetch_array(mysqli_query($connection, "SELECT id FROM users WHERE login = '$login' AND password = '$password'"));

if ($user_id) {
    $_SESSION["id"] = $user_id;
    echo "success";
} else {
    echo "error";
};
