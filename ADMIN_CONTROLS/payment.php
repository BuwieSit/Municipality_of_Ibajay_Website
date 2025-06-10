<?php 
    session_start();
    include '../conn.php';

    $number = $_POST['usernumber'];
    $email = $_POST['email'];
    $permit = $_POST['permit_type'];

    $query = "INSERT INTO payments (usernumber, email, permit_type) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'iss', $number, $email, $permit);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../Services_page/permits.html");

    } else {
        echo "Error saving payment: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
?>
