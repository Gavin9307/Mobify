<?php
include('./includes/connect.php');
// getting Products
function getProducts()
{
    global $conn;
    if (!isset($_GET['seller'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "select * from `product` order by rand() LIMIT 0,9";
            $result_query = mysqli_query($conn, $select_query);
            while ($row_data = mysqli_fetch_assoc($result_query)) {
                $product_pic = $row_data['p_pic'];
                $product_id = $row_data['p_id'];
                $product_name = $row_data['p_name'];
                $product_price = $row_data['p_price'];
                echo "<div class='col-md-4 mb-4 ' style='max-width: 300px;min-width:200px'>
            <div class='card'>
                <a href='product_details.php?product_id=$product_id'>
                <img src='./assets/Mobile_Images/$product_pic' class='card-img-top' alt='...'>
                </a>
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
        }
    }
}

function getUniqueProductSeller()
{
    global $conn;
    if (isset($_GET['seller'])) {
        $seller_id = $_GET['seller'];
        $select_query = "select * from `product` where s_id = $seller_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_rows = mysqli_num_rows($result_query);
        if ($num_rows > 0) {
            while ($row_data = mysqli_fetch_assoc($result_query)) {
                $product_id = $row_data['p_id'];
                $product_pic = $row_data['p_pic'];
                $product_name = $row_data['p_name'];
                $product_price = $row_data['p_price'];
                echo "<div class='col-md-4 mb-4 ' style='max-width: 300px;min-width:200px'>
            <div class='card'>
            <a href='product_details.php?product_id=$product_id'>
                <img src='./assets/Mobile_Images/$product_pic' class='card-img-top' alt='...'>
                </a>
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
        } else {
            echo '<div class="w-50 me-auto mt-0 mb-0 ms-auto alert alert-warning " role="alert" style="text-align:center;">No Product Available
            </div>';
        }
    }
}


function getUniqueProductBrand()
{
    global $conn;
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "select * from `product` where b_id = $brand_id order by rand() LIMIT 0,9";
        $result_query = mysqli_query($conn, $select_query);
        $num_rows = mysqli_num_rows($result_query);
        if ($num_rows > 0) {
            while ($row_data = mysqli_fetch_assoc($result_query)) {
                $product_id = $row_data['p_id'];
                $product_pic = $row_data['p_pic'];
                $product_name = $row_data['p_name'];
                $product_price = $row_data['p_price'];
                echo "<div class='col-md-4 mb-4 ' style='max-width: 300px;min-width:200px'>
            <div class='card'>
            <a href='product_details.php?product_id=$product_id'>
                <img src='./assets/Mobile_Images/$product_pic' class='card-img-top' alt='...'>
                </a>
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
        } else {
            echo '<div class="w-50 me-auto mt-0 mb-0 ms-auto alert alert-warning " role="alert" style="text-align:center;">No Product Available
            </div>';
        }
    }
}

function getSellers()
{
    global $conn;
    $select_sellers = "select * from `seller`";
    $result_sellers = mysqli_query($conn, $select_sellers);
    while ($row_data = mysqli_fetch_assoc($result_sellers)) {
        $sname = $row_data['s_name'];
        $sid = $row_data['s_id'];
        echo "<li class='nav-item'>
                            <a href='./index.php?seller=$sid' class='nav-link text-success' > <h5>$sname</h5></a>
                            </li>";
    }
}

function getBrands()
{
    global $conn;
    $select_brands = "select * from `brand`";
    $result_brands = mysqli_query($conn, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $bname = $row_data['b_name'];
        $bid = $row_data['b_id'];
        echo "<li class='nav-item'>
        <a href='./index.php?brand=$bid' class='nav-link text-success'> <h5>$bname</h5></a>
        </li>";
    }
}
function searchProducts()
{
    global $conn;
    if (isset($_GET['search_product'])) {
        $key = $_GET['keyword'];
        $select_query = "select * from `product` where p_name like '%$key%'";
        $result_query = mysqli_query($conn, $select_query);
        $num_rows = mysqli_num_rows($result_query);
        if ($num_rows > 0) {
            while ($row_data = mysqli_fetch_assoc($result_query)) {
                $product_id = $row_data['p_id'];
                $product_pic = $row_data['p_pic'];
                $product_name = $row_data['p_name'];
                $product_price = $row_data['p_price'];
                echo "<div class='col-md-4 mb-4 ' style='max-width: 300px;min-width:200px'>
            <div class='card'>
            <a href='product_details.php?product_id=$product_id'>
                <img src='./assets/Mobile_Images/$product_pic' class='card-img-top' alt='...'>
                </a>
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

        } else {
            echo '<div class="w-50 me-auto mt-0 mb-0 ms-auto alert alert-warning " role="alert" style="text-align:center;">No Product Available
            </div>';
        }
    }
}

function viewMore(){
    global $conn;
    if (isset($_GET['product_id'])) {
            $pro_id = $_GET['product_id'];
            $select_query = "select * from `product` where p_id=$pro_id;";
            $result_query = mysqli_query($conn, $select_query);
            while ($row_data = mysqli_fetch_assoc($result_query)) {
                $product_pic = $row_data['p_pic'];
                $product_id = $row_data['p_id'];
                $product_name = $row_data['p_name'];
                $product_price = $row_data['p_price'];
                $product_description = $row_data['p_desc'];

                $seller = $row_data['s_id'];
                $select_seller_query = "select * from `seller` where s_id=$seller;";
                $result_seller_query = mysqli_query($conn, $select_seller_query);
                $row_seller_data = mysqli_fetch_assoc($result_seller_query);
                $s_name = $row_seller_data["s_name"];

                $brand = $row_data['b_id'];
                $select_brand_query = "select * from `brand` where b_id=$brand;";
                $result_brand_query = mysqli_query($conn, $select_brand_query);
                $row_brand_data = mysqli_fetch_assoc($result_brand_query);
                $b_name = $row_brand_data["b_name"];


                echo "<div class='col-md-10 '>
                <div class='ms-5 row d-flex justify-content-start mt-4 gap-5'>
                    <div class='row mb-5 gap-5' style='height: 400px;'>
                    <h2>$product_name</h2>
                    <div class='d-flex flex-wrap gap-5 justify-content-evenly'>
                        <div class='d-flex flex-wrap gap-5'>
                        <div class='d-flex flex-wrap justify-content-center align-items-center'>
                            <img src='assets/Mobile_Images/$product_pic' alt='' style='height: 300px;'>
                        </div>
                        <div class='d-flex flex-wrap flex-column justify-content-evenly align-items-start gap-3'>
                            
                            <h4>Rs. $product_price</h4>
                            <div>
                            <h5>Description :</h5>
                            <p class=''>$product_description</p>
                            </div>
                            <h5>Manufacturer : $b_name</h5>
                            <h5>Sold By : $s_name</h5>
                        </div>
                        </div>
                        
                    </div>
                    <div class='d-flex justify-content-end me-5'>
                         <a href='#' class='btn btn-success'>Buy Now</a>
                    </div>
                </div>
                </div>
                </div>";
            }
        }
}
?>