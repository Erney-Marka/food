<?php
// удаление картинки категории
if (isset($_POST['delete'])) {
    require_once 'functions.inc.php';

    $id = $_POST['id'];
    $imageName = $_POST['image_name'];

    if ($currentImage !== 'none') {
        $path = "../images/categories/{$imageName}";
        $remove = unlink($path);

        // если не удается удалить изображение
        if ($remove == false) {
            $_SESSION['deleteImage'] = 'error_delete';
            header('Location: ../admin/manage_category.php');
            die();
        }
    }

    $imageName = 'none';
    updateImage ($conn, $id, $imageName);
    header('Location: ../admin/update_category.php');
}

if (isset($_POST['submit'])) {
    

    $id = $_POST['id'];
    $title = $_POST['title'];
    $currentImage = $_POST['image_name'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    // если выбрано новое изображение
    if (isset($_FILES['new_image_name']['name'])) {
        if ($_FILES['new_image_name']['name'] !== "") {
            $imageName = $_FILES['new_image_name']['name'];

            // получить расширение изображения
            $last = explode('.', $imageName);
            $expansion = end($last);

            // переименовать изображение
            $date = date("Ymd_H-i-s");
            $imageName = 'Food_Category_' . $date . '.' . $expansion;

            // загрузить изображение в нужную папку
            $soursePath = $_FILES['new_image_name']['tmp_name'];
            $destinationPath = "../images/categories/" . $imageName;
            $upload = move_uploaded_file($soursePath, $destinationPath);

            if ($upload == false) {
                $_SESSION['uploadImg'] = 'failed';
                header('Location: ../admin/update_category.php');
                exit();
            }

            // удалить старое изображение
            if ($currentImage !== 'none') {
                $path = "../images/categories/{$currentImage}";
                $remove = unlink($path);
        
                // если не удается удалить изображение
                if ($remove == false) {
                    $_SESSION['deleteImage'] = 'error_delete';
                    header('Location: ../admin/manage_category.php');
                    die();
                }
            }
        } else {
            $imageName = $currentImage;
        }
    } else {
        $imageName = $currentImage;
    }

    require_once 'functions.inc.php';
    updateCategory($conn, $id,  $title, $imageName, $featured, $active);
}
