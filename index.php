<?php
    include('./includes/connect.php');
    include('./functions/common_functions.php');
    if(isset($_GET['logout'])){
        session_start();
        session_unset();
        session_destroy();
        echo "<script>alert('Logout Sucessfull')</script>";
        echo "<script>location.href='./index.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-body-tertiary">
    <div class="container-fluid p-0 ">

        <?php 
            include("./header.php");
        ?>

        <div class="navbar navbar-expand-lg bg-success-subtle  bg-primary px-3">
            <div class=" d-flex align-content-baseline justify-content-center gap-2">
                <i class=" fa-regular fa-user "></i>
                <a class="nav-link" href=""> Welcome <?php session_start(); if(isset($_SESSION["username"])){echo $_SESSION["name"]."<a href='index.php?logout'><button class='ms-3 btn btn-danger' name='logout'>Logout</button></a>";}else{echo"Guest";} ?></a>
            </div>
        </div>

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
                        getProducts();
                        getUniqueProductSeller();
                        getUniqueProductBrand();
                    ?>
                </div>
            </div>
        </div>

        <?php 
        include('./footer.php');
    ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>