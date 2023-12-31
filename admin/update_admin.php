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

        <form action="" method="post" class="form text__center">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form__row">
                <label for="" class="label text_title">Full Name: </label>
                <input type="text" name="full_name" class="input input_center" value="<?php echo $admin['full_name']; ?>">
            </div>
            <div class="form__row">
                <label for="" class="label text_title">Username: </label>
                <input type="text" name="username" class="input input_center" value="<?php echo $admin['username']; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn__secondary">Update</button>
            <a href="update_admin.php" class="btn btn__primary">Return</a>
        </form>
    </div>
</div>

<?php


if (isset($_SESSION['update'])) {
    if ($_SESSION['update'] === 'stmtfailed') {
        echo '<p class="error text__center">Failed to update admin!</p>';
        unset($_SESSION['update']);
    } elseif ($_SESSION['update'] === 'invalidname') {
        echo '<p class="error text__center">Choose a proper full name!</p>';
        unset($_SESSION['update']);
    } elseif ($_SESSION['update'] === 'invalidusername') {
        echo '<p class="error text__center">Choose a proper username!</p>';
        unset($_SESSION['update']);
    }
}
require_once 'partials/footer.php';
?>