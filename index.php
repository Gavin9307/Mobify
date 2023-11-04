<?php
    include('./includes/connect.php')
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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="navbar navbar-expand-lg bg-success-subtle  bg-primary px-3">
            <div class=" d-flex align-content-baseline justify-content-center gap-2">
                <i class=" fa-regular fa-user "></i>
                <a class="nav-link" href=""> Welcome Guest</a>
            </div>
        </div>

        <div class="container-fluid bg-success d-flex justify-content-center ">
            <hr>
            <h2 class="text-light">Products</h2><hr>
        </div>

        <div class="row">
            <div class="col-md-2 bg-success-subtle p-4">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><h4>Brands</h4></li>
                    <?php
                        $select_brands = "select * from `brand`";
                        $result_brands = mysqli_query($conn,$select_brands);
                        while($row_data = mysqli_fetch_assoc($result_brands)){
                            $bname = $row_data['b_name'];
                            $bid = $row_data['b_id'];
                            echo "<li class='nav-item'>
                            <a href='' class='nav-link text-success'> <h5>$bname</h5></a>
                            </li>";
                        }
                    ?>
                    
                </ul>
                <ul class="navbar-nav me-auto mt-5">
                    <li class="nav-item"><h4>Sellers</h4></li>
                    <?php
                        $select_sellers = "select * from `seller`";
                        $result_sellers = mysqli_query($conn,$select_sellers);
                        while($row_data = mysqli_fetch_assoc($result_sellers)){
                            $sname = $row_data['s_name'];
                            $sid = $row_data['s_id'];
                            echo "<li class='nav-item'>
                            <a href='' class='nav-link text-success'> <h5>$sname</h5></a>
                            </li>";
                        }
                    ?>
                </ul>
            </div>
            <div class="col-md-10 gap-4 ">
                <div class="row d-flex justify-content-evenly mt-4">
                    <?php
                        include("./includes/connect.php");
                        $select_query = "select * from `product`";
                        $result_query = mysqli_query($conn,$select_query);
                        while($row_data = mysqli_fetch_assoc($result_query)){
                            $product_pic=$row_data['p_pic'];
                            $product_name=$row_data['p_name'];
                            $product_price=$row_data['p_price'];
                            echo "<div class='col-md-4 mb-4 ' style='max-width: 400px;'>
                            <div class='card'>
                                <img src='./assets/Mobile_Images/$product_pic' class='card-img-top' alt='...'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_name</h5>
    
                                    <h6 class='card-text'>Rs 
                                    $product_price
                                    </h6>
                                    <a href='#' class='btn btn-success'>Buy Now</a>
                                    <a href='#' class='btn btn-outline-success '>
                                        <i class='fa-solid fa-cart-shopping'></i>
                                    </a>
                                </div>
                            </div>
                        </div>";
                        }
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