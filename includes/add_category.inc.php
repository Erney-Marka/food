<?php

if (isset($_POST['submit'])) {
    require_once 'functions.inc.php';

    $title = $_POST['title'];

    if (isset($_FILES['image_name']['name'])) {

        if ($_FILES['image_name']['name'] !== "") {
            $imageName = $_FILES['image_name']['name'];

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


    if (emptyInputCategory($title, $imageName, $featured, $active) !== false) {
        $_SESSION['addCategory'] = 'emptyinput';
        header('Location: ../admin/add_category.php');
        exit();
    }

    createCategory($conn, $title, $imageName, $featured, $active);
}
