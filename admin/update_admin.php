<?php
require_once 'partials/menu.php';
require_once '../includes/update_admin.inc.php';

$id = $_GET['id'];
$sql = "SELECT * FROM `tbl_admin` WHERE id = '$id'";
$admin = mysqli_query($conn, $sql);

if ($admin == true) {
    $count = mysqli_num_rows($admin);

    if ($count == 1) {
        echo '<p class="error__none text__center">Admin Available!</p>';
    } else {
        $_SESSION['update'] = 'error_update';
        header('location: manage_admin.php');
    }
}

$admin = mysqli_fetch_assoc($admin);
?>

<div class="main__content">
    <div class="wrapper">
        <h1 class="text__center">Update Admin</h1>

        <form action="" method="post" class="text__center">
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="form">
                <label for="" class="label_admin">Full Name: </label>
                <input type="text" name="full_name" class="input_admin" value="<?php echo $admin['full_name']; ?>">
            </div>
            <div class="form">
                <label for="" class="label_admin">Username: </label>
                <input type="text" name="username" class="input_admin" value="<?php echo $admin['username']; ?>">
            </div>
            <button type="submit" name="submit" class="btn__primary__admin">Update</button>
        </form>
    </div>
</div>

<?php
require_once 'partials/footer.php';
?>