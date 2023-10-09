<?php
require_once 'partials_front/menu.php';
require_once 'includes/order.inc.php';

if (isset($_GET['foodID'])) {
    $foodID = $_GET['foodID'];

    $sqlFood = "SELECT * FROM tbl_food WHERE id = $foodID;";
    $foods = mysqli_query($conn, $sqlFood);
    $countFood = mysqli_num_rows($foods);

    if ($countFood == 1) {
        $rowFood = mysqli_fetch_assoc($foods);

        $idFood = $rowFood['id'];
        $titleFood = $rowFood['title'];
        $priceFood = $rowFood['price'];
        $imageFood = $rowFood['image_name'];
    } else {
        echo '<div class="error text-center">Food not Available!</div>';
    }
} else {
    header('location: index.php');
}

if (isset($_SESSION['add'])) {
    if ($_SESSION['add'] == 'stmtfailed') {
        echo '<p class="error text-center">Error</p>';
    }
}
?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" class="order" method="POST">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <?php 
                    if ($imageFood == 'none') {
                        echo '<div class="error text-center">Food not Available!</div>';
                    } else { ?>
                    <img src="images/foods/<?php echo $imageFood; ?>" alt="<?php echo $titleFood; ?>" class="img-responsive img-curve">
                    <?php } ?>
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $titleFood; ?></h3>
                    
                    <input type="hidden" name="food" value="<?php echo $titleFood; ?>">
                    <input type="hidden" name="price" value="<?php echo $priceFood; ?>">

                    <p class="food-price">$<?php echo $priceFood; ?></p>

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>

        </form>
    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php
require_once 'partials_front/footer.php';
?>