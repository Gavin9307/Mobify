<?php
include('../includes/connect.php');
if (isset($_POST['add_seller'])) {

    $seller_name = $_POST['sname'];
    $seller_email = $_POST['semail'];
    $seller_uname = $_POST['suname'];
    $seller_pass = $_POST['spass'];
    $seller_address = $_POST['saddress'];

    $select_query = "select * from `seller` where s_name='$seller_name'";
    $result_select = mysqli_query($conn, $select_query);
    $numRows = mysqli_num_rows($result_select);
    if ($numRows > 0) {
        echo "<script>alert('Seller already Exists')</script>";
    } 
    else {
        $insert_query = "insert into `seller` (s_name,s_add,s_uname,s_pwd,s_email) values ('$seller_name','$seller_address','$seller_uname','$seller_pass','$seller_email')";
        $result = mysqli_query($conn, $insert_query);
        if ($result) {
            echo "<script>alert('Seller Added Successfully')</script>";
        }
    }
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
        <h1><strong>Add Seller</strong></h1>
        <div class="mb-3">
            <label for="exampleInputUName1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputName1" name="sname">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="semail" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputUname1" class="form-label">Username</label>
            <input type="text" class="form-control" id="exampleInputUname1" name="suname">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="spass" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputUaddress1" class="form-label">Address</label>
            <input type="text" class="form-control" name="saddress" id="exampleInputUaddress1">
        </div>
        <button type="submit" class="btn btn-success" name="add_seller">Submit</button>
    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    