<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/auth.css">
    <title>Регистрация</title>
</head>

<body>
    <div class="container">
        <div class="auth-wrapper">
            <div class="auth-inner">
                <h2>Регистрация</h2>
                <form class="auth" id="registration">
                    <input type="text" name="name" id="name" placeholder="Имя*" required>
                    <input type="text" name="surname" id="surname" placeholder="Фамилия*" required>
                    <input type="text" name="patronymic" id="patronymic" placeholder="Отчество">
                    <input type="text" name="login" id="login" placeholder="Логин*" required>
                    <input type="email" name="email" id="email" placeholder="Почта*" required>
                    <input type="password" name="password" id="password" placeholder="Пароль*" required minlength="6">
                    <input type="password" name="password_repeat" id="password_repeat" placeholder="Повторите пароль*" required minlength="6">
                    <label>Даю согласие на обработку персональных данных и регистрацию* <input type="checkbox" name="rules" id="rules" required></label>
                    <p class="error dn">Ошибка: <span>Неверные данные</span></p>
                    <button type="submit">Зарегистрироваться</button>
                </form>
                <a href="login.php" class="another-link">Уже есть аккаунт? Войти</a>
                <a href="index.php" class="another-link">На главную</a>
            </div>
        </div>
    </div>
    <script>
        function createError(error) {
            document.querySelector(".error").classList.remove('dn');
            document.querySelector(".error span").innerText = error;
        }

        function isFieldValid(field, validLetters, error) {
            let isError = false;
            field.value.trim().split("").forEach(letter => {
                if (!validLetters.includes(letter.toLowerCase())) {
                    createError(error)
                    isError = true;
                    return;
                }
            })

            return !isError;
        }

        function checkValidation() {
            const validСyrillic = 'абвгдеёжзийклмнопрстуфхцчшщъыьэюя -';
            const validLatin = 'abcdefghijklmnopqrstuvwxyz0123456789-';

            // имя
            let isNameValid = isFieldValid(document.getElementById("name"), validСyrillic, "Недопустимые символы в имени! Разрешено: кириллица, пробел, тире")

            // фамилия
            let isSurnameValid = isFieldValid(surname, validСyrillic, "Недопустимые символы в фамилии! Разрешено: кириллица, пробел, тире")

            // отчество
            let isPatronymicValid = true;
            if (patronymic.value != '') {
                isPatronymicValid = isFieldValid(patronymic, validСyrillic, "Недопустимые символы в отчестве! Разрешено: кириллица, пробел, тире")
            }

            // логин
            let isloginValid = isFieldValid(login, validLatin, "Недопустимые символы в логине! Разрешено: латиница, цифры, тире")

            // совпадение паролей
            let isPasswordValid = true;
            if (password.value != password_repeat.value) {
                isPasswordValid = false;
                createError("Пароли не совпадают!")
            }

            if (isNameValid && isSurnameValid && isPatronymicValid && isloginValid && isPasswordValid) {
                return true;
            } else {
                return false;
            }
        }

        registration.onsubmit = (e) => {
            e.preventDefault();
            if (checkValidation()) {
                let fd = new FormData(registration);
                fetch("./api/registration.php", {
                    body: fd,
                    method: "POST",
                }).then(response => {
                    return response.text()
                }).then(data => {
                    if (data == "success") {
                        window.location.replace("login.php")
                    } else {
                        createError(data);
                    }
                })
            }
        }
    </script>
</body>

</html>