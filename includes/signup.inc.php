<?php

// если кнопка нажата
if (isset($_POST['submit'])) {

    // Получить данные из формы
    $fullName = $_POST['full_name'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    // включить файл функций
    require_once 'functions.inc.php';

    // обработка ошибок
    // пустые поля
    if (emptyInputSignup($fullName, $username, $pwd) !== false) {
        $_SESSION['add'] = 'emptyinput';
        header('Location: ../admin/add_admin.php');
        exit();
    }

    // создать пользователя
    createUser($conn, $fullName, $username, $pwd); 
}
