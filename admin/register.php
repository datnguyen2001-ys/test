<?php
 
  require_once './inc/config.php';
  
  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


 if(isset($_POST["submit"]) && $_SERVER['REQUEST_METHOD'] == 'POST')  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["re_password"]) || empty($_POST["email"]))  
      {  
           echo '<script>alert("Dữ liệu không được bỏ trống")</script>';  
      }  
      else  
      {  
        $username = test_input($_POST["username"]);
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);
        $re_password = test_input($_POST["re_password"]);


           $email = mysqli_real_escape_string($conn, $_POST["email"]);  
           $check = "select * from user where user_email = '$email'";
           $result1 = mysqli_query($conn,$check);

           if ( $result1->num_rows > 0) {
            echo '<script>alert("Email này đã tồn tại")</script>';  
           } else{
            $username = mysqli_real_escape_string($conn, $_POST["username"]);  
            $password = mysqli_real_escape_string($conn, $_POST["password"]);  
            $re_password = mysqli_real_escape_string($conn, $_POST["re_password"]); 
            $utype = 0;
            if ($password == $re_password) {
                 $password = password_hash($password, PASSWORD_DEFAULT);  
                 $query = "insert into user(user_name, user_email,user_password,utype) VALUES('$username', '$email','$password','$utype' )"; 
                 
                 if ($conn->query($query) === TRUE) {
                     echo '<script>alert("Thêm tài khoản thành công")</script>';  
                    
                   } else {
                     echo '<script>alert("Thêm tài khoản thất bại")</script>';
                   }
                   
                   $conn->close();
            }else{
 
             echo '<script>alert("mật khẩu đăng kí không khớp nhau")</script>';  
            
         }
           }
           
          
          
      }  
 } 


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản lí đồ án - Hactech</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div   class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản!</h1>
                            </div>
                            <form class="user" method="POST">
                                <div class="form-group ">
 
                                        <input type="text" name="username" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Tên người dùng...">
    
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Địa chỉ Email... ">
                                </div>
                               
                                 <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="re_password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                    <button type="submit"  class="btn btn-primary btn-user btn-block" name="submit">ĐĂNG KÝ</button>
                               
                             
                                <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->
                            </form>
                            <hr>
                           
                            <div class="text-center">
                                <a class="small" href="login.php">Đã có tài khoản? Đăng nhập ngay!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>