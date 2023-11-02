<?php
    $conn=mysqli_connect('localhost','root','','mobify');
    if(!$conn){
        die(mysqli_error($conn));
    }
?>