<?php
include 'config.php';
    $id = $_GET['id'];
    $mahd = "SELECT `MAHD` FROM `hoadon` WHERE `MAKH` = '$id'";
    $result = mysqli_query($conn,$mahd);
    $sql = "DELETE FROM chitiethoadon WHERE  `MAHD` = '$mahd'" ;
    $sql1 = "DELETE FROM hoadon WHERE  `MAKH` = '$id'" ;
    $sql2 = "DELETE FROM khachhang WHERE  `MAKH` = '$id'" ;
    $result1 = mysqli_query($conn,$sql);
    $result2 = mysqli_query($conn,$sql1);
    $result3 = mysqli_query($conn,$sql2);
    if($result3>0){
        header("Location:khachhang.php");
    }else{
        echo 'Lỗi';
        echo $id;
    }
    mysqli_close($conn);
?>