<?php 
session_start();
include './conn.php';

if (isset($_POST['signIn'])) {
    $unique = $_POST['unique'];
    $password = $_POST['password'];
    $errors = [];

    if (empty($unique)) {
        $errors['unique_error'] = "Unique ID is required.";
    }

    if (empty($password)) {
        $errors['password_error'] = "Password is required.";
    }

    if (!is_array($_SESSION)) {
        $_SESSION = [];
    }

    if (!empty($errors)) {
        $_SESSION = array_merge($_SESSION, $errors);
        header("Location: admin.php");
        exit();
    }


    $stmt = $conn->prepare("SELECT * FROM admin_accounts WHERE unique_id = ? AND admin_password = ?");
    $stmt->bind_param("ss", $unique, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $role = $user['role']; 

        $stmt->close();
        $conn->close();

        if ($role === 'super_admin') {
            header("Location: ./Admin_page/adminControl.php");
        } elseif ($role === 'content_manager') {
            header("Location: ./Admin_page/Content_manager/content.php");
        } elseif ($role === 'appoint_officer') {
            header("Location: ./Admin_page/Appoint_officer/appoint.php");
        } elseif ($role === 'helpdesk_officer') {
            header("Location: ./Admin_page/Helpdesk_officer/helpdesk.php");
        } elseif ($role === 'tourism_coordinator') {
            header("Location: ./Admin_page/Tourism_coor/tourism.php");
        } elseif ($role === 'transp_officer') {
            header("Location: ./Admin_page/Transp_officer/transparency.php");
        } elseif ($role === 'services_manager') {
            header("Location: ./Admin_page/Services_manager/services.php");
        }
        else {
            $_SESSION['unique_error'] = "Unknown role.";
            header("Location: admin.php");
        }
        exit();

    } else {
        $stmt->close();
        $conn->close();

        $errors['unique_error'] = "Invalid login credentials";
        $errors['password_error'] = "Invalid login credentials";
        $_SESSION = array_merge($_SESSION, $errors);
        header("Location: admin.php");
        exit();
    }
}
?>
