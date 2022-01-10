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
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm nhân viên</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST">
                                        <div class="modal-body">

                                            <div class="mb-3">
                                                <label for="nvid" class="form-label">Mã nhân viên</label>
                                                <input type="text" class="form-control" name="nvid" id="nvid" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="nvname" class="form-label">Tên nhân viên</label>
                                                <input type="text" class="form-control" name="nvname" id="nvname" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="nvgender" class="form-label">Giới tính</label>
                                                <input type="text" class="form-control" name="nvgender" id="nvgender" >
                                            </div>

                                            <div class="mb-3">
                                                <label for="nvbirth" class="form-label">Ngày sinh</label>
                                                <input type="date" class="form-control" name="nvbirth" id="nvbirth" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="nvstart" class="form-label">Ngày Bắt Đầu</label>
                                                <input type="date" class="form-control" name="nvstart" id="nvstart" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="nvaddress" class="form-label">Địa chỉ</label>
                                                <input type="text" class="form-control" name="nvaddress" id="nvaddress" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="nvphone" class="form-label">Số điện thoại</label>
                                                <input type="text" class="form-control" name="nvphone" id="nvphone" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="nvmail" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="nvmail" id="nvmail" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="nvgrade" class="form-label">Chức Vụ</label>
                                                <input type="email" class="form-control" name="nvgrade" id="nvgrade" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="nvsalary" class="form-label">Lương</label>
                                                <input type="text" class="form-control" name="nvsalary" id="nvsalary" >
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            <!-- <button type="button" class="btn btn-primary btn-them" name="btnSave">Thêm</button> -->
                                            <button type="submit" class="btn btn-primary" name="btnSave" >Thêm</button>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="modal modal-sc" tabindex="-1">
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
                        </div> -->


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
                                        <a class="btn btn-warning" href="sua_nhanvien.php?id=<?php echo  $row['MANV'] ?>"><i class="fas fa-user-edit"></i></a>
                                        <a type="submit" class="btn btn-danger btn-mydel" href="process_del_nv.php?id=<?php echo  $row['MANV'] ?>"><i class="fas fa-user-slash"></i></a>
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
    $nvid = $_POST['nvid'];
    $nvname = $_POST['nvname'];
    $nvgender = $_POST['nvgender'];
    $nvbirth = $_POST['nvbirth'];
    $nvstart = $_POST['nvstart'];
    $nvaddress = $_POST['nvaddress'];
    $nvphone = $_POST['nvphone'];
    $nvsalary = $_POST['nvsalary'];
    $nvgrade = $_POST['nvgrade'];
    $nvmail = $_POST['nvmail'];
    $sql2 = "INSERT INTO `nhanvien`(`MANV`, `TENNV`, `GIOITINH`, `NGAYSINH` , `NGAYBD`, `DIACHINV`, `SDTNV`, `LUONG`,`CHUCVU` ,`EMAIL`)
    VALUES ('$nvid','$nvname','$nvgender','$nvbirth','$nvstart','$nvaddress','$nvphone','$nvsalary','$nvgrade','$nvmail') ";

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