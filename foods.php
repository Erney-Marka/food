<?php
require_once 'partials_front/menu.php';

// отображение блюд
$sqlFood = "SELECT * FROM tbl_food WHERE active = 'Yes' AND featured = 'Yes';";
$foods = mysqli_query($conn, $sqlFood);
$countFood = mysqli_num_rows($foods);

if ($countFood > 0) {
    $foods = mysqli_fetch_all($foods);
} else {
    echo '<p class="error">Category not Added</p>';
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



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php
        foreach ($foods as $food) { ?>
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <?php
                    if ($food[4] == 'none') {
                        echo '<div class="error">Image not Avialable</div>';
                    } else { ?>
                        <img src="images/foods/<?php echo $food[4]; ?>" alt="<?php echo $food[1]; ?>" class="img-responsive img-curve">
                    <?php } ?>
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $food[1]; ?></h4>
                    <p class="food-price">$<?php echo $food[3]; ?></p>
                    <p class="food-detail"><?php echo $food[2]; ?></p>
                    <br>

                    <a href="#" class="btn btn-primary btn__order">Order Now</a>
                </div>
            </div>
        <?php } ?>

        <div class="clearfix"></div>
    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php
require_once 'partials_front/footer.php';
?>