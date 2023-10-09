<?php
require_once 'partials_front/menu.php';
if (isset($_GET['category_id'])) {
    $categoryId = $_GET['category_id'];

    $sqlCategory = "SELECT title FROM tbl_category WHERE id  = $categoryId;";
    $categories = mysqli_query($conn, $sqlCategory);
    $rowCategory = mysqli_fetch_assoc($categories);

    $titleCategory = $rowCategory['title'];
} else {
    header('location: index.php');
}
?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">

        <h2>Foods on <a href="#" class="text-white">"<?php echo $titleCategory; ?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php
        $sqlFood = "SELECT * FROM tbl_food WHERE category_id = $categoryId;";
        $foods = mysqli_query($conn, $sqlFood);

        $countFood = mysqli_num_rows($foods);
        if ($countFood > 0) {
            while ($rowFood = mysqli_fetch_assoc($foods)) {
                $titleFood = $rowFood['title'];
                $descriptionFood = $rowFood['description_food'];
                $priceFood = $rowFood['price'];
                $imageFood = $rowFood['image_name']; ?>

                <div class="food-menu-box">
                    <div class="food-menu-img">

                        <?php if ($imageFood == 'none') {
                            echo '<div class="error">Image not Available!</div>';
                        } else { ?>
                            <img src="images/foods/<?php echo $imageFood; ?>" alt="<?php echo $titleFood; ?>" class="img-responsive img-curve">
                        <?php } ?>

                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $titleFood; ?></h4>
                        <p class="food-price">$<?php echo $priceFood; ?></p>
                        <p class="food-detail"><?php echo $descriptionFood; ?></p>
                        <br>

                        <a href="#" class="btn btn-primary btn__order">Order Now</a>
                    </div>
                </div>

        <?php    }
        } else {
            echo '<div class="error text-center">Food not Available!</div>';
        }
        ?>

        <div class="clearfix"></div>

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php
require_once 'partials_front/footer.php';
?>