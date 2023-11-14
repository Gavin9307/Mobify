<?php
include("../includes/connect.php");

if (isset($_POST['verify_admin'])) {
    $user_name = $_POST['admuname'];
    $user_pass = $_POST['admpass'];

    $select_user_query = "select * from `admin` where adm_username='$user_name'";
    $result_user_select = mysqli_query($conn, $select_user_query);
    $numRows = mysqli_num_rows($result_user_select);
    if ($numRows == 0) {
        echo "<script>alert('Admin doesnt Exist')</script>";
    } else {
        $db_data = mysqli_fetch_assoc($result_user_select);
        $db_pass = $db_data['adm_password'];
        if($db_pass==$user_pass){
            echo "<script>alert('Login Sucessfull')</script>";
            session_start();
            $_SESSION['username']=$db_data['adm_username'];
            $_SESSION['password']=$db_data['adm_password'];
            $_SESSION['name']=$db_data['adm_name'];
            echo "<script>location.href='./index.php?add_product';</script>";
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
<?php
include("../head.php");
?> 
    <title>Admin Login</title>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-success-subtle  bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="../assets/images/logo.jpeg" alt="mobify-logo.jpeg" width="75px" height="50px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../support.php">Support</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container mb-5 " style="margin-top: 150px;">
        <form action="" method="post" enctype="multipart/form-data" class="mt-4" >
            <h3 style="text-align: center;" >Admin Login</h3>
            <label for="cuname" class="form-label ">Username</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" name="admuname" id="cuname" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="admpass" type="password" class="form-control" id="exampleInputPassword1"  required>
            </div>
            <button type="submit" class="btn btn-success" name="verify_admin">Login</button>
        </form>
    </div>
    <?php
        echo "<div style='height:380px;'></div>" ;
        include('../footer.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>