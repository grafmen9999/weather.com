<?php
    require_once('../../lib/includes/db.php');

    if (isset($_POST['do_send'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $errors = array();

        if (empty(trim($email))) {
            $errors[] = "Email не может быть пустым!";
        }

        if (empty(trim($password))) {
            $errors[] = "Пароль не может быть пустым!";
        }

        if (empty($errors)) {
            $user = R::findOne('users', 'email = ?', array($email));

            if ($user) {
                if (password_verify($password, $user->password)) {
                    
                }
                else {
                    $errors[] = "Неверный пароль!";
                }
            }
            else {
                $errors[] = "Введенный email не зарегистрирован!";
            }
        }
        
        if (empty($errors)) {
            $_SESSION['user_log'] = $user;
            header('DB_SUCCESS: 1');
            echo 'Вы успешно авторизовались!';
        }
        else {
            header('DB_SUCCESS: 0');
            echo array_shift($errors);
        }
    }
    

?>