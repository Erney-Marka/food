<?php
// require_once 'dbh.inc.php';

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $fullName = $_POST['full_name'];
    $username = $_POST['username'];

    require_once 'functions.inc.php';

    if (invalidName($fullName) !== false) {
        $_SESSION['update'] = 'invalidname';
        header('Location: ../admin/update_admin.php');
        exit();
    }

    if (invalidUsername($username) !== false) {
        $_SESSION['update'] = 'invalidusername';
        header('Location: ../admin/update_admin.php');
        exit();
    }

    // updateUser($conn, $id, $fullName, $username);
}