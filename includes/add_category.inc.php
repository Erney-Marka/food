<?php

if (isset($_POST['submit'])) {
    require_once 'functions.inc.php';

    $title = $_POST['title'];

    // загрузить изображение, если не выбрано - значение имени "none"
    if (isset($_FILES['image_name']['name'])) {
        if ($_FILES['image_name']['name'] !== "") {
            $imageName = $_FILES['image_name']['name'];

            // получить расширение           
            $last = explode('.', $imageName);
            $expansion = end($last);

            // переименовать изображение
            // в примере - rand(0, 999)
            $date = date("Ymd_H-i-s");
            $imageName = 'Food_Category_' . $date . '.' . $expansion;

            // загрузить изображение в нужную папку
            $soursePath = $_FILES['image_name']['tmp_name'];
            $destinationPath = "../images/categories/" . $imageName;
            $upload = move_uploaded_file($soursePath, $destinationPath);

            if ($upload == false) {
                $_SESSION['upload'] = 'failed';
                header('Location: ../admin/add_category.php');
                exit();
            }
        } else {
            $imageName = "none";
        }
    }

    // если радио кнопка выбрана - получить значение
    // если не выбрана получить значение по умолчанию
    if (isset($_POST['featured'])) {
        $featured = $_POST['featured'];
    } else {
        $featured = "No";
    }

    if (isset($_POST['active'])) {
        $active = $_POST['active'];
    } else {
        $active = "No";
    }

    // проверить заполнение полей
    if (emptyInputCategory($title, $imageName, $featured, $active) !== false) {
        $_SESSION['addCategory'] = 'emptyinput';
        header('Location: ../admin/add_category.php');
        exit();
    }

    // создать категорию
    createCategory($conn, $title, $imageName, $featured, $active);
}
