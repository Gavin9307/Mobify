<?php
include("./includes/connect.php");
if (isset($_POST['add_user'])) {
    $full_name = $_POST['fname'];
    $user_name = $_POST['cuname'];
    $user_email = $_POST['uemail'];
    $user_pass = $_POST['upass'];
    $user_phno = $_POST['uphno'];
    $user_address = $_POST['uaddress'];

    $select_query = "select * from `customer` where c_uname='$user_name' OR c_email='$user_email'";
    $result_select = mysqli_query($conn, $select_query);
    $numRows = mysqli_num_rows($result_select);
    if ($numRows > 0) {
        echo "<script>alert('User already Exists')</script>";
    } else {
        $insert_query = "insert into `customer`(c_fname,c_add,c_uname,c_pwd,c_email,c_phno) values ('$full_name','$user_address','$user_name','$user_pass','$user_email','$user_phno');";
        $result_query = mysqli_query($conn, $insert_query);
        if ($result_query) {
            echo "<script>alert('Registration Successful')</script>";
            echo "<script>location.href='./index.php';</script>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php 
        include('./header.php');
    ?>
    <div class="container mb-5">
        <form action="" method="post" enctype="multipart/form-data" class="mt-4">
            <h3 style="text-align: center;">User Registration</h3>
            <div class="mb-3">
                <label for="InputUMname1" class="form-label ">Full Name</label>
                <input type="text" class="form-control" id="InputMname1" name="fname" autocomplete="off" required>
            </div>
            <label for="cuname" class="form-label ">Username</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" name="cuname" id="cuname" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="uemail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="upass" type="password" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="exampleInputphone1" class="form-label">Phone Number</label>
                <input name="uphno" type="text" class="form-control" id="exampleInputphone1">
                <div id="emailHelp" class="form-text">We'll never share your Phone Number with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputUaddress1" class="form-label">Address</label>
                <input type="text" class="form-control" name="uaddress" id="exampleInputUaddress1">
            </div>
            <button type="submit" class="btn btn-success" name="add_user">Register</button>
        </form>
    </div>
    <?php 
        echo "<div style='height:50px;'></div>" ;
        include('./footer.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>