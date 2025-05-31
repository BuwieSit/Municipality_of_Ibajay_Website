<?php

  include './conn.php';

  //admin login
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $mysqli = require __DIR__ . './conn.php';
        $sql = sprintf('SELECT * FROM admin_accounts WHERE email = "%s"', $mysqli->real_escape_string($_POST['email']));

        $result = $mysqli->query($sql);

        $user = $result->fetch_assoc();
        var_dump($user);
        exit;


    }


?>