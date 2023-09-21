<?php require_once 'partials/menu.php'; ?>


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
            <tr>
                <td>1.</td>
                <td>Anna</td>
                <td>AnnaUsr</td>
                <td>
                    <a href="update_admin.php" class="btn__secondary text__center">Update Admin</a>
                    <a href="delete_admin.php" class="btn__danger text__center">Delete Admin</a>
                </td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Anna</td>
                <td>AnnaUsr</td>
                <td>
                    <a href="update_admin.php" class="btn__secondary text__center">Update Admin</a>
                    <a href="delete_admin.php" class="btn__danger text__center">Delete Admin</a>
                </td>
            </tr>
        </table>
        <!-- Table Admin End -->
        <div class="clearfix"></div>
    </div>
</div>
<!-- Main Content Section End -->

<?php require_once 'partials/footer.php'; ?>