<?php
require_once 'dbh.inc.php';

// проверка заполнения полей
function emptyInputSignup($fullName, $username, $pwd)
{
    if (empty($fullName) || empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// проверка на существование имени и логина пользователя
function nameExists($conn, $fullName, $username)
{
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
function invalidName($fullName)
{
    $result = "";

    if (!preg_match("/^[a-zA-Z0-9]*$/", $fullName)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}
// проверка значений переданных как username
function invalidUsername($username)
{
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

    // $options = ['cost' => 12];
    // $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    mysqli_stmt_bind_param($stmt, 'sss', $fullName, $username, $pwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION['add'] = 'success';
    header('Location: ../admin/manage_admin.php');
    exit();
}

// обновление пользователя
function updateUser($conn, $id, $fullName, $username)
{
    $sql = "UPDATE tbl_admin SET full_name = ?, username = ? WHERE id = ?;";
    //"UPDATE tbl_admin SET full_name = '?', username = '?' WHERE tbl_admin . id = '$id';";

    $stmt = mysqli_stmt_init($conn);
    // $stmt= $conn->prepare($sql);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['add'] = 'stmtfailed';
        header('Location: ../admin/update_admin.php');
        exit();
    }

    // $stmt->bind_param("ssi", $fullName, $username, $id);
    // $stmt->execute();
    mysqli_stmt_bind_param($stmt, 'ssi', $fullName, $username, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // mysqli_query($conn, $sql);

    $_SESSION['update'] = 'success';
    header('Location: ../admin/manage_admin.php');
    exit();
}

// проверка совпадения старого и нового паролей
function pwdVerification($conn, $id, $pwd)
{
    $sql = "SELECT * FROM tbl_admin WHERE id = $id AND pwd = '$pwd';";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            return true;
        } else {
            return false;
        }
    }
}

// пароль и подтверждение пароля совпадают
function pwdMatch($pwdNew, $pwdRepeat)
{
    if ($pwdNew !== $pwdRepeat) {
        return true;
    } else {
        return false;
    }
}

// изменение пароля
function changePassword($conn, $id, $pwdNew)
{
    $sql = "UPDATE tbl_admin SET pwd = ? WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['add'] = 'stmtfailed';
        header('Location: ../admin/change_password.php');
        exit();
    }

    // $options = ['cost' => 12];
    // $hashedPwd = password_hash($pwdNew, PASSWORD_BCRYPT, $options);

    mysqli_stmt_bind_param($stmt, 'si', $pwdNew, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION['change'] = 'success';
    header('Location: ../admin/manage_admin.php');
    exit();
}

// проверка существования пользователя
function userExists($conn, $username, $pwd) {
    $sql = "SELECT * FROM tbl_admin WHERE username = ? AND pwd = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['add'] = 'stmtfailed';
        header('Location: ../admin/login.php');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ss', $username, $pwd); 
    mysqli_stmt_execute($stmt); 

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) { 
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}
// авторизация пользователя
// function loginUser($conn, $username, $pwd) {
//     $userExists = userExists($conn, $username, $pwd);

//     if ($userExists === true) {
//         // session_start();
//         // $_SESSION['userid'] = $userExists['userId'];
//         // $_SESSION['useruid'] = $userExists['userUid'];
//         $_SESSION['login'] = 'success';
//         header('Location: ../admin/');
//         exit();
//     } else {
//         $_SESSION['login'] = 'authorizationerror';
//     }
// }
