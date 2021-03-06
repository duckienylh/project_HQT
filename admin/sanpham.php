<?php
include 'headerad.php';
?>
<main>
    <div class="height-100 bg-light">
        <div class="col py-3  ">
            <div class="container-fluid ">
                <div class="row mt-3 pt-3 border-bottom border-dark">
                    <div class="col-md-6">
                        <h2>Danh sách sản phẩm</h2>
                    </div>
                </div>


            </div>
            <div class="container-fluid py-3" style="width:100% ; overflow: auto; height: auto;">
                <div class="row">
                    <div class="py-2">
                        <button type="button" class="btn btn-primary btn-md btn-outline-light float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-user-plus"></i> Thêm sản phẩm
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST">
                                        <div class="modal-body">

                                            <div class="mb-3">
                                                <label for="spid" class="form-label">Mã sản phẩm</label>
                                                <input type="text" class="form-control" name="spid" id="spid" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="spnameid" class="form-label">Mã Loại sản phẩm</label>
                                                <input type="text" class="form-control" name="spnameid" id="spnameid" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="spname" class="form-label">Tên sản phẩm</label>
                                                <input type="text" class="form-control" name="spname" id="spname" >
                                            </div>

                                            <div class="mb-3">
                                                <label for="price" class="form-label">Giá bán</label>
                                                <input type="text" class="form-control" name="price" id="price" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="gianhap" class="form-label">Giá nhập</label>
                                                <input type="text" class="form-control" name="gianhap" id="gianhap" >
                                            </div>

                                            <div class="mb-3">
                                                <label for="describe" class="form-label">Mô tả</label>
                                                <input type="text" class="form-control" name="describe" id="describe" >
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-primary " name="btnSave">Thêm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="modal modal-sc" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Thêm sản phẩm</h5>

                            </div>
                            <div class="modal-body d-flex">
                                <i class="fas fa-check text-success fs-1 me-3"></i>
                                <p class="align-middle w-100"> Bạn đã thêm thành công</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn_close">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div> -->

                <table class="table table-hover table-striped " id="example">
                    <thead>
                        <tr class="table-info">
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá bán</th>
                            <th scope="col">Giá nhập</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'config.php';
                        $sql = "SELECT `MADT`, `TENDT`, `SOLUONGTON`, `GIABAN`, `GIANHAP`, `MOTA` FROM `dienthoai`";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $row['MADT']; ?> </th>
                                    <td><?php echo $row['TENDT']; ?></td>
                                    <td><?php echo $row['SOLUONGTON']; ?></td>
                                    <td><?php echo $row['GIABAN']; ?></td>
                                    <td><?php echo $row['GIANHAP']; ?></td>
                                    <td><?php echo $row['MOTA']; ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="sua_sanpham.php?id=<?php echo  $row['MADT'] ?>"><i class="fas fa-user-edit"></i></a>
                                        <a type="submit" class="btn btn-danger btn-mydel" href="process_del_sp.php?id=<?php echo  $row['MADT'] ?>"><i class="fas fa-user-slash"></i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<?php
if (isset($_POST['btnSave'])) {
    $spid = $_POST['spid'];
    $spnameid = $_POST['spnameid'];
    $spname = $_POST['spname'];
    $price = $_POST['price'];
    $gianhap = $_POST['gianhap'];
    $describe = $_POST['describe'];
    $sql2 = "INSERT INTO `dienthoai`(`MADT`, `MALOAIDT`, `TENDT`, `GIABAN`, `GIANHAP`, `MOTA`) 
    VALUES ('$spid','$spnameid','$spname','$price','$gianhap','$describe') ";

    $result = mysqli_query($conn, $sql2);

    if ($result > 0) {
?>
        <script>
            location.reload();
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