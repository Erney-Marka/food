<?php

if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $pwd = md5($_POST['pwd']);
    $pwdNew = md5($_POST['pwd_new']);
    $pwdRepeat = md5($_POST['pwd_repeat']);


    require_once 'functions.inc.php';

    
    if (pwdMatch($pwdNew, $pwdRepeat) !== false) {
        $_SESSION['change'] = 'passwordsdontmatch';
    } 
    elseif (pwdVerification($conn, $id, $pwd) !== true) {
        $_SESSION['change'] = 'wrongpassword';
    } 
    else {
        changePassword($conn, $id, $pwdNew);
    }

    // pwdVerification($conn, $id, $pwd);
}