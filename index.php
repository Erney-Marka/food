<?php
require_once 'partials_front/menu.php';

// отображение категорий из бд
$sqlCategory = "SELECT * FROM tbl_category WHERE active = 'Yes' AND featured = 'Yes' LIMIT 3;";
$categories = mysqli_query($conn, $sqlCategory);
$countCategory = mysqli_num_rows($categories);

if ($countCategory > 0) {
    $categories = mysqli_fetch_all($categories);
} else {
    echo '<p class="error">Category not Added</p>';
}

// отображение блюд
$sqlFood = "SELECT * FROM tbl_food WHERE active = 'Yes' AND featured = 'Yes' LIMIT 6;";
$foods = mysqli_query($conn, $sqlFood);
$countFood = mysqli_num_rows($foods);

if ($countFood > 0) {
    $foods = mysqli_fetch_all($foods);
} else {
    echo '<p class="error text-center">Food not Added</p>';
}
?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <form action="food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php
if (isset($_SESSION['add'])) {
    if ($_SESSION['add'] == 'success') {
        echo '<p class="error__none text-center">The order has been successfully placed!</p>';
        unset($_SESSION['add']);
    }
}
?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>


        <?php foreach ($categories as $category) { ?>
            <a href="category-foods.php?category_id=<?php echo $category[0]; ?>">
                <div class="box-3 float-container">
                    <?php
                    // доступно ли изображение
                    if ($category[2] == 'none') {
                        echo '<div class="error">Image not Available</div>';
                    } else { ?>
                        <img src="images/categories/<?php echo $category[2]; ?>" alt="<?php echo $category[1]; ?>" class="img-responsive img-curve">
                    <?php }
                    ?>

                    <h3 class="float-text text-white"><?php echo $category[1]; ?></h3>
                </div>
            </a>
        <?php } ?>

        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php foreach ($foods as $food) { ?>
            <div class="food-menu-box">
                <div class="food-menu-img">

                    <?php
                    // доступно ли изображение
                    if ($food[4] == 'none') {
                        echo '<div class="error">Image not Available</div>';
                    } else { ?>
                        <img src="images/foods/<?php echo $food[4]; ?>" alt="<?php echo $food[1]; ?>" class="img-responsive img-curve">
                    <?php } ?>

                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $food[1]; ?></h4>
                    <p class="food-price">$<?php echo $food[3]; ?></p>
                    <p class="food-detail"><?php echo $food[2]; ?></p>
                    <br>

                    <a href="order.php?foodID=<?php echo $food[0]; ?>" class="btn btn-primary btn__order">Order Now</a>
                </div>
            </div>
        <?php } ?>

        <div class="clearfix"></div>

    </div>

    <p class="text-center">
        <a href="#">See All Foods</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->

<?php
require_once 'partials_front/footer.php';
?>