<?php
    require_once("../lib/includes/db.php");
?>    
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Фидбеки</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_list-feedback.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/main.js"></script>
</head>

<body>
    <?php include("../lib/includes/header.php"); ?>
    <div class="container">
        <h2>Обратная связь</h2>
        <?php if (isset($_SESSION['user_log'])) { ?>
        <div class="items">
            <?php 
            if (R::count('feedback') > 0) {
                $feedbacks = R::findAll('feedback');
            ?>
            <?php foreach($feedbacks as $feedback) { ?>
            <div class="item">
                <div class="author">
                    <?php echo $feedback->name; ?>
                </div>
                <div class="message">
                    <pre><?php echo $feedback->message; ?></pre>
                </div>
            </div>
            <?php }} else {
                echo '<div align="center">Сообщений нет!</div>';
            } ?>
        </div>

        <?php } else { ?>
        <div>Вы не авторизованы, пожалуйста авторизуйтесь по этой <a href="./login.php">ссылке</a></div>
        <?php } ?>
    </div>
</body>

</html>