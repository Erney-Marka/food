<?php

if (isset($_POST['submit'])) {
    // получить детали из формы
    $food = $_POST['food'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];

    $total = $price * $qty;

    $orderDate = date("Y-m-d h:i:sa");
    $status = 'Ordered'; // Ordered, On Ordered, Delivered, Cancelled

    $name = $_POST['full-name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    require_once 'functions.inc.php';

    createOrder($conn, $food, $price, $qty, $total, $orderDate, $status, $name, $contact, $email, $address);
}