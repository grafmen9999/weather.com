<header>
    <?php if (isset($_SESSION['user_log'])) {?>
    <div class="about-user">
        <div class="user">
            <div class="name"><?php echo $_SESSION['user_log']->name ?></div>
            <div class="surname"><?php echo $_SESSION['user_log']->surname ?></div>
            <div class="email"><?php echo $_SESSION['user_log']->email ?></div>
        </div>
        <input type="button" value="Выйти" class="logout">
    </div>
    <?php } ?>
    <ul>
        <li><a href="/">На главную</a></li>
        <li><a href="/pages/feedback.php">Форма обратной связи</a></li>
        <li><a href="/pages/list_feedback.php">Список сообщений от обратной связи</a></li>
        <li><a href="/pages/register.php">Форма регистрации</a></li>
        <li><a href="/pages/login.php">Форма авторизации</a></li>
        <li><a href="/pages/weather.php">Страница с погодой</a></li>
    </ul>
</header>