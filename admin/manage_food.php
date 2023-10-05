<?php
require_once 'partials/menu.php';

$foods = mysqli_query($conn, 'SELECT * FROM tbl_food');

$count = mysqli_num_rows($foods);
if ($count > 0) {
    $foods = mysqli_fetch_all($foods);
} else {
    $_SESSION['data'] = 'failed';
}
$num = 1;

// обработка сообщений
// в базе нет блюд
if (isset($_SESSION['data'])) {
    if ($_SESSION['data'] === 'failed') {
        echo '<p class="error text__center">No dish added!</p>';
        unset($_SESSION['data']);
    }
}
// добавление блюда
if (isset($_SESSION['addFoods'])) {
    if ($_SESSION['addFoods'] === 'success') {
        echo '<p class="error__none text__center">The dish was successfully added!</p>';
        unset($_SESSION['addFoods']);
    }
}
// ошибка загрузки картинки
if (isset($_SESSION['upload'])) {
    if ($_SESSION['upload'] === 'failed') {
        echo '<p class="error text__center">I can not upload an image!</p>';
        unset($_SESSION['upload']);
    }
}
// ошибка удаления картинки
if (isset($_SESSION['deleteImage'])) {
    if ($_SESSION['deleteImage'] === 'error_delete') {
        echo '<p class="error text__center">An error occurred deleting the image!</p>';
        unset($_SESSION['deleteImage']);
    }
}
// удаление блюда
if (isset($_SESSION['delete'])) {
    if ($_SESSION['delete'] === 'success') {
        echo '<p class="error__none text__center">The dish was successfully removed!</p>';
        unset($_SESSION['delete']);
    } elseif ($_SESSION['delete'] === 'error_delete') {
        echo '<p class="error text__center">Dish deletion error!</p>';
        unset($_SESSION['delete']);
    }
    
}

// var_dump($_SESSION['delete']);
?>

<!-- Main Content Section Start -->
<div class="main__content">
    <div class="wrapper">
        <h1 class="text__center">Manage Food</h1>
        <!-- Button to add Food -->
        <a href="add_food.php" class="btn btn__primary text__center">Add Food</a>

        <!-- Table Food Start -->
        <table class="tbl__full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>category_id</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
            <?php foreach ($foods as $food) { ?>
                <tr>
                    <td><?php echo $num++; ?></td>
                    <td><?php echo $food[1]; ?></td>
                    <td class="description"><?php echo $food[2]; ?></td>
                    <td>$<?php echo $food[3]; ?></td>
                    <td>
                        <?php
                        // картинка категории 
                        if ($food[4] != 'none') {

                        ?>
                            <img src="../images/foods/<?php echo $food[4]; ?>" class="img__category">
                        <?php
                        } else {
                            echo '<p class="error text__center">Image not added.</p>';
                        }
                        ?>
                    </td>
                    <td><?php echo $food[5]; ?></td>
                    <td class="radio"><?php echo $food[6]; ?></td>
                    <td class="radio"><?php echo $food[7]; ?></td>
                    <td>
                        <a href="update_food.php?id=<?php echo $food[0]; ?>" class="btn btn__secondary text__center">Update Food</a>
                        <a href="delete_food.php?id=<?php echo $food[0]; ?>&image_name=<?php echo $food[4]; ?>" class="btn btn__danger text__center">Delete Food</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <!-- Table Food End -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- Main Content Section End -->

<?php require_once 'partials/footer.php'; ?>