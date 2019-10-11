<?php
    require_once("../../lib/includes/db.php");
    
    if (isset($_POST['do_send'])) {
        $fName = $_POST['firstName'];
        $lName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password-confirm'];
        $sex = $_POST['sex']; // sex = { 0 - Жен; 1 - Муж }
        $date_birth = $_POST['date-birth'];

        $regular_email = "/[a-zA-Z0-9]*\@[a-zA-Z0-9]*\.[a-zA-Z0-9]*/ui";
        // $regular_email = "/[a-zA-Z0-9]*\@(gmail|mail|ukr)*\.(com|ru|ua|net)*/ui";

        $errors = array();

        if (empty($date_birth)) { // Дата передается, но она пустая
            unset($date_birth);
        }

        if (empty($sex)) { // Дата передается, но она пустая
            unset($sex);
        }

        if (empty(trim($fName))) {
            $errors[] = "Имя не может быть пустым!";
        }
        if (empty(trim($lName))) {
            $errors[] = "Фамилия не может быть пустым!";
        }
        if (empty(trim($email))) {
            $errors[] = "Email не должно быть пустым!";
        }
        if (empty(trim($password))) {
            $errors[] = "Пароль не может быть пустым!";
        }
        if (empty(trim($password_confirm))) {
            $errors[] = "Повторный пароль не может быть пустым!";
        }

        if (!preg_match($regular_email, $email)) {
            $errors[] = "Email не подходит под формат!";
        }
        
        if (R::count('users', 'email = ?', array($email)) > 0) {
            $errors[] = "Такой email уже зарегистрирован!";
        }

        if ($password != $password_confirm) {
            $errors[] = "Пароли не совпадают!";
        }

        if (empty($errors)) {
            $user = R::dispense('users');

            $user->name = $fName;
            $user->surname = $lName;
            $user->email = $email;
            $user->password = password_hash($password, PASSWORD_DEFAULT);

            $user->sex = $sex;
            $user->date_birth = $date_birth;

            R::store($user);

            header("DB_SUCCESS: 1");
            echo "Вы успешно зарегистрировались!"; // ответ от сервера для клиента!

            $_SESSION['user_log'] = $user; // сразу авторизуем пользователя

        }
        else {
            header("DB_SUCCESS: 0");
            echo array_shift($errors); // ответ от сервера для клиента!
        }
        
    }
?>