<?php
session_start();
require_once '../includes/login.inc.php';

if (!isset($_SESSION['autoriz'])) {
    echo '<p class="error text__center">You are not logged in. Log in.</p>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Login - Food Order System</title>
</head>

<body>
    <div class="wrapper">
        <div class="login">
            <h1 class="text__center">Login</h1>

            <!-- Login Form -->
            <form action="" method="post">
                <div class="form form__login">
                    <label for="" class="label_admin">Username: </label>
                    <input type="text" name="username" class="input_admin input_login" placeholder="Enter Your Username...">
                </div>
                <div class="form form__login">
                    <label for="" class="label_admin">Password: </label>
                    <input type="password" name="pwd" class="input_admin input_login" placeholder="Enter Your Password...">
                </div>
                <button type="submit" name="submit" class="btn__secondary__login">Login</button>
            </form>

            <p class="text__center">Created By - <a href="#">Anna</a></p>
        </div>
    </div>

    <?php
    // var_dump($_SESSION);
    if (isset($_SESSION['login'])) {
        if ($_SESSION['login'] === 'userNotExist') {
            echo '<p class="error text__center">There is no user with this username and password. Try again!</p>';
            unset($_SESSION['login']);
        } elseif ($_SESSION['login'] === 'authorizationError') {
            echo '<p class="error text__center">Authorization Error. Try again!</p>';
            unset($_SESSION['login']);
        } elseif ($_SESSION['login'] === 'success') {
            echo '<p class="error__none text__center">You are successfully logged in!</p>';
            unset($_SESSION['login']);
        }
    }
    ?>
</body>

</html>