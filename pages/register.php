<?php
    require_once("../lib/includes/db.php");
?>    
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_register.css">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/main.js"></script>
</head>

<body>
    <?php include("../lib/includes/header.php"); ?>
    <div class="center">
        <h2>Регистрация</h2>
        <form id="form_register">
            <div id="block__name">
                <label for="firstName">Введите имя</label>
                <input type="text" id="firstName" name="firstName" placeholder="Введите имя" required>
                <label for="lastName">Введите фамилию</label>
                <input type="text" id="lastName" name="lastName" placeholder="Введите фамилию" required>
            </div>
            <div id="block__email">
                <label for="email">Введите email</label>
                <input type="email" name="email" id="email" placeholder="Введите email" required>
            </div>
            <div id="block__password">
                <div>
                    <label for="password">Введите пароль</label>
                    <input type="password" name="password" id="password" placeholder="Введите пароль" required>
                </div>
                <div>
                    <label for="password-confirm">Введите повторно пароль</label>
                    <input type="password" name="password-conform" id="password-confirm" placeholder="Введите повторно пароль" required>
                </div>
            </div>
            <div>Выберите пол</div>
            <div id="block__sex">
                <div>
                    <input type="radio" id="sexMale" name="sex" value="1">
                    <label for="sexMale">Муж</label>
                </div>
                <div>
                    <input type="radio" id="sexFemale" name="sex" value="0">
                    <label for="sexFemale">Жен</label>
                </div>
            </div>
            <div id="block__date-birth">
                <label for="date-birth">Год рождения</label>
                <input type="date" name="date-birth" id="date-birth">
            </div>
            <div id="submit"><input type="button" value="Зарегистрироваться" name="do_send"></div>

        </form>
    </div>
</body>

</html>