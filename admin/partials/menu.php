<?php 
session_start();
require_once '../includes/dbh.inc.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Food Order Website - Home Page</title>
</head>

<body>
    <!-- Menu Section Start -->
    <div class="menu text__center">
        <div class="wrapper">
            <ul>
                <li><a href="../admin/index.php">Home</a></li>
                <li><a href="../admin/manage_admin.php">Admin</a></li>
                <li><a href="../admin/manage_category.php">Category</a></li>
                <li><a href="../admin/manage_food.php">Food</a></li>
                <li><a href="../admin/manage_order.php">Order</a></li>
            </ul>
        </div>
    </div>
    <!-- Menu Section End -->