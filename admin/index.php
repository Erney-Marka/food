<?php require_once 'partials/menu.php'; ?>


<!-- Main Content Section Start -->
<div class="main__content">
    <div class="wrapper">
        <h1 class="text__center">DASHBOARD</h1>
        <?php
        if (isset($_SESSION['login'])) {
            if ($_SESSION['login'] === 'success') {
                echo '<p class="error__none text__center">You are successfully logged in!</p>';
                unset($_SESSION['login']);
            }
        }
        ?>

        <div class="col-4 text__center">

            <?php
            $sqlCategory = "SELECT * FROM tbl_category";
            $category = mysqli_query($conn, $sqlCategory);
            $countCategory = mysqli_num_rows($category);
            ?>

            <h1><?php echo $countCategory; ?></h1>
            <br>
            Categories
        </div>

        <div class="col-4 text__center">

            <?php
            $sqlFood = "SELECT * FROM tbl_food";
            $food = mysqli_query($conn, $sqlFood);
            $countFood = mysqli_num_rows($food);
            ?>

            <h1><?php echo $countFood; ?></h1>
            <br>
            Foods
        </div>

        <div class="col-4 text__center">

            <?php
            $sqlOrder = "SELECT * FROM tbl_order";
            $order = mysqli_query($conn, $sqlOrder);
            $countOrder = mysqli_num_rows($order);
            ?>

            <h1><?php echo $countOrder; ?></h1>
            <br>
            Total Orders
        </div>

        <div class="col-4 text__center">

            <?php
            $sqlRevenue = "SELECT SUM(total) AS Total FROM tbl_order WHERE status_order = 'Delivered';";
            $revenue = mysqli_query($conn, $sqlRevenue);
            $rowRevenue = mysqli_fetch_assoc($revenue);
            $totalRevenue = $rowRevenue['Total'];
            ?>

            <h1>$<?php echo $totalRevenue; ?></h1>
            <br>
            Revenue Generated
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!-- Main Content Section End -->

<?php
require_once 'partials/footer.php';
?>