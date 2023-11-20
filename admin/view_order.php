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
                                        <?php echo 'Orders';?>
                                    </h1>
                                </div>

                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                    <div class="col-1">
                                        <h6>Order ID</h6>
                                    </div>
                                    <div class="col-2">
                                        <h6>Customer Name</h6>
                                    </div>
                                    <div class="col-3">
                                        <h6>Customer Email</h6>
                                    </div>
                                    <div class="col-2">
                                        <h6>Order Date</h6>
                                    </div>
                                    <div class="col-2">
                                        <h6>Order Price</h6>
                                    </div>
                                    <div class="col-2">
                                        <h6>View Details</h6>
                                    </div>
                                </div>
                                <hr class="my-4">

                                <?php 
                                            global $conn;
                                        
                                            $select_query = "SELECT orders.od_id, customer.c_fname,customer.c_email,orders.od_date,orders.od_price FROM orders INNER JOIN customer on orders.c_id=customer.c_id order by od_id desc;";
                                            $result_select_query = mysqli_query($conn,$select_query);
                                            while($rowData = mysqli_fetch_assoc($result_select_query)){
                                                $customer_name = $rowData['c_fname'];
                                                $customer_email = $rowData['c_email'];
                                                $order_id = $rowData['od_id'];
                                                $order_date = $rowData['od_date'];
                                                $order_price = $rowData['od_price'];
                                        
                                                echo "<div class='row mb-4 d-flex justify-content-between align-items-center'>
                                                    
                                                    <div class='col-1'>
                                                        <h6 class='text-black mb-0'>$order_id</h6>
                                                    </div>
                                                    <div class='col-2'>
                                                        <h6 class='text-black mb-0'>$customer_name</h6>
                                                    </div>
                                                    <div class='col-3'>
                                                        <h6 class='text-black mb-0'>$customer_email</h6>
                                                    </div>
                                                    <div class='col-2'>
                                                        <h6 class='text-black mb-0'>$order_date</h6>
                                                    </div>
                                                    <div class='col-2'>
                                                        <h6 class='text-black mb-0'>$order_price</h6>
                                                    </div>
                                                    <div class='col-2'>
                                                        <a href='index.php?view_order_details=$order_id'>
                                                            <button class='btn btn-dark px-2' name='view_od_details'>View Details</button>
                                                        </a>
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