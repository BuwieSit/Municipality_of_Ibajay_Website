<?php 
session_start();
include '../conn.php';

    if (!in_array($_SESSION['role'] ?? '', ['super_admin', 'content_manager'])) {
        exit("<script>alert('Access denied.'); location.href='../../admin.php';</script>");
    }

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'add':
        $a_what = mysqli_real_escape_string($conn, $_POST['a_what']);
        $a_date = mysqli_real_escape_string($conn, $_POST['a_date']);
        $a_loc = mysqli_real_escape_string($conn, $_POST['a_loc']);
        $a_why = mysqli_real_escape_string($conn, $_POST['a_why']);
            
        $sql = "INSERT INTO announce_table (a_what, a_when, a_where, a_why) VALUES ('$a_what', '$a_date', '$a_loc', '$a_why')";
        break;

    case 'edit':
        $id = intval($_POST['announce_id']);
        $a_what = mysqli_real_escape_string($conn, $_POST['a_what']);
        $a_date = mysqli_real_escape_string($conn, $_POST['a_date']);
        $a_loc = mysqli_real_escape_string($conn, $_POST['a_loc']);
        $a_why = mysqli_real_escape_string($conn, $_POST['a_why']);

        $sql = "UPDATE announce_table SET a_what = '$a_what', a_when = '$a_date', a_where = '$a_loc', a_why = '$a_why' WHERE announce_id = $id";
        break;

    case 'delete':
        $id = intval($_POST['announce_id']);
        $sql = "DELETE FROM announce_table WHERE announce_id = $id";
        break;

    case 'view':
        $id = intval($_GET['announce_id']);
        $res = mysqli_query($conn, "SELECT * FROM announce_table WHERE announce_id = $id");
        echo json_encode(mysqli_fetch_assoc($res));
        exit;

    default:
        echo "Invalid request.";
        exit;
}

if (isset($sql)) {
    if (mysqli_query($conn, $sql)) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        // echo "success";
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>
