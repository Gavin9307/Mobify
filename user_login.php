<?php
include("./includes/connect.php");

if (isset($_POST['verify_user'])) {
    $user_name = $_POST['cuname'];
    $user_pass = $_POST['upass'];

    $select_user_query = "select * from `customer` where c_uname='$user_name'";
    $result_user_select = mysqli_query($conn, $select_user_query);
    $numRows = mysqli_num_rows($result_user_select);
    if ($numRows == 0) {
        echo "<script>alert('User doesnt Exist')</script>";
    } else {
        $db_data = mysqli_fetch_assoc($result_user_select);
        $db_pass = $db_data['c_pwd'];
        if($db_pass==$user_pass){
            echo "<script>alert('Login Sucessfull')</script>";
            session_start();
            $_SESSION['username']=$db_data['c_uname'];
            $_SESSION['password']=$db_data['c_pwd'];
            $_SESSION['name']=$db_data['c_fname'];
            $_SESSION['address']=$db_data['c_add'];
            $_SESSION['cid']=$db_data['c_id'];
            $_SESSION['email']=$db_data['c_email'];
            $_SESSION['phno']=$db_data['c_phno'];
            echo "<script>location.href='./index.php';</script>";
        }
        else{
            echo "<script>alert('Incorrect Password')</script>";
        }
    }
}

?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="shortcut icon" href="./assets/images/logo.jpeg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php 
        include('./header.php');
        echo "<div style='height:50px;'></div>" ;
    ?>
    <div class="container mb-5">
        <form action="" method="post" enctype="multipart/form-data" class="mt-4">
            <h3 style="text-align: center;">User Login</h3>
            <label for="cuname" class="form-label ">Username</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" name="cuname" id="cuname" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="upass" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-success" name="verify_user">Login</button>
            <h6 class="pt-4">Don't have an account? <a class="text-success" href="register.php">Register</a> </h6>
        </form>
    </div>
    <?php
        echo "<div style='height:350px;'></div>" ;
        include('./footer.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>