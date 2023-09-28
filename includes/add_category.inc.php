<?php

if (isset($_POST['submit'])) {
    require_once 'functions.inc.php';

    $title = $_POST['title'];
    $imageName = $_POST['image_name'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    if (emptyInputCategory($title, $imageName, $featured, $active) !== false) {
        $_SESSION['addCategory'] = 'emptyinput';
        header('Location: ../admin/add_category.php');
        exit();
    }

    createCategory($conn, $title, $imageName, $featured, $active);
}