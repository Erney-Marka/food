<?php require_once 'partials/menu.php'; ?>

<!-- Main Content Section Start -->
<div class="main__content">
    <div class="wrapper">
        <h1 class="text__center">Manage Food</h1>
        <!-- Button to add Food -->
        <a href="#" class="btn btn__primary text__center">Add Food</a>

        <!-- Table Food Start -->
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
                    <a href="#" class="btn btn__secondary text__center">Update Food</a>
                    <a href="#" class="btn btn__danger text__center">Delete Food</a>
                </td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Anna</td>
                <td>AnnaUsr</td>
                <td>
                    <a href="#" class="btn btn__secondary text__center">Update Food</a>
                    <a href="#" class="btn btn__danger text__center">Delete Food</a>
                </td>
            </tr>
        </table>
        <!-- Table Food End -->


        <div class="clearfix"></div>
    </div>
</div>
<!-- Main Content Section End -->

<?php require_once 'partials/footer.php'; ?>