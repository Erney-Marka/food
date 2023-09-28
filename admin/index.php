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
            <h1>5</h1>
            <br>
            Categories
        </div>

        <div class="col-4 text__center">
            <h1>5</h1>
            <br>
            Categories
        </div>

        <div class="col-4 text__center">
            <h1>5</h1>
            <br>
            Categories
        </div>

        <div class="col-4 text__center">
            <h1>5</h1>
            <br>
            Categories
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!-- Main Content Section End -->

<?php
require_once 'partials/footer.php';
?>