<?php
// require_once 'dbh.inc.php';

if (isset($_POST['submit'])) {

    $fullName = $_POST['full_name'];
    $username = $_POST['username'];

    require_once 'functions.inc.php';

    if (nameExists($conn, $fullName, $username) !== false) {
        $_SESSION['add'] = 'usernametaken';
        header('Location: ../admin/add_admin.php');
        exit();
    }

    if (invalidName($fullName) !== false) {
        $_SESSION['add'] = 'invalidname';
        header('Location: ../admin/add_admin.php');
        exit();
    }

    if (invalidUsername($username) !== false) {
        $_SESSION['add'] = 'invalidusername';
        header('Location: ../admin/add_admin.php');
        exit();
    }

    updateUser($conn, $fullName, $username);
}