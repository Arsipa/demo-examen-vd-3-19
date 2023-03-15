<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/auth.css">
    <title>Авторизация</title>
</head>

<body>
    <div class="container">
        <div class="auth-wrapper">
            <div class="auth-inner">
                <h2>Авторизация</h2>
                <form class="auth" id="auth">
                    <input type="text" name="login" id="login" placeholder="Логин" required>
                    <input type="password" name="password" id="password" placeholder="Пароль" required>
                    <p class="error dn">Ошибка: Неверные данные</p>
                    <button type="submit">Войти</button>
                </form>
                <a href="registration.php" class="another-link">Ещё нет аккаунта? Зарегистрируйтесь</a>
                <a href="index.php" class="another-link">На главную</a>
            </div>

        </div>
    </div>
    <script>
        auth.onsubmit = (e) => {
            e.preventDefault();
            let fd = new FormData(auth);
            fetch("./api/auth.php", {
                body: fd,
                method: "POST",
            }).then(response => {
                return response.text()
            }).then(data => {
                if (data == "success") {
                    window.location.replace("profile.php")
                } else {
                    document.querySelector(".error").classList.remove('dn');
                }
            })
        }
    </script>
</body>

</html>