<?php
include 'config.php';
    $id = $_GET['id'];
    $mahd = "SELECT `MAHD` FROM `hoadon` WHERE `MAHD` = '$id'";
    $result = mysqli_query($conn,$mahd);
    $sql = "DELETE FROM chitiethoadon WHERE  `MAHD` = '$mahd'" ;
    $sql1 = "DELETE FROM hoadon WHERE  `MAHD` = '$id'" ;
    $result1 = mysqli_query($conn,$sql);
    $result2 = mysqli_query($conn,$sql1);

    if($result2>0){
        header("Location:donban.php");
    }else{
        echo 'Lỗi';
        echo $id;
    }
    mysqli_close($conn);
?>