<?php
require_once 'partials/menu.php';
require_once '../includes/dbh.inc.php';

if (isset($_GET['id']) && isset($_GET['image_name'])) {
    // получить значение и удалить
    $id = $_GET['id'];
    $imageName = $_GET['image_name'];

    // если есть, получить файл изображения и удалить
    if ($imageName !== 'none') {
        $path = "../images/categories/{$imageName}";
        $remove = unlink($path);

        // если не удается удалить изображение
        if ($remove == false) {
            $_SESSION['deleteImage'] = 'error_delete';
            header('Location: ../admin/manage_category.php');
            die();
        }
    }

    $sql = "DELETE FROM tbl_category WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result == true) {
        $_SESSION['delete'] = 'delete';
        header('Location: ../admin/manage_category.php');
    } else {
        $_SESSION['delete'] = 'error_delete';
        header('Location: ../admin/manage_category.php');
    }
} else {
    header('Location: ../admin/manage_category.php');
}
