
<?php
include('../includes/connect.php');
?>

<section class="h-100 h-custom " style="background-color: #ffffff;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-12">
                            <div class="p-5">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <h1 class="fw-bold mb-0 text-black">
                                        
                                        <?php 
                                        $od_no = $_GET['view_order_details'];
                                        echo 'Order #'.$od_no;
                                        ?>
                                    </h1>
                                </div>
 
                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                    <div class="col-2">
                                        <h6>Photo</h6>
                                    </div>
                                    <div class="col-4">
                                        <h6>Product Name</h6>
                                    </div>
                                    <div class="col-3">
                                        <h6>Quantity</h6>
                                    </div>
                                    <div class="col-3">
                                        <h6>Price Each</h6>
                                    </div>
                                </div>
                                <hr class="my-4">

                                <?php 
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
                                                    src='../assets/Mobile_Images/$product_pic'
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
                                    ?>

                                <div class="pt-5">
                                    <h6 class="mb-0"><a href="index.php" class="text-body"><i
                                                class="fas fa-long-arrow-alt-left me-2"></i>Go Back</a></h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>