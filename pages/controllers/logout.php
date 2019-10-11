<?php
    // require_once('../../lib/includes/db.php');
    session_start();

    if (isset($_POST['do_send'])) {
        unset($_SESSION['user_log']);
    }
?>