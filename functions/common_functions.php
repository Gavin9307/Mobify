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
                $product_name = $row_data['p_name'];
                $product_price = $row_data['p_price'];
                echo "<div class='col-md-4 mb-4 ' style='max-width: 300px;min-width:200px'>
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
                $product_pic = $row_data['p_pic'];
                $product_name = $row_data['p_name'];
                $product_price = $row_data['p_price'];
                echo "<div class='col-md-4 mb-4 ' style='max-width: 300px;min-width:200px'>
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
                $product_pic = $row_data['p_pic'];
                $product_name = $row_data['p_name'];
                $product_price = $row_data['p_price'];
                echo "<div class='col-md-4 mb-4 ' style='max-width: 300px;min-width:200px'>
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
                $product_pic = $row_data['p_pic'];
                $product_name = $row_data['p_name'];
                $product_price = $row_data['p_price'];
                echo "<div class='col-md-4 mb-4 ' style='max-width: 300px;min-width:200px'>
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

        } else {
            echo '<div class="w-50 me-auto mt-0 mb-0 ms-auto alert alert-warning " role="alert" style="text-align:center;">No Product Available
            </div>';
        }
    }
}
?>