<?php
    require_once("../lib/includes/db.php");
?>    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Логин</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_login.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/main.js"></script>
</head>

<body>
    <?php include("../lib/includes/header.php") ?>
    <div class="center">
        <div class="form__block">
            <h2>Авторизация</h2>
            <form id="form_login">
                <div><input type="email" name="email" id="email" placeholder="Email"></div>
                <div><input type="password" name="password" id="password" placeholder="Пароль"></div>
                <div id="submit"><input type="button" value="Авторизоваться"></div>
            </form>
        </div>
        <div class="help__block">
            Не зарегистрированы? <a href="./register.php">Регистрируйся</a> прямо сейчас!
        </div>
    </div>
</body>

</html>