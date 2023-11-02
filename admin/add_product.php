<?php
include('../includes/connect.php');
if (isset($_POST['add_product'])) {
    $mobile_name = $_POST['mname'];
    $mobile_desc = $_POST['mdesc'];
    $mobile_seller = $_POST['sid'];
    $mobile_brand = $_POST['bid'];
    $mobile_price = $_POST['mprice'];

    $mobile_pic = $_FILES['mimage']['name'];
    $temp_mobile_pic = $_FILES['mimage']['tmp_name'];

    if($mobile_name=='' or $mobile_desc=='' or $mobile_seller=='' or $mobile_brand=='' or $mobile_price=='' or $mobile_pic==''){
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    }
    else{
        move_uploaded_file($temp_mobile_pic,"../assets/Mobile_Images/$mobile_pic");
        
        $insert_query = "insert into `product` (p_name,p_price,p_desc,s_id,p_pic,b_id) values ('$mobile_name','$mobile_price','$mobile_desc',$mobile_seller,'$mobile_pic',$mobile_brand)";
        $result_query = mysqli_query($conn,$insert_query);
        if($result_query){
            echo "<script>alert('Mobile Added Successfully')</script>";
        }
    }

    echo "<script>location.href='./index.php?add_brand';</script>";
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <h3>Add Mobile</h3>
    <div class="mb-3">
        <label for="InputUMname1" class="form-label ">Mobile Name</label>
        <input type="text" class="form-control" id="InputMname1" name="mname" autocomplete="off" required>
    </div>

    <div class="mb-3">
        <label for="FormControlTextarea1" class="form-label">Mobile Description</label>
        <textarea class="form-control" id="FormControlTextarea1" rows="3" autocomplete="off" required name="mdesc"></textarea>
    </div>

    <div>
        <label for="sname" class="form-label">Enter Seller</label>
        <select class="form-select mb-3" id="sname" aria-label="Default select example" name="sid">
            <option selected></option>
            <?php
            include('../includes/connect.php');
            $select_query = "select * from `seller`;";
            $result_query = mysqli_query($conn, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $seller_id = $row['s_id'];
                $seller_name = $row['s_name'];
                echo "<option value='$seller_id'>$seller_name</option>";
            }
            ?>
        </select>
    </div>
    <div>
        <label for="bname" class="form-label">Enter Brand</label>
        <select class="form-select mb-3" id="bname" aria-label="Default select example" name="bid">
            <option selected></option>
            <?php
            include('../includes/connect.php');
            $select_query = "select * from `brand`;";
            $result_query = mysqli_query($conn, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $brand_id = $row['b_id'];
                $brand_name = $row['b_name'];
                echo "<option value='$brand_id'>$brand_name</option>";
            }
            ?>
        </select>
    </div>
    <label for="floatingInputGroup2" class="form-label">Mobile Price</label>
    <div class="input-group mb-3">
        <span class="input-group-text">&#8377;</span>
        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInputGroup2" placeholder="Price" name="mprice">
            <label for="floatingInputGroup2">Price</label>
        </div>
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Mobile Image</label>
        <input class="form-control" type="file" id="formFile" name="mimage">
    </div>

    <button type="submit" class="btn btn-success" name="add_product">Submit</button>
</form>