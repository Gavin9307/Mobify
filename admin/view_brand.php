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
                                        <?php echo 'Brands :';?>
                                    </h1>
                                </div>
                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                    <div class="col-11">
                                        <h6>Name</h6>
                                    </div>
                                    <div class="col-1">
                                        <h6>Remove</h6>
                                    </div>
                                </div>

                                <?php 
                                            global $conn;
                                        
                                            $select_query = "select * from `brand`;";
                                            $result_select_query = mysqli_query($conn,$select_query);
                                            while($rowData = mysqli_fetch_assoc($result_select_query)){

                                                $brand_name = $rowData['b_name'];
                                                $brand_id = $rowData['b_id'];
                                                echo "<div class='row mb-4 d-flex justify-content-between align-items-center'>
                                                    
                                                    <div class='col-11'>
                                                        <h6 class='text-black mb-0'>$brand_name</h6>
                                                    </div>
                                                    <div class='col-1 d-flex justify-content-center'>
    <a href='remove.php?removeBrand=$brand_id' class='text-muted'><i class='fas fa-times'></i></a>
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

