<?php
require_once 'partials_front/menu.php';

// отображение категорий из бд
$sql = "SELECT * FROM tbl_category WHERE active = 'Yes' AND featured = 'Yes'";
$categories = mysqli_query($conn, $sql);
$countCategory = mysqli_num_rows($categories);

if ($countCategory > 0) {
    $categories = mysqli_fetch_all($categories);
} else {
    echo '<p class="error">Category not Added</p>';
}
?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <?php
        // отобразить все активные категории
        foreach ($categories as $category) { ?>
            <a href="category-foods.php">
                <div class="box-3 float-container">
                    <?php
                    if ($category[2] == 'none') {
                        echo '<div class="error">Image not Avialable</div>';
                    } else { ?>
                        <img src="images/categories/<?php echo $category[2]; ?>" alt="<?php echo $category[1]; ?>" class="img-responsive img-curve">
                    <?php } ?>
                    
                    <h3 class="float-text text-white"><?php echo $category[1]; ?></h3>
                </div>
            </a>
        <?php } ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<?php
require_once 'partials_front/footer.php';
?>