<?php
session_start();
require_once "./db/connect.php";
$current_category = $_GET["category"];
if ($current_category) {
    $products = mysqli_query($connection, "select * from products where category = $current_category and count != 0");
} else {
    $products = mysqli_query($connection, "select * from products where count != 0");
};
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Copy Star - Каталог</title>
</head>

<body>
    <?php include("inc/header.php"); ?>
    <main class="main">
        <section class="catalog">
            <div class="container">
                <h2>Каталог</h2>
                <div class="categories">
                    <p class="category">Категории:</p>
                    <?php foreach ($categories as $category) : ?>
                        <a href="index.php?category=<?php echo $category["id"] ?>" class="category"><?php echo $category["name"] ?></a>
                    <?php endforeach; ?>
                </div>
                <div class="sort">
                    <label class="sort__label">
                        <p>Сортировать по:</p>
                        <select name="sort" id="sort" class="sort__select">
                            <option value="new">Новизне</option>
                            <option value="year">Году производства</option>
                            <option value="name">Названию</option>
                            <option value="price">Цене</option>
                        </select>
                    </label>
                </div>
                <div class="catalog__list">
                    <?php if (count(mysqli_fetch_all($products)) != 0) : ?>
                        <?php foreach ($products as $product) : ?>
                            <div class="card-wrapper">
                                <div class="card">
                                    <img src="<?php echo $product["img_url"]; ?>" alt="<?php echo $product["name"]; ?>" class="card__img">
                                    <h4 class="card__name"><?php echo $product["name"]; ?></h4>
                                    <p class="card__price"><?php echo number_format($product["price"], 0, ' ', ' '); ?> ₽</p>
                                    <div class="card__btns">
                                        <a href="product-details.php?product=<?php echo $product["id"]; ?>" class="card__btn">Подробнее</a>
                                        <?php if ($_SESSION["id"]) : ?>
                                            <button class="card__btn">В корзину</button>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="warning">Товаров в этой категории нет</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>
    <?php include("inc/footer.php"); ?>
</body>

</html>