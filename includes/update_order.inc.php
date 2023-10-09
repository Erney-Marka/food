<?php

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $total = $price * $qty;
    $status = $_POST['status'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    require_once 'functions.inc.php';

    updateOrder($conn, $id, $price, $qty, $total, $status, $name, $contact, $email, $address);
}