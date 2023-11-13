<?php
    include('../includes/connect.php');
    if(isset($_GET['removeItem'])){
        global $conn;
        $p_id = $_GET['removeItem'];
        $delete_query = "DELETE FROM `product` WHERE p_id=$p_id;";
        mysqli_query($conn,$delete_query);
        echo "<script>location.href='index.php?view_product';</script>";
    }
    if(isset($_GET['removeUser'])){
        global $conn;
        $c_id = $_GET['removeUser'];
        $delete_query = "DELETE FROM `customer` WHERE c_id=$c_id;";
        mysqli_query($conn,$delete_query);
        echo "<script>location.href='index.php?view_user';</script>";
    }
    if(isset($_GET['removeSeller'])){
        global $conn;
        $s_id = $_GET['removeSeller'];
        $delete_query = "DELETE FROM `seller` WHERE s_id=$s_id;";
        mysqli_query($conn,$delete_query);
        echo "<script>location.href='index.php?view_seller';</script>";
    }
    if(isset($_GET['removeBrand'])){
        global $conn;
        $b_id = $_GET['removeBrand'];
        $delete_query = "DELETE FROM `brand` WHERE b_id=$b_id;";
        mysqli_query($conn,$delete_query);
        echo "<script>location.href='index.php?view_brand';</script>";
    }
?>