<?php
include 'config.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM chitiethoadon WHERE  `MADT` = '$id'" ;
    $sql1 = "DELETE FROM dienthoai WHERE  `MADT` = '$id'" ;
    $result = mysqli_query($conn,$sql);
    $result1 = mysqli_query($conn,$sql1);
    if($result1>0){
        header("Location:sanpham.php");
    }else{
        echo 'Lỗi';
    }
    mysqli_close($conn);
?>