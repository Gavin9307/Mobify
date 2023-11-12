<?php
    include('../includes/connect.php');
    if(isset($_POST['add_brand'])){
        $brand_name = $_POST['bname'];
        $select_query = "select * from `brand` where b_name='$brand_name'";
        $result_select = mysqli_query($conn,$select_query);
        $numRows = mysqli_num_rows($result_select);
        if($numRows>0){
            echo "<script>alert('Brand already Exists')</script>";
        }
        else{
            $insert_query = "insert into `brand` (b_name) values ('$brand_name')";
            $result = mysqli_query($conn, $insert_query);
            if ($result) {
                echo "<script>alert('Brand Added Successfully')</script>";
            }
        }
        echo "<script>location.href='./index.php?add_brand';</script>";
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
                                <form action="" method="post">
                                    <h1><strong>Add Brand</strong></h1>
                                    <div class=" mb-3">
                                        <label for="exampleInputUBname1" class="form-label " >Brand Name</label>
                                        <input type="text" class="form-control" id="exampleInputBname1" name="bname">
                                    </div>
                                    <button type="submit" class="btn btn-success" name="add_brand">Submit</button>
                                </form>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>