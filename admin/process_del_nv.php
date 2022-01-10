<?php
include 'config.php';
    $id = $_GET['id'];
    $mahd = "SELECT `MAHD` FROM `hoadon` WHERE `MANV` = '$id'";
    $result = mysqli_query($conn,$mahd);
    $sql = "DELETE FROM chitiethoadon WHERE  `MAHD` = '$mahd'" ;
    $sql1 = "DELETE FROM hoadon WHERE  `MANV` = '$id'" ;
    $sql2 = "DELETE FROM nhanvien WHERE  `MANV` = '$id'" ;
    $result1 = mysqli_query($conn,$sql);
    $result2 = mysqli_query($conn,$sql1);
    $result3 = mysqli_query($conn,$sql2);
    if($result3>0){
        header("Location:nhanvien.php");
    }else{
        echo 'Lỗi';
        echo $id;
    }
    mysqli_close($conn);
?>