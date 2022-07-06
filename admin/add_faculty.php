<?php
require_once './inc/test.php';
require_once './inc/config.php';
 session_start();
    if (isset($_SESSION['user_name']) && $_SESSION['user_name'] != NULL ) {

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            if (empty($_POST['makhoa']) || empty($_POST['tenkhoa']) || empty($_POST['ngaythanhlap']) || empty($_POST['mota'])) {
                echo "<script>alert('không được bỏ trống dữ liệu khi thêm!!!')</script>";
            }else{

                $ma = test_input($_POST['makhoa'])  ;
                $ten = test_input($_POST['tenkhoa'])  ;
                $ngay = test_input($_POST['ngaythanhlap'])  ;
                $desc = test_input($_POST['mota'])  ;

                $sql = "insert into faculty(faculty_code,faculty_name,faculty_date,faculty_desc) values('$ma','$ten','$ngay','$desc')";
                $result = mysqli_query($conn,$sql);
                if ($result) {
                    echo "<script>alert('Thêm khoa thành công!!!')</script>";
                }else{
                    echo "<script>alert('Thêm khoa thất bại!!!')</script>";
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

    <title>quản lí đồ án  - Thêm mới</title>

   
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

     
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

   
    <div id="wrapper">

     
        <?php require_once './inc/aside.php';   ?>
        

        
        <div id="content-wrapper" class="d-flex flex-column">

            
            <div id="content">

            <?php require_once '../admin/inc/nav.php';   ?>
            <div class="container-fluid">
                <form method="POST" action="add_faculty.php">
                <div class="form-group col-lg-6">
                    <label for="exampleInputEmail1">mã khoa:</label>
                    <input name="makhoa" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nhập mã khoa...">
                   
                </div>
                <div class="form-group col-lg-6">
                    <label for="exampleInputPassword1">Tên khoa:</label>
                    <input name="tenkhoa" type="text" class="form-control" id="exampleInputPassword1" placeholder="nhập tên khoa...">
                </div>
                <div class="form-group col-lg-6">
                    <label for="exampleInputPassword1">Ngày thành lập:</label>
                    <input name="ngaythanhlap" type="date" class="form-control" id="exampleInputPassword1" placeholder="nhập tên khoa...">
                </div>
                <div class="form-group col-lg-12">
                    <label for="exampleInputPassword1">Mô tả:</label><br>
                    <textarea style="width: 100%" name="mota"   cols="30" rows="10"></textarea>
                </div>
                <button name="submit"  type="submit" class="btn btn-primary">Thêm mới</button>
                </form>
                </div>
                        </div>
           
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
           

        </div>
     

    </div>
    
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

     

 
     <?php require_once './inc/lib.php';  ?>

</body>

</html>

        <?php
    }else{
        header('location:login.php');
    }


?>
 