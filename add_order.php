<?php
include('./includes/connect.php');
include('./functions/common_functions.php');
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['username'])) {
    if (isset($_POST['addorder'])) {
        global $conn;
        $c_id = $_SESSION['cid'];
        $select_products_query = "SELECT * FROM cart INNER JOIN product ON product.p_id = cart.p_id INNER JOIN customer ON customer.c_id = cart.c_id WHERE cart.c_id = $c_id;";
        $result_products_query = mysqli_query($conn, $select_products_query);
        $result_products_query_2 = mysqli_query($conn, $select_products_query);
        $totalPrice = 0;
        $items = 0;

        while ($cartData = mysqli_fetch_assoc($result_products_query)) {
            $p_id = $cartData['p_id'];
            $price = $cartData['p_price'];
            $qty = $cartData['buy_qty'];
            $totalPrice = $totalPrice + ($price * $qty);
        }
        $trans_id = $_POST['tid'];
        $insert_payment_query= "insert into `payment` (c_id,pt_total,txn_id) values ($c_id,$totalPrice,'$trans_id');";
        mysqli_query($conn,$insert_payment_query);
        
        $last_insert_id_pt = mysqli_insert_id($conn);

        $insert_order_query= "insert into `orders` (c_id,od_price,od_date) values ($c_id,$totalPrice,CURRENT_DATE);";
        mysqli_query($conn,$insert_order_query);

        $last_insert_id_od = mysqli_insert_id($conn);

        $insert_order_pt_query = "insert into `orderpayment` (od_id,pt_id) values ($last_insert_id_od,$last_insert_id_pt);";
        mysqli_query($conn,$insert_order_pt_query);

            $insert_customerproduct_query = "INSERT INTO customerproduct (c_id, p_id, buy_qty, od_id)
SELECT c_id, p_id, buy_qty, $last_insert_id_od AS od_id
FROM cart;";
            mysqli_query($conn,$insert_customerproduct_query);

        $delete_cart_query = "DELETE FROM cart
        WHERE c_id = $c_id;";
        mysqli_query($conn,$delete_cart_query);

        echo "<script>alert('Order Placed')</script>";
        echo "<script>location.href='./index.php';</script>";
    }
}
?>



<!-- SELECT orders.od_id,orders.od_date,product.p_pic,product.p_name,customerproduct.buy_qty,product.p_price,payment.txn_id
FROM customerproduct
INNER JOIN product ON Product.p_id = customerproduct.p_id
INNER JOIN customer ON customer.c_id = customerproduct.c_id
INNER JOIN payment ON payment.c_id = customerproduct.c_id
INNER JOIN orderpayment ON orderpayment.pt_id = payment.pt_id
INNER JOIN orders ON orders.od_id = orderpayment.od_id
WHERE customerproduct.c_id=5; -->