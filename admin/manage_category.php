<?php 
require_once 'partials/menu.php'; 
$categories = mysqli_query($conn, 'SELECT * FROM tbl_category');
$categories = mysqli_fetch_all($categories);
?>

<!-- Main Content Section Start -->
<div class="main__content">
    <div class="wrapper">
        <h1 class="text__center">Manage Category</h1>
        <!-- Button to add Category -->
        <a href="add_category.php" class="btn btn__primary text__center">Add Category</a>

        <!-- Table Category Start -->
        <table class="tbl__full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
            <?php foreach ($categories as $category) { ?>
            <tr>
                <td><?php echo $category[0]; ?></td>
                <td><?php echo $category[1]; ?></td>
                <td><?php echo $category[2]; ?></td>
                <td><?php echo $category[3]; ?></td>
                <td><?php echo $category[4]; ?></td>
                <td>
                    <a href="update_category.php?id=<?php echo $category[0]; ?>" class="btn btn__secondary text__center">Update Category</a>
                    <a href="delete_category.php?id=<?php echo $category[0]; ?>" class="btn btn__danger text__center">Delete Category</a>
                </td>
            </tr>
            <?php } ?>            
        </table>
        <!-- Table Category End -->

        <?php
        if (isset($_SESSION['addCategory'])) {
            if ($_SESSION['addCategory'] === 'success') {
                echo '<p class="error__none text__center">Category Added Successfully!</p>';
                unset($_SESSION['addCategory']);
            } 
        }

        if (isset($_SESSION['delete'])) {
            if ($_SESSION['delete'] === 'delete') {
                echo '<p class="error__none text__center">Category Successfully Removed!</p>';
                unset($_SESSION['delete']);
            } elseif ($_SESSION['delete'] === 'error_delete') {
                echo '<p class="error text__center">A deletion error occurred!</p>';
                unset($_SESSION['delete']);
            }
        }
        ?>
    
        <div class="clearfix"></div>
    </div>
</div>
<!-- Main Content Section End -->

<?php require_once 'partials/footer.php'; ?>