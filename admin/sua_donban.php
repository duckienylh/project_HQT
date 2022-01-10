<?php
include 'headerad.php';
include 'config.php';
$id = $_GET['id']
?>
<main>
    <?php
    $sql = "SELECT * FROM `nhanvien`,`hoadon`,`khachhang` WHERE nhanvien.MANV = hoadon.MANV and hoadon.MAKH = khachhang.MAKH and
    hoadon.MAHD = '$id' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $nvname = $row['TENNV'];
        $khname = $row['TENKH'];
        $tongtien = $row['TONGTIEN'];
        $dbngaytao = $row['NGAYTAO'];
    }
    ?>
    <div class="height-100 bg-light">
        <div class="col py-3  ">
            <div class="container ">
                <div class="row mt-3 pt-3  border-bottom border-light">
                    <div class="col-md-6">
                        <h2>Sửa Thông Tin Đơn Hàng </h2>
                    </div>
                </div>

            </div>
            <div class="container-fluid py-3" style="width:100% ; overflow: auto; height: auto;">
                <form method="POST">
                    <div class="row">
                        <div class="mb-3">
                            <h4 for="madb" class="form-label">Mã Đơn Hàng: <?php echo $id ?> </h4>
                            <input type="hidden" class="form-control" disabled name="madb" id="madb" value="<?php echo $id ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="nvname" class="form-label">Tên Nhân Viên</label>
                                <input type="text" class="form-control" name="nvname" id="nvname" value="<?php echo $nvname ?>">
                            </div>
                            <div class="mb-3">
                                <label for="khname" class="form-label">Tên Khách Hàng</label>
                                <input type="text" class="form-control" name="khname" id="khname" value="<?php echo $khname ?>">
                            </div>
                            
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="dbngaytao" class="form-label">Ngày Tạo</label>
                                <input type="date" class="form-control" name="dbngaytao" id="dbngaytao" value="<?php echo $dbngaytao ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tongtien" class="form-label">Tổng tiền</label>
                                <input type="text" class="form-control" name="tongtien" id="tongtien" value="<?php echo $tongtien ?>">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-success huy" onclick="huy()" href="donban.php">Hủy</a>
                        <script>
                            function huy() {
                                alert("Hủy sẽ mất những thông tin đã sửa")
                            }
                        </script>
                        <button type="submit" class="btn btn-primary" name="btnSave">Thay Đổi</button>
                    </div>

                </form>


            </div>
        </div>
    </div>

</main>

<?php
if (isset($_POST['btnSave'])) {
    $nvname = $_POST['nvname'];
    $khname = $_POST['khname'];
    $dbngaytao = $_POST['dbngaytao'];
    $tongtien = $_POST['tongtien'];
    $sql2 = "UPDATE `hoadon` SET `MANV`=(Select MANV from nhanvien where TENNV = '$nvname'),
    `MAKH`=(Select MAKH from khachhang where TENKH = '$khname'),
    `NGAYTAO`='$dbngaytao',`TONGTIEN`='$tongtien' WHERE MAHD = '$id' ";

    $result = mysqli_query($conn, $sql2);

    if ($result > 0) {
?>
        <script>
            window.location.href = 'donban.php';
        </script>
<?php
    } else {
        echo "Lỗi!";
    }

    mysqli_close($conn);
}

?>



<?php
include 'footerad.php';
?>