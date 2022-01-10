<?php
include 'headerad.php';
include 'config.php';
$id = $_GET['id']
?>
<main>
    <?php
    $sql = "SELECT * FROM `dienthoai` WHERE dienthoai.MADT = '$id' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $dtname = $row['TENDT'];
        $slton = $row['SOLUONGTON'];
        $giaban = $row['GIABAN'];
        $gianhap = $row['GIANHAP'];
        $mota = $row['MOTA'];
    }
    ?>
    <div class="height-100 bg-light">
        <div class="col py-3  ">
            <div class="container ">
                <div class="row mt-3 pt-3  border-bottom border-light">
                    <div class="col-md-6">
                        <h2>Sửa Thông Tin Điện Thoại </h2>
                    </div>
                </div>
            </div>
            <div class="container-fluid py-3" style="width:100% ; overflow: auto; height: auto;">
                <form method="POST">
                    <div class="row">
                        <div class="mb-3">
                            <h4 for="masp" class="form-label">Mã Điện Thoại: <?php echo $id ?> </h4>
                            <input type="hidden" class="form-control" disabled name="masp" id="masp" value="<?php echo $id ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="dtname" class="form-label">Tên Điện Thoại</label>
                                <input type="text" class="form-control" name="dtname" id="dtname" value="<?php echo $dtname ?>">
                            </div>
                            <div class="mb-3">
                                <label for="slton" class="form-label">Số Lượng Tồn</label>
                                <input type="text" class="form-control" name="slton" id="slton" value="<?php echo $slton ?>">
                            </div>
                            <div class="mb-3">
                                <label for="giaban" class="form-label">Giá Bán</label>
                                <input type="text" class="form-control" name="giaban" id="giaban" value="<?php echo $giaban ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="gianhap" class="form-label">Giá Nhập</label>
                                <input type="text" class="form-control" name="gianhap" id="gianhap" value="<?php echo $gianhap ?>">
                            </div>
                            <div class="mb-3">
                                <label for="mota" class="form-label">Mô Tả</label>
                                <input type="text" class="form-control" name="mota" id="mota" value="<?php echo $mota ?>">
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-success huy" onclick="huy()" href="sanpham.php" >Hủy</a>
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
    $dtname = $_POST['dtname'];
    $slton = $_POST['slton'];
    $giaban = $_POST['giaban'];
    $gianhap = $_POST['gianhap'];
    $mota = $_POST['mota'];
    $sql2 = "UPDATE `dienthoai` SET `TENDT`='$dtname',`SOLUONGTON`='$slton',
    `GIABAN`='$giaban',`GIANHAP`='$gianhap',`MOTA`='$mota' WHERE MADT = '$id' ";

    $result = mysqli_query($conn, $sql2);

    if ($result > 0) {
?>
        <script>
            window.location.href = 'sanpham.php';
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