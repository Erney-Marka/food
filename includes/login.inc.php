<?php

if (isset($_POST['submit'])) {

    // Получить данные из формы
    $username = $_POST['username'];
    $pwd = md5($_POST['pwd']);

    // включить файл функций
    require_once 'functions.inc.php';

    if (userExists($conn, $username, $pwd) !== false) {
        $_SESSION['login'] = 'success';
        header('Location: ../admin/');
        exit();
    } else {
        $_SESSION['login'] = 'userNotExist';
        header('Location: ../admin/login.php');
        exit();
    }
}
