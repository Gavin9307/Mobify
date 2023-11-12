<?php
    include('./includes/connect.php');
    include('./functions/common_functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php 
        include("head.php");
    ?>
    <title>Mobify - Search Product</title>
    
</head>

<body class="bg-body-tertiary">
    <div class="container-fluid p-0 ">

    <?php 
        include("header.php");
    ?>

        <?php
        include("./sub_header.php");
        ?>

        <div class="container-fluid bg-success d-flex justify-content-center ">
            <hr>
            <h2 class="text-light">Products</h2><hr>
        </div>

        <div class="row me-5" style="min-height:700px">
            <div class="col-md-2 bg-success-subtle p-4" >
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><h4>Brands</h4></li>
                    <?php
                       getBrands();
                    ?>
                    
                </ul>
                <ul class="navbar-nav me-auto mt-5">
                    <li class="nav-item"><h4>Sellers</h4></li>
                    <?php
                        getSellers();
                    ?>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="ms-5 row d-flex justify-content-start mt-4 gap-5">
                    <?php
                        searchProducts();
                        getUniqueProductSeller();
                        getUniqueProductBrand();
                    ?>
                </div>
            </div>
        </div>

        <footer class="bg-success p-3">
                <div class="container-fluid">
                    <h5 class="text-light" style="text-align: center;">This Site is created by Gavin Da Costa</h5>
                </div>
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>