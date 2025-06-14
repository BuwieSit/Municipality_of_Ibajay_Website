<?php
session_start();

$unique_error = isset($_SESSION['unique_error']) ? $_SESSION['unique_error'] : '';
$password_error = isset($_SESSION['password_error']) ? $_SESSION['password_error'] : '';
$invalid_error = $_SESSION['unique_error'] ?? $_SESSION['password_error'] ?? '';
unset($_SESSION['unique_error']);
unset($_SESSION['password_error']);
unset($_SESSION['unique']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="z-resources/ibajay_logo.png" />
    <link rel="stylesheet" href="global.css" />
    <title>Admin</title>
</head>
<body id="admin-body">
    <div class="admin-logo-wrapper">
        <img src="../z-resources/ibajay_logo.png" />
        <h1 id="headerTitle">Municipality of Ibajay</h1>
    </div>
    <h2 id="admin-title">ADMIN</h2>
    <div class="admin-container">

    
      <div class="admin-wrapper signIn-wrapper">
          <form class="admin-forms" id="admin-login" method="post" action="./adminLogin.php" novalidate>

            <div class="input-wrapper">
              <label class="inp-label" for="login-unique">Unique ID</label>
              
                <input
                type="text"
                id="login-unique"
                name="unique"
                placeholder="Enter unique ID"
                autocomplete="off"
                class="inp-normal"
                required
              />
              <span class="error" name="unique" id="uniqueErr"><?php echo $unique_error;?></span>
            </div>
            
            <div class="input-wrapper">
              <label class="inp-label" for="login-password">Password</label>
              
                <input
                  type="password"
                  id="login-password"
                  name="password"
                  placeholder="Enter password"
                  class="inp-normal"
                  required
                />
                <span class="error" name="password" id="passErr"><?php echo $password_error;?></span>
            </div>
            <button type="submit" class="sign-button" name="signIn">Sign in</button>
            <a href="index.php"><sub id="adminText"></sub></a>
          </form>
          
      </div>
      
    </div>

    <script src="./adminScript.js"></script>
</body>
</html>