<?php 
    session_start();
    include './conn.php';

        if (isset($_POST['signIn'])) {
                $unique = $_POST['unique'];
                $password = $_POST['password'];
                $tag = "admin";


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


                $stmt = $conn->prepare("SELECT * FROM admin_accounts WHERE unique_id = ? AND admin_password = ? AND tag = ?");
                $stmt->bind_param("sss", $unique, $password, $tag);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {

                    $stmt->close();
                    $conn->close();
                    header("Location: ./Admin_page/adminControl.php");
                    exit();

                } else {

                    $stmt->close();
                    $conn->close();
                    echo "Invalid login credentials.";
                    exit();

                }
        }
?>

    