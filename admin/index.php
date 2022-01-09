<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Quản lý điện thoại TTNM</title>
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
    <?php
    session_start(); // bắt đầu cho người đăng nhập
    if (empty($_SESSION['current_user'])) {
    ?>
        <section class="vh-100 bg-image" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/search-box/img4.jpg');">
            <div class="mask d-flex align-items-center h-100 gradient-custom-3">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="card" style="border-radius: 15px;">
                                <div class="card-body p-5">
                                    <h2 class="text-uppercase text-center mb-5">account login</h2>
                                    <form id="login-form">
                                        <div class="form-outline mb-4">
                                            <label class="form-label">user name</label>
                                            <input type="text" id="userName" class="form-control form-control-lg" name="userName">
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label ">password</label>
                                            <input type="password" id="password" class="form-control form-control-lg" name="password">
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body btn-login" name="btnlogin" >login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    } else{
        $client_user = $_SESSION['current_user'];
        if($client_user['level_TK'] == 0){
            header('location:dashboard.php');
        }
        if($client_user['level_TK'] == 1){
            header('location:dashboard.php');
        } 
}
    
 
    ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</body>
<!-- process login -->
<script>
    $("#login-form").submit(function(event) {
        
        event.preventDefault();
        
        $.ajax({
            type: "POST",
            url: 'process-index.php',
            data: $(this).serializeArray(),
            success: function(response) {
                
                response = JSON.parse(response);
                
                if (response.status == 0) { // đăng nhập thất bại
                    alert(response.message);
                } else { // đăng nhập thành công
                    // alert(response.message);
                    // if(response.level == 0){// phân quyền đăng nhập
                    //     window.location.href = 'admin/dashboard.php';
                        
                    // } else if(response.level == 1){
                    //     window.location.href = 'teacher/list-teacher.php';
                        
                    // } else if(response.level == 2){
                    //     window.location.href = 'student/student-index.php';
                        
                    // }
                    location.reload();
                    
                }
            }
        })
    });
</script>

</html>
