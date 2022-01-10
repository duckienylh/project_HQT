<?php
include 'headerad.php';
?>
<main>
    <div class="height-100 bg-light">
        <div class="col py-3  ">
            <div class="container-fluid ">
                <div class="row mt-3 pt-3 border-bottom border-dark">
                    <div class="col-md-6">
                        <h2>Danh sách khách hàng</h2>
                    </div>
                </div>

            </div>
            <div class="container-fluid py-3" style="width:100% ; overflow: auto; height: auto;">
                <div class="row">
                    <div class="py-2">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-md btn-outline-light float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-user-plus"></i> Thêm khách hàng
                        </button>


                        <!-- Modal -->
                        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm khách hàng</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST">
                                        <div class="modal-body">

                                            <div class="mb-3">
                                                <label for="khid" class="form-label">Mã khách hàng</label>
                                                <input type="text" class="form-control" name="khid" id="khid" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="khname" class="form-label">Tên khách hàng</label>
                                                <input type="text" class="form-control" name="khname" id="khname" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="khaddress" class="form-label">Địa chỉ</label>
                                                <input type="text" class="form-control" name="khaddress" id="khaddress" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="khphone" class="form-label">Số điện thoại</label>
                                                <input type="text" class="form-control" name="khphone" id="khphone" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="khmail" class="form-label">Email</label>
                                                <input type="text" class="form-control" name="khmail" id="khmail" >
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            <!-- <button type="button" class="btn btn-primary btn-them" name="btnSave">Thêm</button> -->
                                            <button type="submit" class="btn btn-primary" name="btnSave">Thêm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="modal modal-sc" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Thêm khách hàng</h5>

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
                            <th scope="col">Mã khách hàng</th>
                            <th scope="col">Tên khách hàng</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Email</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include 'config.php';
                        $sql = "SELECT `MAKH`, `TENKH`, `DIACHI`, `SDTKH`, `EMAIL` FROM `khachhang`";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $row['MAKH']; ?> </th>
                                    <td><?php echo $row['TENKH']; ?></td>
                                    <td><?php echo $row['DIACHI']; ?></td>
                                    <td><?php echo $row['SDTKH']; ?></td>
                                    <td><?php echo $row['EMAIL']; ?></td>
                                    <td>
                                        <a class="btn btn-warning" href="sua_khachhang.php?id=<?php echo  $row['MAKH'] ?>"><i class="fas fa-user-edit"></i></a>
                                        <a type="submit" class="btn btn-danger btn-mydel" href="process_del_kh.php?id=<?php echo  $row['MAKH'] ?>"><i class="fas fa-user-slash"></i></a>
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
    $khid = $_POST['khid'];
    $khname = $_POST['khname'];
    $khaddress = $_POST['khaddress'];
    $khphone = $_POST['khphone'];
    $khmail = $_POST['khmail'];
    $sql2 = "INSERT INTO `khachhang`(`MAKH`, `TENKH`, `DIACHI`, `SDTKH`, `EMAIL`) 
    VALUES ('$khid','$khname','$khaddress','$khphone','$khmail') ";

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