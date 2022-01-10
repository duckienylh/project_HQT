<?php
include 'config.php';
    $id = $_GET['id'];
   
    $sql = "DELETE FROM taikhoan WHERE  `TEN_TK` = '$id'" ;
    
    $result = mysqli_query($conn,$sql);
    if($result>0){
        header("Location:taikhoan.php");
    }else{
        echo 'Lỗi';
    }
    mysqli_close($conn);
?>