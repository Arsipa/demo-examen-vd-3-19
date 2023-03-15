<?php

session_start();
require_once "../db/connect.php";

if ($_SESSION["id"]) {
    $_SESSION["id"] = NULL;
    header("Location: /about.php");
}
