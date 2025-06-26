<?php 

    try {
        $conn = mysqli_connect('localhost', 'root', '', 'ibajay_db');

    }
    catch (mysqli_sql_exception) {
        echo('Not connecting ' . mysqli_connect_error());
    }

?>

