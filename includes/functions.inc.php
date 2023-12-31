<?php
require_once 'dbh.inc.php';

// РЕГИСТРАЦИЯ
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

// ОБНОВЛЕНИЕ ЛОГИНА И ИМЕНИ ПОЛЬЗОВАТЕЛЯ
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

// ИЗМЕНЕНИЕ ПАРОЛЯ
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

// АВТОРИЗАЦИЯ
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

// СОЗДАНИЕ КАТЕГОРИЙ
// проверка заполнения полей
function emptyInputCategory($title, $imageName, $featured, $active)
{
    if (empty($title) || empty($imageName) || empty($featured) || empty($active)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}
// создание категории
function createCategory($conn, $title, $imageName, $featured, $active) {
    $sql = "INSERT INTO `tbl_category` (title, image_name, featured, active) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['addCategory'] = 'stmtfailed';
        header('Location: ../admin/add_category');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ssss', $title, $imageName, $featured, $active);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION['addCategory'] = 'success';
    header('Location: ../admin/manage_category.php');
    exit();
}

// обновление информации категории
function updateCategory($conn, $id,  $title, $imageName, $featured, $active)
{
    $sql = "UPDATE tbl_category SET 
    title = ?, 
    image_name = ?, 
    featured = ?, 
    active = ? 
    WHERE id = ?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['update'] = 'stmtfailed';
        header('Location: ../admin/update_category.php');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ssssi', $title, $imageName, $featured, $active, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION['update'] = 'success';
    header('Location: ../admin/manage_category.php');
    exit();
}
// обновить картинку категории
function updateImage ($conn, $id, $imageName) {
    $sql = "UPDATE tbl_category SET image_name = ? WHERE id = ?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['update'] = 'stmtfailed';
        header('Location: ../admin/update_category.php');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'si', $imageName, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION['update'] = 'success';
    header('Location: ../admin/manage_category.php');
    exit();
}

// добавить блюдо
function createFoods($conn, $title, $description, $price, $categoryId, $imageName, $featured, $active) {
    $sql = "INSERT INTO `tbl_food` (title, description_food, price, image_name, category_id, featured, active) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['addFoods'] = 'stmtfailed';
        header('Location: ../admin/add_foods');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ssisiss', $title, $description, $price, $imageName, $categoryId, $featured, $active);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION['addFoods'] = 'success';
    header('Location: ../admin/manage_food.php');
    exit();
}

// обновить блюдо
function updateFood($conn, $id, $title, $description, $price, $categoryId, $imageName, $featured, $active)
{
    $sql = "UPDATE tbl_food SET 
    title = ?, 
    description_food = ?,
    price = ?,
    image_name = ?, 
    category_id = ?,
    featured = ?, 
    active = ? 
    WHERE id = ?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['update'] = 'stmtfailed';
        header('Location: ../admin/update_food.php');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'ssisissi', $title, $description, $price, $imageName, $categoryId, $featured, $active, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION['update'] = 'success';
    header('Location: ../admin/manage_food.php');
    exit();
}
// обновить картинку блюда
function updateImageFood ($conn, $id, $imageName) {
    $sql = "UPDATE tbl_food SET image_name = ? WHERE id = ?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['update'] = 'stmtfailed';
        header('Location: ../admin/update_food.php');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'si', $imageName, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION['update'] = 'success';
    header('Location: ../admin/manage_food.php');
    exit();
}

// создание заказа
function createOrder($conn, $food, $price, $qty, $total, $orderDate, $status, $name, $contact, $email, $address)
{
    $sql = "INSERT INTO tbl_order (food, price, qty, total, order_date, status_order, customer_name, customer_contact, customer_email, customer_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['add'] = 'stmtfailed';
        header('Location: order.php');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'sdidssssss', $food, $price, $qty, $total, $orderDate, $status, $name, $contact, $email, $address);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION['add'] = 'success';
    header('Location: index.php'); //???
    exit();
}

// обновить информацию о заказе
function updateOrder($conn, $id, $price, $qty, $total, $status, $name, $contact, $email, $address)
{
    $sql = "UPDATE tbl_order SET price = ?, qty = ?, total = ?, status_order = ?, customer_name = ?, customer_contact = ?, 	customer_email = ?, customer_address = ? WHERE id = ?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['update'] = 'stmtfailed';
        header('Location: ../admin/update_order.php');
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'didsssssi', $price, $qty, $total, $status, $name, $contact, $email, $address, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $_SESSION['update'] = 'success';
    header('Location: ../admin/manage_order.php');
    exit();
}