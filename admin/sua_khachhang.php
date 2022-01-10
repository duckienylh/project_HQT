<?php
include 'headerad.php';
include 'config.php';
$id = $_GET['id']
?>
<main>
    <?php
    $sql = "SELECT * FROM `khachhang` WHERE khachhang.MAKH = '$id' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $khname = $row['TENKH'];
        $khdiachi = $row['DIACHI'];
        $sdtkh = $row['SDTKH'];
        $emailkh = $row['EMAIL'];
    }
    ?>
    <div class="height-100 bg-light">
        <div class="col py-3  ">
            <div class="container ">
                <div class="row mt-3 pt-3  border-bottom border-light">
                    <div class="col-md-6">
                        <h2>Sửa Thông Tin Khách Hàng </h2>
                    </div>
                </div>

            </div>
            <div class="container-fluid py-3" style="width:100% ; overflow: auto; height: auto;">
                <form method="POST">
                    <div class="row">
                        <div class="mb-3">
                            <h4 for="manv" class="form-label">Mã Khách Hàng: <?php echo $id ?> </h4>
                            <input type="hidden" class="form-control" disabled name="manv" id="manv" value="<?php echo $id ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="khname" class="form-label">Tên Nhân Viên</label>
                                <input type="text" class="form-control" name="khname" id="khname" value="<?php echo $khname ?>">
                            </div>
                            <div class="mb-3">
                                <label for="khdiachi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" name="khdiachi" id="khdiachi" value="<?php echo $khdiachi ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="sdtkh" class="form-label">Số Điện Thoại</label>
                                <input type="tel" class="form-control" name="sdtkh" id="sdtkh" value="<?php echo $sdtkh ?>">
                            </div>
                            <div class="mb-3">
                                <label for="emailkh" class="form-label">Email</label>
                                <input type="email" class="form-control" name="emailkh" id="emailkh" value="<?php echo $emailkh ?>">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-success huy" onclick="huy()" href="khachhang.php" >Hủy</a>
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
    $khname = $_POST['khname'];
    $khdiachi = $_POST['khdiachi'];
    $sdtkh = $_POST['sdtkh'];
    $emailkh = $_POST['emailkh'];
    $sql2 = "UPDATE `khachhang` SET `TENKH`='$khname',`DIACHI`='$khdiachi',
    `SDTKH`='$sdtkh',`EMAIL`='$emailkh' WHERE MAKH = '$id' ";

    $result = mysqli_query($conn, $sql2);

    if ($result > 0) {
?>
        <script>
            window.location.href = 'khachhang.php';
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