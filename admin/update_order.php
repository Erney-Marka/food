<?php
require_once 'partials/menu.php';
require_once '../includes/update_order.inc.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM `tbl_order` WHERE id = '$id'";
    $order = mysqli_query($conn, $sql);

    if ($order == true) {
        $count = mysqli_num_rows($order);

        if ($count == 1) {
            echo '<p class="error__none text__center">order Available!</p>';
            $order = mysqli_fetch_assoc($order);
        } else {
            $_SESSION['update'] = 'error_update';
            header('location: manage_order.php');
        }
    }
} else {
    header('location: manage_order.php');
}
?>

<div class="main__content">
    <div class="wrapper">
        <h1 class="text__center">Update Order</h1>
        <h2 class="title text__center"><?php echo $order['food']; ?></h2>

        <form action="" method="post" class="form text__center">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="price" value="<?php echo $order['price']; ?>">

            <div class="form__row">
                <label for="qty" class="label text_title">Quantity:</label>
                <input type="number" name="qty" class="input input_center" id="qty" value="<?php echo $order['qty']; ?>">
            </div>

            <div class="form__row">
                <label for="status" class="label text_title">Status Order:</label>
                <select type="text" name="status" class="select select_center" id="status" value="<?php echo $order['status_order']; ?>">

                    <option <?php if ($order['status_order'] === 'Ordered'): echo 'selected'; endif?> value="Ordered">Ordered</option>
                    <option <?php if ($order['status_order'] === 'On Delivery'): echo 'selected'; endif?> value="On Delivery">On Delivery</option>
                    <option <?php if ($order['status_order'] === 'Delivered'): echo 'selected'; endif?> value="Delivered">Delivered</option>
                    <option <?php if ($order['status_order'] === 'Cancelled'): echo 'selected'; endif?> value="Cancelled">Cancelled</option>

                </select>
            </div>

            <div class="form__row">
                <label for="name" class="label text_title">Customer Name:</label>
                <input type="text" name="name" class="input input_center" id="name" value="<?php echo $order['customer_name']; ?>">
            </div>

            <div class="form__row">
                <label for="contact" class="label text_title">Customer Contact:</label>
                <input type="text" name="contact" class="input input_center" id="contact" value="<?php echo $order['customer_contact']; ?>">
            </div>

            <div class="form__row">
                <label for="email" class="label text_title">Customer Email:</label>
                <input type="text" name="email" class="input input_center" id="email" value="<?php echo $order['customer_email']; ?>">
            </div>

            <div class="form__row">
                <label for="address" class="label text_title">Customer Address:</label>
                <textarea type="text" name="address" class="input input_center" id="address"><?php echo $order['customer_address']; ?></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn__secondary">Update</button>
            <a href="manage_order.php" class="btn btn__primary">Return</a>

        </form>
    </div>
</div>

<?php require_once 'partials/footer.php'; ?>