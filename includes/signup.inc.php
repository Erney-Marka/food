<?php

// если кнопка нажата
if (isset($_POST['submit'])) {

    // Получить данные из формы
    $fullName = $_POST['full_name'];
    $username = $_POST['username'];
    $pwd = md5($_POST['pwd']);

    // включить файл функций
    require_once 'functions.inc.php';

    // обработка ошибок
    // ПУСТЫЕ ПОЛЯ
    if (emptyInputSignup($fullName, $username, $pwd) !== false) {
        $_SESSION['add'] = 'emptyinput';
        header('Location: ../admin/add_admin.php');
        exit();
    }

    //ИМЯ ПОЛЬЗОВАТЕЛЯ ЗАНЯТО
    if (nameExists($conn, $fullName, $username) !== false) {
        $_SESSION['add'] = 'usernametaken';
        header('Location: ../admin/add_admin.php');
        exit();
    }

    // НЕ КОРРЕКТНОЕ ПОЛНОЕ ИМЯ ИЛИ USERNAME
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

    // создать пользователя
    createUser($conn, $fullName, $username, $pwd); 
}
