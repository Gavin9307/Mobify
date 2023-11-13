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
                                        <?php echo 'Sellers';?>
                                    </h1>
                                </div>

                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                    <div class="col-2">
                                        <h6>Seller Name</h6>
                                    </div>
                                    <div class="col-3">
                                        <h6>Email</h6>
                                    </div>
                                    <div class="col-2">
                                        <h6>Username</h6>
                                    </div>
                                    <div class="col-4">
                                        <h6>Address</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>Remove</h6>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <?php 
                                            global $conn;
                                        
                                            $select_query = "select * from `seller`;";
                                            $result_select_query = mysqli_query($conn,$select_query);
                                            while($rowData = mysqli_fetch_assoc($result_select_query)){
                                                $seller_name = $rowData['s_name'];
                                                $seller_email = $rowData['s_email'];
                                                $seller_uname = $rowData['s_uname'];
                                                $seller_address = $rowData['s_add'];
                                                $seller_id = $rowData['s_id'];
                                        
                                                echo "<div class='row mb-4 d-flex justify-content-between align-items-center'>
                                                    
                                                    <div class='col-2'>
                                                        <h6 class='text-black mb-0'>$seller_name</h6>
                                                    </div>
                                                    <div class='col-3'>
                                                        <h6 class='text-black mb-0'>$seller_email</h6>
                                                    </div>
                                                    <div class='col-2'>
                                                        <h6 class='text-black mb-0'>$seller_uname</h6>
                                                    </div>
                                                    <div class='col-4'>
                                                        <h6 class='text-black mb-0'>$seller_address</h6>
                                                    </div>
                                                    <div class='col-1 d-flex justify-content-center'>
    <a href='remove.php?removeSeller=$seller_id' class='text-muted'><i class='fas fa-times'></i></a>
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

