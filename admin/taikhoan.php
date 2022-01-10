<?php
include 'headerad.php';
?>
<main>
    <div class="height-100 bg-light">
        <div class="col py-3  ">
            <div class="container-fluid ">
                <div class="row mt-3 pt-3 border-bottom border-dark">
                    <div class="col-md-6">
                        <h2>Danh sách tài khoản</h2>
                    </div>
                </div>


            </div>
            <div class="container-fluid py-3" style="width:100% ; overflow: auto; height: auto;">
                <div class="row">
                    <div class="py-2">
                        <button type="button" class="btn btn-primary btn-md btn-outline-light float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-user-plus"></i> Thêm tài khoản
                        </button>
                        <!-- Modal -->
                        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm tài khoản</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="tkname" class="form-label">Tên tài khoản</label>
                                                <input type="text" class="form-control" name="tkname" id="tkname" >
                                            </div>

                                            <div class="mb-3">
                                                <label for="nvid" class="form-label">Mã Nhân Viên</label>
                                                <input type="text" class="form-control" name="nvid" id="nvid" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="pass" class="form-label">Mật Khẩu</label>
                                                <input type="text" class="form-control" name="pass" id="pass" >
                                            </div>

                                            <div class="mb-3">
                                                <label for="level" class="form-label">level tài khoản</label>
                                                <input type="text" class="form-control" name="level" id="level" >
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
                                <h5 class="modal-title">Thêm tài khoản</h5>

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
                            <th scope="col">Tên tài khoản</th>
                            <th scope="col">Tên nhân viên</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'config.php';
                        $sql = "SELECT `TEN_TK`, taikhoan.MANV, `TENNV` , `NGAYTAO` FROM `taikhoan`,`nhanvien` where taikhoan.MANV = nhanvien.MANV ";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $row['TEN_TK']; ?> </th>
                                    <td><?php echo $row['TENNV']; ?></td>
                                    <td><?php echo $row['NGAYTAO']; ?></td>
                                    <td>
                                        
                                    <a type="submit" class="btn btn-danger btn-mydel" href="process_del_tk.php?id=<?php echo  $row['TEN_TK'] ?>"><i class="fas fa-user-slash"></i></a>
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
    $tkname = $_POST['tkname'];
    $nvid = $_POST['nvid'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];
   
    $sql2 = "INSERT INTO `taikhoan`(`TEN_TK`, `MANV`, `MATKHAU`, `level_TK`) 
    VALUES ('$tkname','$nvid','$pass','$level') ";

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