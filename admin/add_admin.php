<?php require_once 'partials/menu.php'; ?>
<?php require_once '../includes/signup.inc.php'; ?>

<div class="main__content">
    <div class="wrapper">
        <h1 class="text__center">Add Admin</h1>

        <form action="" method="post" class="text__center">
            <div class="form">
                <label for="" class="label_admin">Full Name: </label>
                <input type="text" name="full_name" class="input_admin" placeholder="Enter Your Name">
            </div>
            <div class="form">
                <label for="" class="label_admin">Username: </label>
                <input type="text" name="username" class="input_admin" placeholder="Enter Your Username">
            </div>
            <div class="form">
                <label for="" class="label_admin">Password: </label>
                <input type="password" name="pwd" class="input_admin" placeholder="Enter Your Password">
            </div>
            <button type="submit" name="submit" class="btn__primary__admin">Add New Admin</button>
        </form>

        <?php
        var_dump($_SESSION['add']);
        if (isset($_SESSION['add']) === 'stmtfailed') {
            echo '<p class="error text__center">Failed to Add Admin!</p>';
            unset($_SESSION['add']);
        } elseif (isset($_SESSION['add']) === 'emptyinput') {
            echo '<p class="error text__center">Fill in all fields!</p>';
            unset($_SESSION['add']);
        }
        ?>
    </div>
</div>
<?php require_once 'partials/footer.php'; ?>