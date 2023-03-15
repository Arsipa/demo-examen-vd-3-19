<footer class="footer">
    <div class="container">
        <div class="footer__column">
            <a href="index.php" class="logo footer__logo">Copy Star</a>
        </div>
        <div class="footer__row">
            <div class="footer__column">
                <p class="footer__column-title">Рубрики</p>
                <nav class="nav footer__nav">
                    <a href="index.php" class="nav__link">Каталог</a>
                    <a href="about.php" class="nav__link">О нас</a>
                    <a href="map.php" class="nav__link">Где нас найти</a>
                </nav>
            </div>
            <div class="footer__column">
                <p class="footer__column-title">Категории</p>
                <nav class="nav footer__nav">
                    <?php foreach ($categories as $category) : ?>
                        <a href="index.php?category=<?php echo $category["id"] ?>" class="category nav__link"><?php echo $category["name"] ?></a>
                    <?php endforeach; ?>
                </nav>
            </div>
        </div>
        <p class="copyright">Copytight 2023</p>
    </div>
</footer>
<script src="../assets/js/active-link.js"></script>