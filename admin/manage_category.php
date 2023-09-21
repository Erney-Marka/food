<?php require_once 'partials/menu.php'; ?>

<!-- Main Content Section Start -->
<div class="main__content">
    <div class="wrapper">
        <h1 class="text__center">Manage Category</h1>
        <!-- Button to add Category -->
        <a href="#" class="btn__primary text__center">Add Category</a>

        <!-- Table Category Start -->
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
                    <a href="#" class="btn__secondary text__center">Update Category</a>
                    <a href="#" class="btn__danger text__center">Delete Category</a>
                </td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Anna</td>
                <td>AnnaUsr</td>
                <td>
                    <a href="#" class="btn__secondary text__center">Update Category</a>
                    <a href="#" class="btn__danger text__center">Delete Category</a>
                </td>
            </tr>
        </table>
        <!-- Table Category End -->


        <div class="clearfix"></div>
    </div>
</div>
<!-- Main Content Section End -->

<?php require_once 'partials/footer.php'; ?>