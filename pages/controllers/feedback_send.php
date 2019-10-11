<?php
    require_once('../../lib/includes/db.php');

    if (isset($_POST['do_send'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $msg = $_POST['message'];

        $errors = array();

        if (empty(trim($msg))) {
            $errors[] = "Нельзя отправлять пустые сообщения!";
        }

        if (empty($errors)) {
            $feedback = R::dispense('feedback');

            $feedback->message = $msg;
            $feedback->name = $name;
            $feedback->email = $email;

            R::store($feedback);
            header("DB_SUCCESS: 1");

            echo "Сообщение отправлено!";
        }
        else {
            header("DB_SUCCESS: 0");
            echo array_shift($errors);
        }

    }
?>