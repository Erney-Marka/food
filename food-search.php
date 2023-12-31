<?php
require_once 'partials_front/menu.php';
?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        
        <?php
        // получить ключевое слово для поиска
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        ?>

        <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php
        $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR 	description_food LIKE '%$search%';";
        $resultConn = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($resultConn);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($resultConn)) {
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description_food'];
                $price = $row['price'];
                $image = $row['image_name'];
        ?>

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php
                        if ($image == 'none') {
                            echo '<div class="error">Image not Found!</div>';
                        } else { ?>
                            <img src="images/foods/<?php echo $image; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                        <?php }
                        ?>
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price">$<?php echo $price; ?></p>
                        <p class="food-detail"><?php echo $description; ?></p>
                        <br>

                        <a href="order.php?foodID=<?php echo $id; ?>" class="btn btn-primary btn__order">Order Now</a>
                    </div>
                </div>

        <?php
            }
        } else {
            echo '<div class="error text__center">Food not Found!</div>';
        }
        ?>

        <div class="clearfix"></div>

    </div>

</section>
<!-- fOOD Menu Section Ends Here -->

<?php
require_once 'partials_front/footer.php';
?>