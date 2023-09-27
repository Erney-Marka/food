<?php

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    // $pwd = $_POST['pwd'];
    $pwdNew = $_POST['pwd_new'];
    $pwdRepeat = $_POST['pwd_repeat'];


    require_once 'functions.inc.php';

    
    if (pwdMatch($pwdNew, $pwdRepeat) !== false) {
        $_SESSION['change'] = 'passwordsdontmatch';
    } else {
        changePassword($conn, $id, $pwdNew);
    }

    // pwdVerification($conn, $id, $pwd, $username);
}