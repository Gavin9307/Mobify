<?php
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

  if(isset($_GET['delete_item_cid']) && isset($_GET['delete_item_pid'])){
    global $conn;
    $c_id = $_GET['delete_item_cid'];
    $p_id = $_GET['delete_item_pid'];
    $delete_query = "DELETE FROM `cart` WHERE c_id=$c_id and p_id=$p_id;";
    mysqli_query($conn,$delete_query);
    echo "<script>location.href='./cart.php';</script>";
  }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Mobify - Cart</title>
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
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">
                      <?php echo $_SESSION['name']."'s " ?>Cart
                    </h1>
                    
                    <h6 class="mb-0 text-muted">
                    Total items : 
                    <?php 
                    $customer_id = $_SESSION['cid'];
                    $select_query = "select * from `cart` where c_id=$customer_id";
                    $result_query = mysqli_query($conn,$select_query);
                    $num_of_rows = mysqli_num_rows($result_query);
                    echo $num_of_rows; 
                    ?> 
                    </h6>
                  </div>

                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <h6>Photo</h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6>Product Name</h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                    <h6>Quantity</h6>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2">
                    <h6>Price Each</h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 ">
                    <h6>Del</h6>
                    </div>
                  </div>

                  <hr class="my-4">

                  <?php
                    getCartProducts();
                  ?>

                  <div class="pt-5">
                    <h6 class="mb-0"><a href="index.php" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Go Back</a></h6>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-4 bg-grey">
                <div class="p-5 ">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  <?php
                      cartSummary();
                  ?>

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