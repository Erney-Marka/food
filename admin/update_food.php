<?php
require_once 'partials/menu.php';

if (isset($_GET['id'])) {
    
}


// отобразить категории
$sqlCategories = "SELECT * FROM tbl_category WHERE active = 'Yes'";
$categories = mysqli_query($conn, $sqlCategories);

$countCategories = mysqli_num_rows($categories);
if ($countCategories > 0) {
    $categories = mysqli_fetch_all($categories);
} else {
    $_SESSION['data'] = 'failed';
}

// нет категорий в базе
if (isset($_SESSION['data'])) {
    if ($_SESSION['data'] === 'failed') {
        echo '<p class="error text__center">No category added!</p>';
        unset($_SESSION['data']);
    }
}
?>

<div class="main__content">
    <div class="wrapper">
        <h1 class="text__center">Update Food</h1>

        <form action="" method="post" class="form text__center" enctype="multipart/form-data">

            <input type="hidden" name="id" value="">

            <div class="form__row">
                <label for="title" class="label text_title">Title:</label>
                <input type="text" name="title" class="input input_center" id="title" value="<?php  ?>">
            </div>

            <div class="form__row">
                <label for="description" class="label text_title">Description:</label>
                <textarea type="text" name="description" class="input input_center" id="description"><?php  ?></textarea>
            </div>

            <div class="form__row">
                <label for="price" class="label text_title">Price:</label>
                <input type="number" name="price" class="input input_center" id="price" value="<?php  ?>">
            </div>

            <p class="text__center text_title text_category">Image:</p>

            <div class="form_row">
                <input type="hidden" name="image_name" value="<?php ?>">
                <label for="" class="label lable_category">Current Image:</label>
                <?php
                // if ($foods['image_name'] !== 'none') {
                //     echo '<img src="../images/foods/' . $foods["image_name"] . '" class="img__category">';
                // } else {
                //     echo '<p class="no_img">There is no image.</p>';
                // }
                ?>
                <button type="submit" name="delete" class="btn btn__danger">Delete Current Image</button>
            </div>

            <div class="form_row">
                <label for="image" class="label lable_category">Select a new Image:</label>
                <input type="file" name="new_image_name" class="input input_center" id="image">
            </div>

            <div class="form__row">
                <label for="category" class="label text_title">Category:</label>
                <select type="text" name="category_id" class="select select_center" id="category">
                    <!-- отображение активных категорий -->
                    <?php


                    if ($count > 0) {
                        foreach ($categories as $category) {
                            echo '<option value="' . $category[0] . '" class="option">' . $category[1] . '</option>';
                        }
                    } else {
                        echo '<option value="0" class="option">No Category Found!</option>';
                    }
                    ?>
                    <!--  -->
                </select>
            </div>

            <div class="form__row">
                <label for="featured" class="label text_title">Featured:</label>

                <input <?php //if ($foods['featured'] == 'Yes') echo 'checked'; 
                        ?> type="radio" name="featured" class="input" id="featured" value="Yes">Yes</input>
                <input <?php //if ($foods['featured'] == 'No') echo 'checked'; 
                        ?> type="radio" name="featured" class="input" id="featured" value="No">No</input>
            </div>
            <div class="form__row">
                <label for="active" class="label text_title">Active:</label>

                <input <?php //if ($foods['active'] == 'Yes') echo 'checked'; 
                        ?> type="radio" name="active" class="input" id="active" value="Yes">Yes</input>
                <input <?php //if ($foods['active'] == 'No') echo 'checked'; 
                        ?> type="radio" name="active" class="input" id="active" value="No">No</input>
            </div>

            <button type="submit" name="submit" class="btn btn__secondary">Update</button>
            <a href="manage_food.php" class="btn btn__primary">Return</a>
        </form>
    </div>
</div>