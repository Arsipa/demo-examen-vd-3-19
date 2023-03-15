<?php
session_start();
require_once "./db/connect.php";
$last_products = mysqli_query($connection, "SELECT * FROM `products` where count != 0 ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Copy Star - О нас</title>
</head>

<body>
    <?php include("inc/header.php"); ?>
    <main class="main">
        <section class="about">
            <div class="container">
                <h2>О нас</h2>
                <p class="logo about__logo">Copy Star</p>
                <p>
                    Наш девиз - Пришел, увидел, распечатал!
                </p>
                <p>
                    С 2017 года Copy Star поставляет технику для печати на российский рынок оптом. За пять лет мы смогли укрепить свои позиции на рынке оборудования, вырастили персонал, прекрасно разбирающийся в каждом товаре и комплектующих.
                </p>
                <p>
                    Если вы хотите купить нашу продукцию оптом, то с нами можете быть уверены как в качестве техники, так и в надёжности сотрудничества. Лучше всего о нас говорит репутация!
                </p>
            </div>
        </section>
        <section class="slider-section">
            <div class="container">
                <h2>Наши последние товары</h2>
                <div class="slider">
                    <div class="slider__track">
                        <?php foreach ($last_products as $product) : ?>
                            <div class="slide">
                                <div class="slide__img-wrapper">
                                    <img src="<?php echo $product["img_url"]; ?>" alt="<?php echo $product["name"]; ?>" class="card__img slide__img">
                                </div>
                                <div class="slide__info card">
                                    <h4 class="card__name"><?php echo $product["name"]; ?></h4>
                                    <p class="card__price"><?php echo number_format($product["price"], 0, ' ', ' '); ?> ₽</p>
                                    <p class="card__price">Производитель: <?php echo $product["country"]; ?></p>
                                    <div class="card__btns">
                                        <a href="product-details.php?product=<?php echo $product["id"]; ?>" class="card__btn">Подробнее</a>
                                        <?php if ($_SESSION["id"]) : ?>
                                            <button class="card__btn">В корзину</button>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="slider__btns">
                        <button class="prev">Назад</button>
                        <button class="next">Вперед</button>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <?php include("inc/footer.php"); ?>
    <script src="./assets/js/slider.js"></script>
</body>

</html>