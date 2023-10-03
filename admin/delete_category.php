<?php 
require_once 'partials/menu.php';
require_once '../includes/dbh.inc.php';

$id = $_GET['id'];

$sql = "DELETE FROM tbl_category WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if ($result == true) {
    $_SESSION['delete'] = 'delete';
    header('Location: ../admin/manage_category.php');
} else {
    $_SESSION['delete'] = 'error_delete';
    header('Location: ../admin/manage_category.php');
}