<?php
require_once 'dbh.inc.php';

// если кнопка нажата
if (isset($_POST['submit'])) {

    // Получить данные из формы
    $fullName = $_POST['full_name'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    // сохранение в базе
    $sql = "INSERT INTO tbl_admin (full_name, username, pwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../admin/add_admin.php?error=stmtfailed');
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, 'sss', $fullName, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header('Location: ../admin/add_admin.php?error=none');
    exit();
}
