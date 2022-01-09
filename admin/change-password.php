<?php
session_start();
if (!isset($_SESSION['current_user'])) {
    header("location:./index.php");
}
$client_user = $_SESSION['current_user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Quản lý học sinh THPT</title>
</head>
<style>
    .gradient-custom-3 {
        /* fallback for old browsers */
        background: #84fab0;
        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
    }

    .gradient-custom-4 {
        /* fallback for old browsers */
        background: #84fab0;
        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
    }
</style>

<body>
    <section class="vh-100 bg-image" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/search-box/img4.jpg');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Xin chào <?php echo  $client_user['TEN_TK']; ?></h2>
                                <h3 class="text-center"> Nhập đầy đủ thông tin để đổi mật khẩu</h3>
                                <form method="POST">
                                    <div class="form-outline mb-4">
                                        <input type="hidden" id="userid" class="form-control form-control-lg" name="userid" value="<?php echo $client_user['TEN_TK'] ?>">
                                        <input type="password" id="oldpass" class="form-control form-control-lg" name="oldpass">
                                        <label class="form-label">Mật khẩu cũ</label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" id="newpass" class="form-control form-control-lg" name="newpass">
                                        <label class="form-label">Mật khẩu mới</label>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-success btn-block btn-lg gradient-custom-4 me-3 text-body" href="index.php">Quay lại</a>
                                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body " name="btnchange">Thay đổi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</body>
<!-- process change password -->
<?php

if (isset($_POST['btnchange'])) {
    include 'config.php';
    $userid = $_POST['userid'];
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $pass_hash = password_hash($oldpass, PASSWORD_DEFAULT);
    $pass_hash2 = password_hash($newpass, PASSWORD_DEFAULT);

    if ($oldpass == '' || $newpass == '') {
?>
        <script>
            alert('Nhập đủ thông tin');
        </script>
        <?php
    } else {
        $sql2 = "SELECT * FROM users WHERE user_id ='$userid'  ";
        $resultcheck = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($resultcheck) > 0) {
            $row = mysqli_fetch_assoc($resultcheck);
            $pass_hashed = $row['user_password'];
            if (password_verify($oldpass, $pass_hashed)) {
                $sql =  "UPDATE `users` SET `user_password`='$pass_hash2' WHERE `user_id` = '$userid' ";
                $result = mysqli_query($conn, $sql);
                ?>
                <script>
                    window.location.href = 'index.php';
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert('Sai mật khẩu cũ');
                </script>
<?php
            }
            mysqli_close($conn);
        }
    }
}


?>

</html>