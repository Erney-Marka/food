<?php

if(isset($_POST['submit'])) {
    require_once 'functions.inc.php';

    $title = mysqli_real_escape_string($conn,$_POST['title']);
    $description = mysqli_real_escape_string($conn,$_POST['description']);
    $price = $_POST['price'];
    $categoryId = $_POST['category_id'];    

    // загрузить изображение, если не выбрано - значение имени "none"
    if (isset($_FILES['image_name']['name'])) {
        if ($_FILES['image_name']['name'] !== "") {
            $imageName = $_FILES['image_name']['name'];

            // получить расширение           
            $last = explode('.', $imageName);
            $expansion = end($last);
            
            // переименовать изображение
            $date = date("Ymd_H-i-s");
            $imageName = 'Food_' . $date . '.' . $expansion;

            // загрузить изображение в нужную папку
            $soursePath = $_FILES['image_name']['tmp_name'];
            $destinationPath = "../images/foods/" . $imageName;
            $upload = move_uploaded_file($soursePath, $destinationPath);

            if ($upload == false) {
                $_SESSION['upload'] = 'failed';
                header('Location: ../admin/add_food.php');
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

    createFoods($conn, $title, $description, $price, $categoryId, $imageName, $featured, $active);
}