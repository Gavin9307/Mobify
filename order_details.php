<?php
    include('./restricted.php');
    include('./includes/connect.php');
    include('./functions/common_functions.php');
    if(isset($_GET['logout'])){
        session_start();
        session_unset();
        session_destroy();
        echo "<script>alert('Logout Sucessfull')</script>";
        echo "<script>location.href='./index.php';</script>";
    }

    if(isset($_GET['pro_id'])){
      session_start();
      $quantity = $_POST['quantity'];
      $c_id = $_SESSION['cid'];
      $p_id = $_GET['pro_id'];
      $set_query = "UPDATE `cart`
      SET buy_qty = $quantity
      WHERE c_id=$c_id and p_id=$p_id;";
      $result_select = mysqli_query($conn,$set_query);
      echo "<script>location.href='./cart.php';</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Mobify - Order Details</title>
</head>

<body class="bg-body-tertiary">
    <div class="container-fluid p-0 ">

    <?php 
        include("header.php");
    ?>

    <?php
        include("sub_header.php");
    ?>

<section class="h-100 h-custom " style="background-color: #ffffff;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">
                    <?php 
                        $od_no = $_GET['view_order_details'];
                        echo 'Order #'.$od_no;
                    ?>
                    </h1>
                  </div>

                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                                    <div class="col-2">
                                        <h6>Photo</h6>
                                    </div>
                                    <div class="col-4">
                                        <h6>Product Name</h6>
                                    </div>
                                    <div class="col-3">
                                        <h6>Quantity</h6>
                                    </div>
                                    <div class="col-3">
                                        <h6>Price Each</h6>
                                    </div>
                  </div>
                  <hr class="my-4">

                  <?php
                    getOrderProducts_details();
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
</section>

    </div>
    <?php
        include("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>