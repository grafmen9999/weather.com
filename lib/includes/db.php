<?php
    include 'config.php';
    require 'rb.php';
    
    R::setup( 'mysql:host='.$config["db"]["host"].'; dbname='.$config["db"]["dbname"],$config['db']['username'], $config['db']['password'] );
    R::freeze(false);

    session_start();