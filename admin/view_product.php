<?php
include('../includes/connect.php');
if(isset($_POST['update_quantity'])){
    global $conn;
    $pro_qty = $_POST['quantity'];
    $p_id = $_POST['p_id'];
    $update_query = "UPDATE `product`
    SET p_qty = $pro_qty
    WHERE p_id=$p_id;";
    $result_update_query = mysqli_query($conn,$update_query);
    echo "<script>alert('Product Quantity Updated Successfully')</script>";
    echo "<script>location.href='index.php?view_product';</script>";
}
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
                                            <?php echo 'Mobiles Listed';?>
                                        </h1>
                                    </div>

                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                        <div class="col-1">
                                            <h6>Photo</h6>
                                        </div>
                                        <div class="col-2">
                                            <h6>Mobile</h6>
                                        </div>
                                        <div class="col-2">
                                            <h6>Seller</h6>
                                        </div>
                                        <div class="col-2">
                                            <h6>Brand</h6>
                                        </div>
                                        <div class="col-2">
                                            <h6>Quantity</h6>
                                        </div>
                                        <div class="col-2 d-flex justify-content-center">
                                            <h6>Price</h6>
                                        </div>
                                        <div class="col-1">
                                            <h6>Remove</h6>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <?php 
                                            global $conn;
                                        
                                            $select_query = "select * from `product`
                                        inner join `seller` using (s_id)
                                        inner join `brand` using (b_id);";
                                            $result_select_query = mysqli_query($conn,$select_query);
                                            while($rowData = mysqli_fetch_assoc($result_select_query)){
                                        
                                                $product_pic = $rowData['p_pic'];
                                                $product_name = $rowData['p_name'];
                                                $product_id = $rowData['p_id'];
                                                $pro_quantity = $rowData['p_qty'];
                                                $product_price = $rowData['p_price'];
                                                $seller = $rowData['s_name'];
                                                $brand = $rowData['b_name'];
                                        
                                                echo "<div class='row mb-4 d-flex justify-content-between align-items-center'>
                                                    <div class='col-1'>
                                                        <img src='../assets/Mobile_Images/$product_pic' class='img-fluid rounded-3' alt='$product_name'>
                                                    </div>
                                                    <div class='col-2'>
                                                        <h6 class='text-black mb-0'>$product_name</h6>
                                                    </div>
                                                    <div class='col-2'>
                                                        <h6 class='text-black mb-0'>$seller</h6>
                                                    </div>
                                                    <div class='col-2'>
                                                        <h6 class='text-black mb-0'>$brand</h6>
                                                    </div>
                                                    <div class='col-2'>
                                        
                                                        <form action='' method='post' class='d-flex gap-1'>
                                                            <input type='hidden' name='p_id' value='$product_id'>
                                                            <input id='form1' min='0' name='quantity' value='$pro_quantity' type='number' class='form-control form-control-sm' />
                                                            <button class='btn btn-dark px-2' name='update_quantity'>Update</button>
                                                        </form>
                                        
                                                    </div>
                                                    <div class='col-2 d-flex justify-content-center'>
                                                        <h6 class='mb-0 '>Rs $product_price</h6>
                                                    </div>
                                                    <div class='col-1 d-flex justify-content-center'>
                                                        <a href='' class='text-muted'><i class='fas fa-times'></i></a>
                                                    </div>
                                                </div>
                                        
                                                <hr class='my-4'>";
                                            }
                                    ?>

                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Go Back</a></h6>
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