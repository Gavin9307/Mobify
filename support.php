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
    if(isset($_GET['add_to_cart'])){
        cartFunction();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include("head.php");
    ?>
    <title>Mobify - Support</title>
</head>

<body class="bg-body-tertiary">
    <div class="container-fluid p-0 ">

        <?php 
            include("header.php");
        ?>

        <?php
        include("sub_header.php");
        ?>

        <div class="container-fluid bg-success d-flex justify-content-center ">
            <hr>
            <h2 class="text-light">Support</h2>
            <hr>
            
        </div>

        <section class=" h-custom " style="background-color: #ffffff;">
            <div class="container py-5 h-100">
                    <div class="col-12">
                    <a class="nav nav-item text-decoration-none text-muted mb-2" href="#" onclick="history.back();">
                    <i class="bi bi-arrow-left-square me-2"></i>Go back
                </a>
                        <div class="card card-registration card-registration-2 d-flex align-items-center justify-content-center" style="border-radius: 15px;min-height:650px;">
                                <div class="d-flex flex-column gap-4" style="margin-top:-200px;">
                                    <h1 class="text-success">Contact Information</h1>
                                    <h3><i class="bi bi-telephone text-success"></i> <a class="ms-4" style="color: black;text-decoration: none;"  href="tel:+919307325976">9307325976</a></h3>
                                    <h3><i class="bi bi-envelope-at  text-success"></i><a class="ms-4" style="color: black;text-decoration: none;"  href="mailto:gavindacosta9307@gmail.com">gavindacosta9307@gmail.com</a></h3>
                                    <h3></h3>
                                    <h3></h3>
                                </div>
                        </div>
                    </div>
            </div>
        </section>
       
        <!-- <div class="container" style="min-height:750px">
        <div class="">
        <div class="row my-4">
                <a class="nav nav-item text-decoration-none text-muted mb-2" href="#" onclick="history.back();">
                    <i class="bi bi-arrow-left-square me-2"></i>Go back
                </a>
            </div>
        </div>
            
        </div> -->

        <?php 
        include('./footer.php');
    ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>