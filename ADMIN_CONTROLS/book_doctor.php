<?php

use Dom\Mysql;  

    session_start();
    include '../conn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $docname = $_POST['booked_doc'];
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $time = $_POST['appointment_time'];
        $date = $_POST['appointment_date'];
        $number = $_POST['contact_number'];
        $email = $_POST['email'];

        $docname = mysqli_real_escape_string($conn, $docname);
        $fname = mysqli_real_escape_string($conn, $fname);
        $lname = mysqli_real_escape_string($conn, $lname);
        $time = mysqli_real_escape_string($conn, $time);
        $date = mysqli_real_escape_string($conn, $date);
        $number = mysqli_real_escape_string($conn, $number);
        $email = mysqli_real_escape_string($conn, $email);

        $sql = "INSERT INTO book_list (doctor_booked, first_name, last_name, time, date, phone_number, email) VALUES ('$docname' ,'$fname' , '$lname', '$time', '$date', '$number', '$email')";

        if (mysqli_query($conn, $sql)) {
            header('Location: ../../Services_page/appointment.php');
            exit();
        }
        else {
            echo "Error: " . mysqli_error($conn);
        }

    }
    else {
        echo "Invalid request.";
    }
?>