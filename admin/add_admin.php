<?php 
require_once 'partials/menu.php';
require_once '../includes/signup.inc.php'; 
?>

<div class="main__content">
    <div class="wrapper">
        <h1 class="text__center">Add Admin</h1>

        <form action="" method="post" class="form text__center">
            <div class="form__row">
                <label for="" class="label text_title">Full Name: </label>
                <input type="text" name="full_name" class="input" placeholder="Enter Your Name">
            </div>
            <div class="form__row">
                <label for="" class="label text_title">Username: </label>
                <input type="text" name="username" class="input" placeholder="Enter Your Username">
            </div>
            <div class="form__row">
                <label for="" class="label text_title">Password: </label>
                <input type="password" name="pwd" class="input" placeholder="Enter Your Password">
            </div>
            <button type="submit" name="submit" class="btn btn__secondary">Add New Admin</button>
            <a href="manage_admin.php" class="btn btn__primary">Return</a>
        </form>

        <?php
        if (isset($_SESSION['add'])) {
            if ($_SESSION['add'] === 'stmtfailed') {
                echo '<p class="error text__center">Failed to add admin!</p>';
                unset($_SESSION['add']);
            } elseif ($_SESSION['add'] === 'emptyinput') {
                echo '<p class="error text__center">Fill in all fields!</p>';
                unset($_SESSION['add']);
            } elseif ($_SESSION['add'] === 'usernametaken') {
                echo '<p class="error text__center">Username already taken!</p>';
                unset($_SESSION['add']);
            } elseif ($_SESSION['add'] === 'invalidname') {
                echo '<p class="error text__center">Choose a proper full name!</p>';
                unset($_SESSION['add']);
            } elseif ($_SESSION['add'] === 'invalidusername') {
                echo '<p class="error text__center">Choose a proper username!</p>';
                unset($_SESSION['add']);
            }
        }

        ?>
    </div>
</div>
<?php require_once 'partials/footer.php'; ?>