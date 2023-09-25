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
