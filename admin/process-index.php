<?php

session_start();
include 'config.php';
$username = $_POST['userName'];
$password = $_POST['password'];

$sql = "SELECT * FROM taikhoan WHERE ten_tk = '$username'"; //câu lệnh sql kiểm tra người dùng tồn tại hay ko
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) > 0) { // vòng if kiểm tra câu lệnh truy vấn
    // $password_hash = $user['user_password']; // lấy password hash ở trên db
    // if (password_verify($password, $password_hash)) { // kiểm tra password nhập vào từ form so với mật khẩu đã lấy trên db

        
        if ($user['MATKHAU'] == $password) { // Kiểm tra tài khoản xác thực
            $_SESSION['current_user'] = $user;
            if($user['level_TK'] == 0){
                echo json_encode(array(
                    'status' => 1,
                    'level' => 0,
                    'message' => 'Đăng nhập thành công'
                ));    
            }
            else if($user['level_TK'] == 1){
                echo json_encode(array(
                    'status' => 1,
                    'level' => 1,
                    'message' => 'Đăng nhập thành công'
                ));
            }
          
            exit;
        } else {
            echo json_encode(array(
                'status' => 0,
                'message' => 'Sai mật khẩu'
            ));
        // }
    }
} else {
    echo json_encode(array(
        'status' => 0,
        'message' => 'Người dùng không tồn tại'
    ));
    exit;
}

mysqli_close($conn); 