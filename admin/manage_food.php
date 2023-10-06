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

?>

<!-- Main Content Section Start -->
<div class="main__content">
    <div class="wrapper_food">
        <h1 class="text__center">Manage Food</h1>

        <?php require_once '../includes/notification_manage_food.inc.php' ?>
        
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
                    <td class="title_food"><?php echo $food[1]; ?></td>
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
                    <td class="category__id__food"><?php echo $food[5]; ?></td>
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