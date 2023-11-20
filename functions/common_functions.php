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
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart 
                    <i class='fa-solid fa-cart-shopping' style='margin-left:5px;'></i></a>
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
                    
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart 
                    <i class='fa-solid fa-cart-shopping' style='margin-left:5px;'></i></a>
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
                    
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart 
                    <i class='fa-solid fa-cart-shopping' style='margin-left:5px;'></i></a>
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
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart 
                    <i class='fa-solid fa-cart-shopping' style='margin-left:5px;'></i></a>
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

function viewMore()
{
    global $conn;
    if (isset($_GET['product_id'])) {
        $pro_id = $_GET['product_id'];
        $select_query = "select * from product where p_id=$pro_id;";
        $result_query = mysqli_query($conn, $select_query);
        while ($row_data = mysqli_fetch_assoc($result_query)) {
            $product_pic = $row_data['p_pic'];
            $product_id = $row_data['p_id'];
            $product_name = $row_data['p_name'];
            $product_price = $row_data['p_price'];
            $product_description = $row_data['p_desc'];

            $select_sb_query = "select * from product
                inner join seller using (s_id)
                inner join brand using (b_id)
                    where p_id=$pro_id;";
            $result_sb_query = mysqli_query($conn, $select_sb_query);
            $row_sb_data = mysqli_fetch_assoc($result_sb_query);
            $s_name = $row_sb_data["s_name"];
            $b_name = $row_sb_data["b_name"];

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
                    <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart 
                    <i class='fa-solid fa-cart-shopping' style='margin-left:5px;'></i></a>
                    </div>
                </div>
                </div>
                </div>";
        }
    }
}

