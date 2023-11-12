<?php
include('./includes/connect.php');
include('./functions/common_functions.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    //  session_start();  
    include('head.php');
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/login.css" rel="stylesheet">


    <title>Payment</title>
</head>

<body class="d-flex flex-column">
    <?php
    include('header.php');
    ?>
    <?php
    include('sub_header.php');
    ?>
    <div class="container px-5 py-4" id="shop-body">
        <div class="row my-4">
            <a class="nav nav-item text-decoration-none text-muted mb-2" href="#" onclick="history.back();">
                <i class="bi bi-arrow-left-square me-2"></i>Go back
            </a>
        </div>
        <div class="row row-cols-1 row-cols-md-2 mb-5">
            <div class="col mb-3 qr mb-md-0">
                <img src="assets/images/qr.jpg" class="img-fluid rounded-25 float-start" alt="qr">

            </div>



            <form method="POST" action="add_order.php" class="form-floating">


                <h2 class="mt-4 mb-3 fw-normal text-bold"><i class="bi bi-qr-code-scan"></i>Payment Details</h2>
                <div class="col my-3">
                    <ul class="list-inline justify-content-between">
                        <li class="list-inline-item fw-light me-5"><h3>Grand Total</h3></li>
                        <li class="list-inline-item fw-bold h4">
                            <?php
                            if (!isset($_SESSION)) {
                                session_start();
                            }
                            if (isset($_SESSION['username'])) {
                                $c_id = $_SESSION['cid'];
                                $select_products_query = "SELECT * FROM cart INNER JOIN product ON product.p_id = cart.p_id INNER JOIN customer ON customer.c_id = cart.c_id WHERE cart.c_id = $c_id;";
                                $result_products_query = mysqli_query($conn, $select_products_query);
                                $totalPrice = 0;
                                $items = 0;
                                while ($cartData = mysqli_fetch_assoc($result_products_query)) {
                                    $price = $cartData['p_price'];
                                    $qty = $cartData['buy_qty'];
                                    $totalPrice = $totalPrice+($price*$qty);
                                }
                                printf("Rs %.2f",$totalPrice);
                            }
                            ?>
                        </li>

                    </ul>

                </div>

                <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
                if (isset($_SESSION['username'])) {
                    echo "<h4>Name : {$_SESSION['username']}</h4>
                    <h4>Email : {$_SESSION['email']}</h4>
                    <h4>Address : {$_SESSION['address']}</h4>";
                }
                ?>

                <div class="form-floating mt-5 mb-2">
                    <input type="text" class="form-control" id="tid" placeholder="transactionid" name="tid" minlength="12" maxlength="45" required>
                    <label for="transactionid">Transaction Id</label>
                </div>
                <div class="form-floating">
                    <div class="mb-2 form-check">
                        <input type="checkbox" class="form-check-input " id="tandc" name="tandc" required>
                        <label class="form-check-label small" for="tandc">I agree to the terms and conditions and the
                            privacy policy</label>
                    </div>
                </div>
                <button class="w-100 btn btn-success mb-3"  name='addorder' type="submit">Submit</button>
            </form>
        </div>
    </div>
    </div>
    </div>

    <?php include('footer.php') ?>
</body>

</html>