<?php 

    try {
        $conn = mysqli_connect('localhost', 'admin', 'ibajayadmin', 'ibajay_db');
        echo 'Connection Successful';
    }
    catch (mysqli_sql_exception) {
        echo('Not connecting ' . mysqli_connect_error());
    }

?>