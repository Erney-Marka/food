<?php
require_once 'partials/menu.php';
require_once '../includes/change_password.inc.php';

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
        <h1 class="text__center">Change Password</h1>

        <form action="" method="post" class="text__center">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <!-- <div class="form">
                <label for="" class="label_admin">Сurrent Password: </label>
                <input type="password" name="pwd" class="input_admin" placeholder="Enter the current password...">
            </div> -->
            <div class="form">
                <label for="" class="label_admin">New Password: </label>
                <input type="password" name="pwd_new" class="input_admin" placeholder="Enter a new password...">
            </div>
            <div class="form">
                <label for="" class="label_admin">Repeat Password: </label>
                <input type="password" name="pwd_repeat" class="input_admin" placeholder="Repeat a new password...">
            </div>
            <button type="submit" name="submit" class="btn__secondary__admin">Update</button>
            <a href="update_admin.php" class="btn__primary__admin">Return</a>
        </form>
    </div>
</div>

<?php
// var_dump($_SESSION['change']);
if (isset($_SESSION['change'])) {
    if ($_SESSION['change'] === 'passwordsdontmatch') {
        echo '<p class="error text__center">Passwords do not match!</p>';
        unset($_SESSION['change']);
    } elseif ($_SESSION['change'] === 'wrongpassword') {
        echo '<p class="error text__center">Wrong Password!</p>';
        unset($_SESSION['change']);
    }
}


// $2y$12$EirUaIctTmdXv0DVbX1WQugZJVbakErbroqzbu0ju.MROfa2AHjMK
// 
require_once 'partials/footer.php';
?>