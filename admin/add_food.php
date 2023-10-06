<?php
require_once 'partials/menu.php';
require_once '../includes/add_food.inc.php';

$sql = "SELECT * FROM tbl_category WHERE active = 'Yes';";
$categories = mysqli_query($conn, $sql);

$count = mysqli_num_rows($categories);
$categories = mysqli_fetch_all($categories);

// обработка сообщений

// ошибка подключения к базе
if (isset($_SESSION['addFood'])) {
    if ($_SESSION['addFood'] === 'stmtfailed') {
        echo '<p class="error text__center">Failed to add dishes!</p>';
        unset($_SESSION['addFood']);
    }
    
}
// ошибка загрузки картинки
if (isset($_SESSION['upload'])) {
    if ($_SESSION['upload'] === 'failed') {
        echo '<p class="error text__center">Failed to upload image!</p>';
        unset($_SESSION['upload']);
    }
}
?>

<div class="main__content">
    <div class="wrapper">
        <h1 class="text__center">Add Food</h1>

        <form action="" method="post" class="form text__center" enctype="multipart/form-data">
            <div class="form__row">
                <label for="title" class="label text_title">Title:</label>
                <input type="text" name="title" class="input input_center" id="title" placeholder="Title of the food...">
            </div>
            <div class="form__row">
                <label for="description" class="label text_title">Description:</label>
                <textarea type="text" name="description" class="input input_center" id="description" placeholder="Description of the food..."></textarea>
            </div>
            <div class="form__row">
                <label for="title" class="label text_title">Price:</label>
                <input type="number" name="price" class="input input_center" id="title" placeholder="">
            </div>
            <div class="form__row">
                <label for="image" class="label text_title">Select Image:</label>
                <input type="file" name="image_name" class="input input_center" id="image" placeholder="">
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
                    echo '<option value="0">No Category Found</option>';
                }
                ?>
                <!--  -->
                </select>
            </div>
            <div class="form__row">
                <label for="featured" class="label text_title">Featured:</label>
                <input type="radio" name="featured" class="input" id="featured" value="Yes">Yes</input>
                <input type="radio" name="featured" class="input" id="featured" value="No">No</input>
            </div>
            <div class="form__row">
                <label for="active" class="label text_title">Active:</label>
                <input type="radio" name="active" class="input" id="active" value="Yes">Yes</input>
                <input type="radio" name="active" class="input" id="active" value="No">No</input>
            </div>
            <button type="submit" name="submit" class="btn btn__secondary">Add New Category</button>
            <a href="manage_food.php" class=" btn btn__primary">Return</a>
        </form>
    </div>
</div>

<?php
require_once 'partials/footer.php';
?>