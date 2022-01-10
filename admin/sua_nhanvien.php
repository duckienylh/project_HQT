<?php
include 'headerad.php';
include 'config.php';
$id = $_GET['id']
?>
<main>
    <?php
    $sql = "SELECT * FROM `nhanvien` WHERE nhanvien.MANV = '$id' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $nvname = $row['TENNV'];
        $luongnv = $row['LUONG'];
        $sdtnv = $row['SDTNV'];
        $diachinv = $row['DIACHINV'];
        $nvgioitinh = ($row['GIOITINH'] == 1 ? "Nam" : "Nữ");
        $nvngaysinh = $row['NGAYSINH'];
    }
    ?>
    <div class="height-100 bg-light">
        <div class="col py-3  ">
            <div class="container ">
                <div class="row mt-3 pt-3  border-bottom border-light">
                    <div class="col-md-6">
                        <h2>Sửa Thông Tin Nhân Viên </h2>
                    </div>
                </div>

            </div>
            <div class="container-fluid py-3" style="width:100% ; overflow: auto; height: auto;">
                <form method="POST">
                    <div class="row">
                        <div class="mb-3">
                            <h4 for="manv" class="form-label">Mã Nhân Viên: <?php echo $id ?> </h4>
                            <input type="hidden" class="form-control" disabled name="manv" id="manv" value="<?php echo $id ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="nvname" class="form-label">Tên Nhân Viên</label>
                                <input type="text" class="form-control" name="nvname" id="nvname" value="<?php echo $nvname ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nvgioitinh" class="form-label">Giới Tính</label>
                                <input type="text" class="form-control" name="nvgioitinh" id="nvgioitinh" value="<?php echo $nvgioitinh ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nvngaysinh" class="form-label">Ngày Sinh</label>
                                <input type="date" class="form-control" name="nvngaysinh" id="nvngaysinh" value="<?php echo $nvngaysinh ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="diachinv" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" name="diachinv" id="diachinv" value="<?php echo $diachinv ?>">
                            </div>
                            <div class="mb-3">
                                <label for="sdtnv" class="form-label">Số Điện Thoại</label>
                                <input type="tel" class="form-control" name="sdtnv" id="sdtnv" value="<?php echo $sdtnv ?>">
                            </div>
                            <div class="mb-3">
                                <label for="luongnv" class="form-label">Lương</label>
                                <input type="text" class="form-control" name="luongnv" id="luongnv" value="<?php echo $luongnv ?>">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-success huy" onclick="huy()" href="nhanvien.php" >Hủy</a>
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
    $nvgioitinh = $_POST['nvgioitinh'];
    $nvngaysinh = $_POST['nvngaysinh'];
    $diachinv = $_POST['diachinv'];
    $sdtnv = $_POST['sdtnv'];
    $luongnv = $_POST['luongnv'];
    $sql2 = "UPDATE `nhanvien` SET `TENNV`='$nvname',`GIOITINH`='$nvgioitinh',
    `NGAYSINH`='$nvngaysinh',`DIACHINV`='$diachinv',`SDTNV`='$sdtnv',`LUONG`='$luongnv' WHERE MANV = '$id' ";

    $result = mysqli_query($conn, $sql2);

    if ($result > 0) {
?>
        <script>
            window.location.href = 'nhanvien.php';
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