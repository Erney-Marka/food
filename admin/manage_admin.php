<?php
require_once 'partials/menu.php';
$admins = mysqli_query($conn, 'SELECT * FROM tbl_admin');
$admins = mysqli_fetch_all($admins);
?>


<!-- Main Content Section Start -->
<div class="main__content">
    <div class="wrapper">
        <h1 class="text__center">Manage Admin</h1>

        <!-- Button to add Admin -->
        <a href="add_admin.php" class="btn__primary text__center">Add Admin</a>

        <!-- Table Admin Start -->
        <table class="tbl__full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>

            <?php foreach ($admins as $admin) { ?>
                <tr>
                    <td><?php echo $admin[0]; ?></td>
                    <td><?php echo $admin[1]; ?></td>
                    <td><?php echo $admin[2]; ?></td>
                    <td>
                        <a href="update_admin.php?id=<?php echo $admin[0]; ?>" class="btn__secondary text__center">Update Admin</a>
                        <a href="delete_admin.php?id=<?php echo $admin[0]; ?>" class="btn__danger text__center">Delete Admin</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <!-- Table Admin End -->
        <div class="clearfix"></div>

        <?php
        if (isset($_SESSION['add']) == 'success') {
            echo '<p class="error__none text__center">Admin Added Successfully!</p>';
            unset($_SESSION['add']);
        }

        // var_dump($_SESSION['delete']);
        if (isset($_SESSION['delete'])) {
            if ($_SESSION['delete'] === 'delete') {
                echo '<p class="error__none text__center">Admin Successfully Removed!</p>';
                unset($_SESSION['delete']);
            } elseif ($_SESSION['delete'] === 'error_delete') {
                echo '<p class="error text__center">A deletion error occurred!</p>';
                unset($_SESSION['delete']);
            }
        }

        if (isset($_SESSION['update'])) {
            if ($_SESSION['update'] === 'success') {
                echo '<p class="error__none text__center">Data changed successfully!</p>';
                unset($_SESSION['update']);
            }
        }
        ?>
    </div>
</div>
<!-- Main Content Section End -->

<?php require_once 'partials/footer.php'; ?>