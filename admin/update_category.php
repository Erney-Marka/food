<?php 
require_once 'partials/menu.php';
require_once '../includes/dbh.inc.php';

$id = $_GET['id'];

$sql = "SELECT * FROM `tbl_category` WHERE id = '$id'";
$category = mysqli_query($conn, $sql);

if ($category == true) {
    $count = mysqli_num_rows($category);

    if ($count == 1) {
        echo '<p class="error__none text__center">category Available!</p>';
    } else {
        $_SESSION['update'] = 'error_update';
        header('location: manage_category.php');
    }
}

$admin = mysqli_fetch_assoc($category);
?>

<div class="main__content">
    <div class="wrapper">
        <h1 class="text__center">Update Admin</h1>

        <form action="" method="post" class="form text__center">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form__row">
                <label for="" class="label">Full Name: </label>
                <input type="text" name="full_name" class="input" value="<?php echo $category['full_name']; ?>">
            </div>
            <div class="form__row">
                <label for="" class="label">Username: </label>
                <input type="text" name="username" class="input" value="<?php echo $category['username']; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn__secondary">Update</button>
            <a href="update_admin.php" class="btn btn__primary">Return</a>
        </form>
    </div>
</div>

<?php


if (isset($_SESSION['update'])) {
    if ($_SESSION['update'] === 'error_update') {
        echo '<p class="error text__center">Admin not Available!</p>';
        unset($_SESSION['update']);
    } elseif ($_SESSION['update'] === 'stmtfailed') {
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