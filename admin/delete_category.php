<?php 
require_once 'partials/menu.php';
require_once '../includes/dbh.inc.php';

// 1. получить идентификатор администратора
$id = $_GET['id'];

// 2. запрос для удаления администратора
$sql = "DELETE FROM tbl_category WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

// 3. вернуться на страницу управления с сообщением успех / ошибка
if ($result == true) {
    $_SESSION['delete'] = 'delete';
    header('Location: ../admin/manage_category.php');
} else {
    $_SESSION['delete'] = 'error_delete';
    header('Location: ../admin/manage_category.php');
}