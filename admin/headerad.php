<?php
session_start();
if (!isset($_SESSION['current_user'])) {
    header("location:./index.php");
}
$client_user = $_SESSION['current_user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../asset/css/style.css">
    <title>Quản Lý điện thoại TTNM</title>
</head>

<div id="contents">
<body id="body-pd" class="bg-light">
    <header class="header border-bottom border-2" style="border-color: #e35d6a !important;" id="header">
        <div class="header_toggle "> <i class="fas fa-bars " style="color: #e35d6a;" id="header-toggle"></i> </div>
        
    </header>
    
    <div class="l-navbar" id="nav-bar" style="background-color: #e35d6a;">
        <nav class="nav">
            <div>
                <span class=" nav_logo nav_logo-name"></span>
                <div class="nav_list">
                    <a href="./dashboard.php" class="nav_link" id="hddashboard">
                        <i class="fas fa-chart-line nav_icon"></i>
                        <span class="nav_name">Bảng điều khiển</span>
                    </a>
                    <a href="./nhanvien.php" class="nav_link" id="hdnhanvien">
                        <i class="fas fa-address-card nav_icon"></i>
                        <span class="nav_name">nhân viên</span>
                    </a>
                    <a href="./sanpham.php" class="nav_link" id="hdsanpham">
                        <i class="fas fa-mobile-alt nav_icon ms-1"></i>
                        <span class="nav_name ms-1">sản phẩm</span>
                    </a>
                    <a href="./taikhoan.php" class="nav_link" id="hdtaikhoan">
                        <i class="fas fa-users nav_icon"></i>
                        <span class="nav_name">tài khoản</span>
                    </a>
                    <a href="./donban.php" class="nav_link" id="hddonban">
                        <i class="fas fa-cart-plus nav_icon"></i>
                        <span class="nav_name">đơn bán</span>
                    </a>
                    <a href="./khachhang.php" class="nav_link" id="hdkhachhang">
                        <i class="fas fa-address-book nav_icon"></i>
                        <span class="nav_name">khách hàng</span>
                    </a>
                </div>
            </div>
            <!-- <a href="#" class="nav_link"> <span class="nav_name">SignOut</span> </a> -->
            <div class="dropdown pb-4 ps-3">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://avatars.githubusercontent.com/u/90234391?s=48&v=4" alt="hugenerd" class=" header_img rounded-circle">
                    <span class="d-none d-sm-inline mx-1 text-dark"> <?php echo $client_user['TEN_TK']; ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-light text-small shadow">
                    <li><a class="dropdown-item" href="./change-password.php"><span class="nav_name"><i class="fas fa-lock me-3"></i> Đổi mật khẩu</span></a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="./logout.php"><i class="fas fa-sign-out-alt me-3"></i> Thoát</a></li>
                </ul>
            </div>
        </nav>

    </div>