function cartFunction()
{
    global $conn;
    session_start();
    if (isset($_SESSION['username'])) {
        if (isset($_GET['add_to_cart'])) {
            $customer_id = $_SESSION['cid'];
            $product_id = $_GET['add_to_cart'];
            $select_query = "select * from `cart` where c_id=$customer_id AND p_id=$product_id";
            $result_query = mysqli_query($conn, $select_query);
            $num_of_rows = mysqli_num_rows($result_query);
            if ($num_of_rows > 0) {
                echo "<script>alert('This item is present inside the cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                $insert_query = "insert into `cart` (c_id,p_id,buy_qty) values($customer_id,$product_id,1);";
                mysqli_query($conn, $insert_query);
                echo "<script>alert('Item added to cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    } else {
        echo "<script>alert('Please Login to add mobile to cart !')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}


function getCartProducts()
{
    global $conn;
    if (isset($_SESSION['username'])) {
        $c_id = $_SESSION['cid'];
        $select_products_query = "SELECT *
        FROM cart
        INNER JOIN product ON Product.p_id = cart.p_id
        WHERE c_id=$c_id;";
        $result_products_query = mysqli_query($conn, $select_products_query);
        while ($cartData = mysqli_fetch_assoc($result_products_query)) {
            $product_id = $cartData['p_id'];
            $product_pic = $cartData['p_pic'];
            $product_name = $cartData['p_name'];
            $buy_quantity = $cartData['buy_qty'];
            $product_price = $cartData['p_price'];
            echo "<div class='row mb-4 d-flex justify-content-between align-items-center'>
            <div class='col-md-2 col-lg-2 col-xl-2'>
              <img
                src='./assets/Mobile_Images/$product_pic'
                class='img-fluid rounded-3' alt='$product_name'>
            </div>
            <div class='col-md-3 col-lg-3 col-xl-3'>
              <h6 class='text-black mb-0'>$product_name</h6>
            </div>
            <div class='col-md-3 col-lg-3 col-xl-3 d-flex'>

              <form action='cart.php?pro_id=$product_id' method='post' class='d-flex gap-1'>
              <input id='form1' min='0' name='quantity' value='$buy_quantity' type='number'
                class='form-control form-control-sm' />

              <button class='btn btn-dark px-2' name='update_quantity'>Update</button>
              </form>

            </div>
            <div class='col-md-3 col-lg-2 col-xl-2 '>
              <h6 class='mb-0'>Rs $product_price</h6>
            </div>
            <div class='col-md-1 col-lg-1 col-xl-1 '>
              <a href='cart.php?delete_item_cid=$c_id&delete_item_pid=$product_id' class='text-muted'><i class='fas fa-times'></i></a>
            </div>
          </div>

          <hr class='my-4'>";
        }
    }
}


function cartSummary()
{
    global $conn;
    if (isset($_SESSION['username'])) {
        $c_id = $_SESSION['cid'];
        $c_address = $_SESSION['address'];
        $select_products_query = "SELECT * FROM cart INNER JOIN product ON product.p_id = cart.p_id INNER JOIN customer ON customer.c_id = cart.c_id WHERE cart.c_id = $c_id;";
        $result_products_query = mysqli_query($conn, $select_products_query);
        $totalPrice = 0;
        $items = 0;
        while ($cartData = mysqli_fetch_assoc($result_products_query)) {
            $items++;
            $price = $cartData['p_price'];
            $qty = $cartData['buy_qty'];
            $totalPrice = $totalPrice + ($price * $qty);
        }
        echo "<div class='d-flex justify-content-between mb-4'>
    <h5>Total Items </h5>
    <h5>$items</h5>
  </div>
  <h5 class='mb-3'>Shipping Address</h5>
  <h6>$c_address</h6>
  <hr class='my-4'>

  <div class='d-flex justify-content-between mb-5'>
    <h5 class='text-uppercase'>Total price</h5>
    <h5>Rs $totalPrice</h5>
  </div>

  <a href='payment.php'><button type='button' class='btn btn-success btn-block btn-lg'
    data-mdb-ripple-color='dark'>Proceed for payment</button></a>";
    }
}


function getOrderProducts(){
    global $conn;
    if (isset($_SESSION['username'])) {
        $c_id = $_SESSION['cid'];
        $select_products_query = "SELECT orders.od_id,orders.od_date,orders.od_price,payment.txn_id 
        FROM orders
        INNER JOIN orderpayment on orderpayment.od_id=orders.od_id
        INNER JOIN payment on payment.pt_id=orderpayment.pt_id 
        where orders.c_id=$c_id
        order by od_id desc;";
        $result_products_query = mysqli_query($conn, $select_products_query);
        while ($cartData = mysqli_fetch_assoc($result_products_query)) {
           
            $order_id = $cartData['od_id'];
            $order_date = $cartData['od_date'];
            $order_price = $cartData['od_price'];
            $txn_id = $cartData['txn_id'];

            echo "<div class='row mb-4 d-flex justify-content-between align-items-center'>
            <div class='col-2'>
              <h6 class='text-black mb-0'>$order_id</h6>
            </div>
            <div class='col-3'>
              <h6 class='text-black mb-0'>$order_date</h6>
            </div>
            <div class='col-2 '>
              <h6 class='mb-0'>Rs $order_price</h6>
            </div>
            <div class='col-3'>
              <h6 class='text-black mb-0'>$txn_id</h6>
            </div>
            <div class='col-2'>
                <a href='order_details.php?view_order_details=$order_id'>
                    <button class='btn btn-dark px-2' name='view_od_details'>View Details</button>
                </a>
            </div>
          </div>

          <hr class='my-4'>";
        }
    }
}

function getOrderProducts_details(){
    global $conn;
                                            $od_id = $_GET['view_order_details'];
                                            $select_query = "SELECT product.p_pic,product.p_name,product.p_price,customerproduct.buy_qty
                                            FROM `customerproduct`
                                            INNER JOIN product on product.p_id=customerproduct.p_id
                                            WHERE customerproduct.od_id=$od_id;";
                                            $result_select_query = mysqli_query($conn,$select_query);
                                            while ($cartData = mysqli_fetch_assoc($result_select_query)) {
                                                $product_pic = $cartData['p_pic'];
                                                $product_name = $cartData['p_name'];
                                                $buy_quantity = $cartData['buy_qty'];
                                                $product_price = $cartData['p_price'];
                                                echo "<div class='row mb-4 d-flex justify-content-between align-items-center'>
                                                <div class='col-2'>
                                                  <img
                                                    src='./assets/Mobile_Images/$product_pic'
                                                    class='img-fluid rounded-3' alt='$product_name'>
                                                </div>
                                                <div class='col-4'>
                                                  <h6 class='text-black mb-0'>$product_name</h6>
                                                </div>
                                                <div class='col-3'>
                                                  <h6 class='text-black mb-0'>$buy_quantity</h6>
                                                </div>
                                                <div class='col-3'>
                                                  <h6 class='mb-0'>Rs $product_price</h6>
                                                </div>
                                              </div>
                                    
                                              <hr class='my-4'>";
                                            }
}