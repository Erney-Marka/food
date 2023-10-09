<?php
require_once 'partials/menu.php';

// отобразить заказы в обратном порядке
$sqlOrder = "SELECT * FROM tbl_order WHERE status_order = 'Cancelled' ORDER BY id DESC;";
$orders = mysqli_query($conn, $sqlOrder);
$countOrder = mysqli_num_rows($orders);

$serialNumber = 1;

if (isset($_SESSION['update'])) {
    if ($_SESSION['update'] == 'success') {
        echo '<p class="error__none text__center">Order information has been successfully updated!</p>';
        unset($_SESSION['update']);
    }
}
?>

<!-- Main Content Section Start -->
<div class="main__content">
    <div class="wrapper">
        <h1 class="text__center">Cancelled Order</h1>
        <a href="manage_order.php" class="btn btn__primary">Return</a>

        <!-- Table Order Start -->
        <table class="tbl__full">
            <tr>
                <th>S.N.</th>
                <th>Food</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status Order</th>
                <th>Customer Name</th>
                <th>Customer Contact</th>
                <th>Customer Email</th>
                <th>Customer Address</th>
            </tr>
            <?php
            if ($countOrder > 0) {
                while ($rowOrder = mysqli_fetch_assoc($orders)) {
                    $id = $rowOrder['id'];
                    $food = $rowOrder['food'];
                    $price = $rowOrder['price'];
                    $quantity = $rowOrder['qty'];
                    $total = $rowOrder['total'];
                    $date = $rowOrder['order_date'];
                    $status = $rowOrder['status_order'];
                    $name = $rowOrder['customer_name'];
                    $contact = $rowOrder['customer_contact'];
                    $email = $rowOrder['customer_email'];
                    $address = $rowOrder['customer_address'];
            ?>

                    <tr>
                        <td><?php echo $serialNumber++; ?></td>
                        <td><?php echo $food; ?></td>
                        <td>$<?php echo $price; ?></td>
                        <td class="text__center"><?php echo $quantity; ?></td>
                        <td>$<?php echo $total; ?></td>
                        <td><?php echo $date; ?></td>
                        <td><?php echo $status; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $contact; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $address; ?></td>
                    </tr>

            <?php }
            } else {
                echo '<p class="error">Food not Found!</p>';
            }
            ?>
        </table>
        <!-- Table Order End -->


        <div class="clearfix"></div>
    </div>
</div>
<!-- Main Content Section End -->

<?php require_once 'partials/footer.php'; ?>