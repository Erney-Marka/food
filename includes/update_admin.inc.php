<?php

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $fullName = $_POST['full_name'];
    $username = $_POST['username'];

    require_once 'functions.inc.php';

    if (invalidName($fullName) !== false) {
        $_SESSION['update'] = 'invalidname';
    } elseif (invalidUsername($username) !== false) {
        $_SESSION['update'] = 'invalidusername';
    } else {
        updateUser($conn, $id, $fullName, $username);
    }

}