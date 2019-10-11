<?php
    require_once("../lib/includes/db.php");

    $b = false;
    if (isset($_SESSION['user_log'])) {
        $user = $_SESSION['user_log'];
        $b = true;
    }
?>    
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма обратной связи</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_feedback.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/main.js"></script>
</head>

<body>
    <?php include("../lib/includes/header.php") ?>
    <div class="container">
        <div class="center">
            <h2>Обратная связь</h2>
            <form id="form__feedback">
                <div id="block__name">
                    <label for="name">Ваше имя</label>
                    <input type="text" placeholder="Имя" id="name" required  <?php if($b){
                        echo 'value = "'.$user->name.' '.$user->surname.'" disabled';
                    } ?>>
                </div>
                <div id="block__email">
                    <label for="email">Ваш email</label>
                    <input type="email" id="email" placeholder="Email" required <?php if($b){
                        echo 'value = "'.$user->email.'" disabled';
                    } ?>>
                </div>
                <div>
                    <textarea id="message" placeholder="Message" required></textarea>
                </div>
                <div id="submit">
                    <input type="button" value="Отправить">
                </div>
            </form>
        </div>
    </div>
</body>

</html>