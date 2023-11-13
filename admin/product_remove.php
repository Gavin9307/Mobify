<?php
    include('../includes/connect.php');
    if($_GET['removeItem']){
        global $conn;
        $p_id = $_GET['removeItem'];
        $delete_query = "DELETE FROM `product` WHERE p_id=$p_id;";
        mysqli_query($conn,$delete_query);
        echo "<script>location.href='index.php?view_product';</script>";
    }
?>