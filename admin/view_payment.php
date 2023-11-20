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
                                        <?php echo 'Payments';?>
                                    </h1>
                                </div>

                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                    <div class="col-2">
                                        <h6>Customer Name</h6>
                                    </div>
                                    <div class="col-3">
                                        <h6>Email</h6>
                                    </div>
                                    <div class="col-2">
                                        <h6>Username</h6>
                                    </div>
                                    <div class="col-2">
                                        <h6>Payment Amount</h6>
                                    </div>
                                    <div class="col-2">
                                        <h6>Transaction ID</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>Order ID</h6>
                                    </div>
                                </div>
                                <hr class="my-4">

                                <?php 
                                            global $conn;
                                        
                                            $select_query = "select * from paymentview;";
                                            $result_select_query = mysqli_query($conn,$select_query);
                                            while($rowData = mysqli_fetch_assoc($result_select_query)){
                                                $customer_name = $rowData['c_fname'];
                                                $customer_email = $rowData['c_email'];
                                                $customer_uname = $rowData['c_uname'];
                                                $pt_amt = $rowData['pt_total'];
                                                $txn_id = $rowData['txn_id'];
                                                $od_id = $rowData['od_id'];
                                        
                                                echo "<div class='row mb-4 d-flex justify-content-between align-items-center'>
                                                    
                                                    <div class='col-2'>
                                                        <h6 class='text-black mb-0'>$customer_name</h6>
                                                    </div>
                                                    <div class='col-3'>
                                                        <h6 class='text-black mb-0'>$customer_email</h6>
                                                    </div>
                                                    <div class='col-2'>
                                                        <h6 class='text-black mb-0'>$customer_uname</h6>
                                                    </div>
                                                    <div class='col-2'>
                                                        <h6 class='text-black mb-0'>$pt_amt</h6>
                                                    </div>
                                                    <div class='col-2'>
                                                        <h6 class='text-black mb-0'>$txn_id</h6>
                                                    </div>
                                                    <div class='col-1'>
                                                        <h6 class='text-black mb-0'>$od_id</h6>
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