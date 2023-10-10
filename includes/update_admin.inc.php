<?php

if (isset($_POST['submit'])) {

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $fullName = mysqli_real_escape_string($conn, $_POST['full_name']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);

    require_once 'functions.inc.php';

    if (invalidName($fullName) !== false) {
        $_SESSION['update'] = 'invalidname';
    } elseif (invalidUsername($username) !== false) {
        $_SESSION['update'] = 'invalidusername';
    } else {
        updateUser($conn, $id, $fullName, $username);
    }

}