<?php
require_once "./db/connect.php";
$categories = mysqli_query($connection, "select * from cateogries");
?>
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="header__row">
                <a href="mailto:info@copystar.ru">info@copystar.ru</a>
                <a href="tel:+7(999)999-99-99">+7 (999) 999-99-99</a>
            </div>
        </div>
    </div>
    <div class="header__bottom">
        <div class="container">
            <div class="header__row">
                <a href="index.php" class="logo header__logo">Copy Star</a>
                <nav class="nav header__nav">
                    <a href="index.php" class="nav__link">Каталог</a>
                    <a href="about.php" class="nav__link">О нас</a>
                    <a href="map.php" class="nav__link">Где нас найти</a>
                </nav>
                <div class="header__btns">
                    <?php if ($_SESSION["id"]) : ?>
                        <a href="profile.php" class="header__btn">Профиль</a>
                        <a href="cart.php" class="header__btn">Корзина</a>
                    <?php else : ?>
                        <a href="login.php" class="header__btn">Вход</a>
                        <a href="registration.php" class="header__btn">Регистрация</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>