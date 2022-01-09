<?php
include 'headerad.php';
?>
<main>
    <div class="height-100 bg-light">
        <div class="col py-3  ">
            <div class="container-fluid ">
                <div class="row mt-3 pt-3 border-bottom border-dark">
                    <div class="col-md-6">
                        <h2>Danh sách nhân viên</h2>
                    </div>
                </div>

            </div>
            <div class="container-fluid py-3" style="width:100% ; overflow: auto; height: auto;">
                <div class="row">
                    <div class="py-2">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-md btn-outline-light float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-user-plus"></i> Thêm nhân viên
                        </button>


                        <!-- Modal -->
                        <div class="modal fade modal-them" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm nhân viên</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST">
                                        <div class="modal-body">

                                            <div class="mb-3">
                                                <label for="classid" class="form-label">Mã nhân viên</label>
                                                <input type="text" class="form-control" name="classid" id="classid" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="classname" class="form-label">Tên nhân viên</label>
                                                <input type="text" class="form-control" name="classname" id="classname" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="teachid" class="form-label">Giới tính</label>
                                                <input type="text" class="form-control" name="teachid" id="teachid" >
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Ngày sinh</label>
                                                <input type="text" class="form-control" name="" >
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Địa chỉ</label>
                                                <input type="text" class="form-control" name="" >
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Số điện thoại</label>
                                                <input type="text" class="form-control" name="" >
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Lương</label>
                                                <input type="text" class="form-control" name="" >
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            <!-- <button type="button" class="btn btn-primary btn-them" name="btnSave">Thêm</button> -->
                                            <button type="button" class="btn btn-primary btn-them" data-bs-dismiss="modal">Thêm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="modal modal-sc" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Thêm nhân viên</h5>

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
                        </div>


                    </div>
                </div>
                <table class="table table-hover table-striped" id="example">
                    <thead>
                        <tr class="table-info">
                            <th scope="col">Mã nhân viên</th>
                            <th scope="col">Tên nhân viên</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">SDT</th>
                            <th scope="col">Lương</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'config.php';
                        $sql = "SELECT `MANV`, `TENNV`, `GIOITINH`, `NGAYSINH`, `DIACHINV`, `SDTNV`, `LUONG` FROM `nhanvien`";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $row['MANV']; ?> </th>
                                    <td><?php echo $row['TENNV']; ?></td>
                                    <td><?php if( $row['GIOITINH'] == 1) echo "Nam";else echo "Nữ" ?></td>
                                    <td><?php echo $row['NGAYSINH']; ?></td>
                                    <td><?php echo $row['DIACHINV']; ?></td>
                                    <td><?php echo $row['SDTNV']; ?></td>
                                    <td><?php echo $row['LUONG']; ?></td>
                                    <!-- $nvgioitinh = ($row['GIOITINH'] == 1 ? "Nam" : "Nữ"); -->
                                    <td>
                                        <a class="btn btn-warning" href="edit-teacher.php?id=<?php echo  $row['MANV'] ?>"><i class="fas fa-user-edit"></i></a>
                                        <a type="submit" class="btn btn-danger btn-mydel" href="edit-teacher.php?id=<?php echo  $row['MANV'] ?>"><i class="fas fa-user-slash"></i></a>
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
    $classid = $_POST['classid'];
    $classname = $_POST['classname'];
    $teachid = $_POST['teachid'];
    $sql2 = "INSERT INTO `classes`(`class_id`, `class_name`, `teach_id`)
     VALUES ('$classid','$classname','$teachid') ";

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