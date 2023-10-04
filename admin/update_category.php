<?php
require_once 'partials/menu.php';
require_once '../includes/update_category.inc.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM `tbl_category` WHERE id = '$id'";
    $category = mysqli_query($conn, $sql);

    if ($category == true) {
        $count = mysqli_num_rows($category);

        if ($count == 1) {
            echo '<p class="error__none text__center">category Available!</p>';
            $category = mysqli_fetch_assoc($category);
        } else {
            $_SESSION['update'] = 'error_update';
            header('location: manage_category.php');
        }
    }
} else {
    header('location: manage_category.php');
}

// оповещения
if (isset($_SESSION['update'])) {
    if ($_SESSION['update'] === 'invalidname') {
        echo '<p class="error text__center">Choose a proper full name!</p>';
        unset($_SESSION['update']);
    } elseif ($_SESSION['update'] === 'stmtfailed') {
        echo '<p class="error text__center">Failed to update the category!</p>';
        unset($_SESSION['update']);
    }
}
if (isset($_SESSION['uploadImg'])) {
    if ($_SESSION['uploadImg'] == 'failed') {
        echo '<p class="error text__center">Failed to upload image!</p>';
        unset($_SESSION['uploadImg']);
    }
}

?>

<div class="main__content">
    <div class="wrapper">
        <h1 class="text__center">Update Category</h1>

        <form action="" method="post" class="form text__center" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form__row">
                <label for="title" class="label text_title">Title:</label>
                <input type="text" name="title" class="input input_center" id="title" value="<?php echo $category['title']; ?>">
            </div>

            <p class="text__center text_title text_category">Image:</p>
            <div class="form_row">
                <input type="hidden" name="image_name" value="<?php echo $category['image_name']; ?>">
                <label for="" class="label lable_category">Current Image:</label>
                <?php
                if ($category['image_name'] !== 'none') {
                    echo '<img src="../images/categories/' . $category["image_name"] . '" class="img__category">';
                } else {
                    echo '<p class="no_img">There is no image.</p>';
                }
                ?>
                <button type="submit" name="delete" class="btn btn__danger">Delete Current Image</button>
            </div>
            <div class="form_row">
                <label for="image" class="label lable_category">Select a new Image:</label>
                <input type="file" name="new_image_name" class="input input_center" id="image">
            </div>

            <div class="form__row">
                <label for="featured" class="label text_title">Featured:</label>

                <input <?php if ($category['featured'] == 'Yes') echo 'checked'; ?> type="radio" name="featured" class="input" id="featured" value="Yes">Yes</input>
                <input <?php if ($category['featured'] == 'No') echo 'checked'; ?> type="radio" name="featured" class="input" id="featured" value="No">No</input>
            </div>
            <div class="form__row">
                <label for="active" class="label text_title">Active:</label>

                <input <?php if ($category['active'] == 'Yes') echo 'checked'; ?> type="radio" name="active" class="input" id="active" value="Yes">Yes</input>
                <input <?php if ($category['active'] == 'No') echo 'checked'; ?> type="radio" name="active" class="input" id="active" value="No">No</input>
            </div>
            <button type="submit" name="submit" class="btn btn__secondary">Update</button>
            <a href="manage_category.php" class="btn btn__primary">Return</a>
        </form>
    </div>
</div>

<?php
require_once 'partials/footer.php';
?>