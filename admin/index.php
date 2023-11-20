<?php
    if(isset($_GET['logout'])){
        session_start();
        session_unset();
        session_destroy();
        echo "<script>alert('Logout Sucessfull')</script>";
        echo "<script>location.href='./index.php';</script>";
    }
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if (isset($_SESSION['username'])) {
        echo " ";
    }
    else{
        echo "<script>alert('Please Login')</script>";
        echo "<script>location.href='./admin_login.php';</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <style>
    /* footer {
        position: absolute;
        bottom: 0;
        right: 0;
        left: 0;
    } */
    </style>
</head>

<body class="bg-success-subtle">
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-success-subtle ">
            <div class="container-fluid">
                <img src="../assets/images/logo.jpeg" alt="Logo" width="75px" height="50px">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome 
                                <?php
                                 if(!isset($_SESSION)) 
                                 { 
                                     session_start(); 
                                 } 
                                 if(isset($_SESSION['username'])){
                                    echo $_SESSION['name'];
                             }
                                ?>
                                </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <div class="container-fluid bg-success d-flex justify-content-center ">
            <h2 class="text-light">Manage Smartphones</h2>
        </div>

        <div class="row pb-2 bg-success-subtle ">
            <div class="col-md-12 bg-success-subtle d-flex flex-column align-items-center gap-4 pt-4">
                <a href="">
                    <img class="rounded" src="../assets/images/admin_logo.jpg" alt="Admin Image" width="250px" height="250px">
                </a>
                <h5 class="text-center">Gavin Da Costa</h5>
                <div class="button text-center d-flex gap-2">
                    <button><a href="./index.php?add_product" class="nav-link text-light bg-success p-2">Add Mobile</a></button>
                    <button><a href="./index.php?view_product" class="nav-link text-light bg-success p-2">View Mobiles</a></button>
                    <button><a href="./index.php?removed_product" class="nav-link text-light bg-success p-2">Removed Mobiles</a></button>
                    <button><a href="./index.php?add_seller" class="nav-link text-light bg-success p-2">Add
                            Seller</a></button>
                    <button><a href="./index.php?view_seller" class="nav-link text-light bg-success p-2">View Sellers</a></button>
                    <button><a href="./index.php?add_brand" class="nav-link text-light bg-success p-2">Add Brand</a></button>
                    <button><a href="./index.php?view_brand" class="nav-link text-light bg-success p-2">View Brands</a></button>
                    <button><a href="./index.php?view_order" class="nav-link text-light bg-success p-2">All Orders</a></button>
                    <button><a href="./index.php?view_payment" class="nav-link text-light bg-success p-2">All Payments</a></button>
                    <button><a href="./index.php?view_user" class="nav-link text-light bg-success p-2">List Users</a></button>
                    <button class="bg-danger"><a href="./index.php?logout" class="nav-link text-light bg-danger p-2">Logout</a></button>
                </div>
            </div>
        </div>
        <div class="container rounded bg-body-tertiary pt-3 pb-3 mb-3 mt-3">
        <?php
                if(isset($_GET['add_seller'])){
                    include('add_seller.php');
                }
                if(isset($_GET['add_brand'])){
                    include('add_brand.php');
                }
                if(isset($_GET['add_product'])){
                    include('add_product.php');
                }
                if(isset($_GET['view_product'])){
                    include('view_product.php');
                }
                if(isset($_GET['removed_product'])){
                    include('removed_product.php');
                }
                if(isset($_GET['view_seller'])){
                    include('view_seller.php');
                }
                if(isset($_GET['view_brand'])){
                    include('view_brand.php');
                }
                if(isset($_GET['view_user'])){
                    include('view_user.php');
                }
                if(isset($_GET['view_order'])){
                    include('view_order.php');
                }
                if(isset($_GET['view_order_details'])){
                    include('view_order_details.php');
                }
                if(isset($_GET['view_payment'])){
                    include('view_payment.php');
                }
        ?>
        </div>
    </div>


    <footer class="bg-success p-3">
        <div class="container-fluid">
            <h5 class="text-light" style="text-align: center;">This Site is created by Gavin Da Costa</h5>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>