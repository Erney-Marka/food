<?php

// проверка заполнения полей
function emptyInputSignup ($fullName, $username, $pwd) {
    if (empty($fullName) || empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// проверка на существование имени и логина пользователя
function nameExists($conn, $fullName, $username) {
    $sql = "SELECT * FROM tbl_admin WHERE full_name = ? OR username = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['add'] = 'stmtfailed';
        header('Location: ../admin/add_admin.php');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ss', $fullName, $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) { 
        return $row;
    } else {
        $result = false;
        return $result;
    }
}

// проверка значений переданных как полное имя
function invalidName($fullName) {
    $result = "";

    if (!preg_match("/^[a-zA-Z0-9]*$/", $fullName)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}
// проверка значений переданных как username
function invalidUsername($username) {
    $result = "";

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// создание пользователя
function createUser($conn, $fullName, $username, $pwd)
{
    $sql = "INSERT INTO tbl_admin (full_name, username, pwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['add'] = 'stmtfailed';
        header('Location: ../admin/add_admin.php');
        exit();
    }

    $options = ['cost' => 12];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    mysqli_stmt_bind_param($stmt, 'sss', $fullName, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION['add'] = 'success';
    header('Location: ../admin/manage_admin.php');
    exit();
}

// обновление пользователя
function updateUser($conn, $fullName, $username) {
    $sql = "UPDATE tbl_admin SET full_name = ?, username = ? WHERE tbl_admin;";

}
