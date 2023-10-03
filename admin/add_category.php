<?php
require_once 'partials/menu.php';
require_once '../includes/add_category.inc.php';
?>

<div class="main__content">
    <div class="wrapper">
        <h1 class="text__center">Add Category</h1>

        <form action="" method="post" class="form text__center" enctype="multipart/form-data">
            <div class="form__row">
                <label for="title" class="label">Title: </label>
                <input type="text" name="title" class="input" id="title" placeholder="">
            </div>
            <div class="form__row">
                <label for="image" class="label">Select Image: </label>
                <input type="file" name="image_name" class="input" id="image" placeholder="">
            </div>
            <div class="form__row">
                <label for="featured" class="label">Featured: </label>
                <input type="radio" name="featured" class="input" id="featured" value="Yes">Yes</input>
                <input type="radio" name="featured" class="input" id="featured" value="No">No</input>
            </div>
            <div class="form__row">
                <label for="active" class="label">Active: </label>
                <input type="radio" name="active" class="input" id="active" value="Yes">Yes</input>
                <input type="radio" name="active" class="input" id="active" value="No">No</input>
            </div>
            <button type="submit" name="submit" class="btn btn__secondary">Add New Category</button>
            <a href="manage_category.php" class=" btn btn__primary">Return</a>
        </form>

        <?php

        if (isset($_SESSION['addCategory'])) {
            if ($_SESSION['addCategory'] === 'emptyinput') {
                echo '<p class="error text__center">Fill in all fields!</p>';
                unset($_SESSION['addCategory']);
            }
        }

        if (isset($_SESSION['upload'])) {
            if ($_SESSION['upload'] === 'failed') {
                echo '<p class="error text__center">Failed to upload image!</p>';
                unset($_SESSION['upload']);
            }
        }

        ?>
    </div>
</div>

<?php
require_once 'partials/footer.php';
?>