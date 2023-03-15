<?php
session_start();
require_once "./db/connect.php";
$product_id = $_GET["product"];
$product = mysqli_fetch_array(mysqli_query($connection, "select * from products where id=$product_id"));
$category_id =  $product["category"];
$category_name = mysqli_fetch_array(mysqli_query($connection, "select name from cateogries where id=$category_id"))["name"];
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title><?php echo $product["name"] ?></title>
</head>

<body>
    <?php include("inc/header.php"); ?>
    <main class="main">
        <div class="container">
            <section class="product">
                <img src="<?php echo $product["img_url"] ?>" alt="<?php echo $product["name"] ?>" class="product__img">
                <div class="product__info">
                    <h2><?php echo $product["name"] ?></h2>
                    <p><span>Цена:</span> <?php echo number_format($product["price"], 0, ' ', ' '); ?> ₽</p>
                    <p><span>Модель:</span> <?php echo $product["model"] ?></p>
                    <p><span>Категория:</span> <?php echo $category_name ?></p>
                    <p><span>Производитель:</span> <?php echo $product["country"] ?></p>
                    <p><span>Год выпуска:</span> <?php echo $product["year"] ?></p>
                    <p><span>Осталось:</span> <?php echo $product["count"] ?></p>
                    <?php if ($_SESSION["id"]) : ?>
                        <button class="product-btn">Добавить в корзину</button>
                    <?php endif ?>
                </div>
            </section>
        </div>
    </main>
    <?php include("inc/footer.php"); ?>
</body>

</html>