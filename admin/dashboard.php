<?php
include 'headerad.php';
include './config.php';
?>
<main>
    <div class="height-100 bg-light">
        <div class="col py-3 ">
            <div class="container">
                <div class="row mt-3 pt-3 border-bottom border-light">
                    <h2>Bảng điều khiển</h2>
                </div>

                <div class="row mt-3 py-md-5  justify-content-around">
                    <div class="col-md-4 col-12 bg-info d-flex mb-2 rounded justify-content-center">
                        <div class="mt-3 mb-3" style="font-size: 1.875rem"><i class="fas fa-address-card"></i></div>
                        <div class="ps-3 my-3">
                            <p>Nhân viên</p>
                            <p class="text-center fw-bold fs-2">
                                <?php

                                $sql = "SELECT COUNT(manv) AS st_sum FROM nhanvien;";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <?php echo $row['st_sum']; ?>
                                <?php
                                    }
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 bg-info d-flex mb-2 rounded justify-content-center">
                        <div class="mt-3 mb-3" style="font-size: 1.875rem"><i class="fas fa-mobile-alt"></i></div>
                        <div class="ps-3 my-3">
                            <p>Điện thoại</p>
                            <p class="text-center fw-bold fs-2">
                                <?php

                                $sql = "SELECT COUNT(madt) AS st_sum FROM dienthoai;";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <?php echo $row['st_sum']; ?>
                                <?php
                                    }
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3 justify-content-around">
                    <div class="col-md-4 col-12 bg-info d-flex mb-2 rounded justify-content-center">
                        <div class="mt-3 mb-3" style="font-size: 1.875rem"><i class="fas fa-users"></i></div>
                        <div class="ps-3 my-3">
                            <p>tài khoản</p>
                            <p class="text-center fw-bold fs-2">
                                <?php

                                $sql = "SELECT COUNT(ten_tk) AS st_sum FROM taikhoan;";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <?php echo $row['st_sum']; ?>
                                <?php
                                    }
                                }
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 bg-info d-flex mb-2 rounded justify-content-center">
                        <div class="mt-3 mb-3" style="font-size: 1.875rem"><i class="fas fa-cart-plus"></i></div>
                        <div class="ps-3 my-3">
                            <p>Đơn bán</p>
                            <p class="text-center fw-bold fs-2">
                                <?php

                                $sql = "SELECT COUNT(mahd) AS st_sum FROM hoadon;";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <?php echo $row['st_sum']; ?>
                                <?php
                                    }
                                }
                                ?>
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</main>
<?php
include 'footerad.php';
?>