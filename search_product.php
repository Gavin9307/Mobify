<?php
    include('./includes/connect.php');
    include('./functions/common_functions.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobify - Search Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-body-tertiary">
    <div class="container-fluid p-0 ">

        <nav class="navbar navbar-expand-lg bg-success-subtle  bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Mobify</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Support</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><i
                                    class="fa-solid fa-cart-shopping"></i><span><sup>1</sup></span></a>
                            
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name = "keyword">
                        <button class="btn btn-success" type="submit" value="search" name="search_product">Search</button>
                    </form>
                </div>
            </div>
        </nav>

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