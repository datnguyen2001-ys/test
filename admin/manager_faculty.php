<?php
 session_start();
    if (isset($_SESSION['user_name']) && $_SESSION['user_name'] != NULL ) {
        ?>
            <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
            <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div style="padding-left:20px;background: mediumslateblue;height: 50px;display: flex;align-items: center;" class="breadcrumb-text product-more">
                        <a style="color: white;text-decoration: none;" href="index.php"><i class="fa fa-home"></i> Trang chủ</a>  
                        <span style="padding-right: 15px;padding-left: 15px;color: black;" >Khoa</span>
                        <a style="color: white;text-decoration: none; " href="add_faculty.php">Thêm mới</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 20px" class="container-fluid">
        <div class="row"> 
            <div class="col-lg-12">
                        <table  class="table table-dark">
                            <thead>
                            <tr>
                                <th>Mã khoa</th>
                                <th>Tên khoa</th>
                                <th>Ngày thành lập</th>
                                <th>Mô tả</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                             <?php
                               require_once './inc/config.php';
                               $sql = "select * from faculty";
                               $result = mysqli_query($conn,$sql);
                               if ( $result) {
                                foreach($result as $key => $row) {
                                   
                                        ?>
                                            <tr>
                                                <td><?= $row['faculty_code'] ?></td>
                                                <td><?= $row['faculty_name'] ?></td>
                                                <td><?php 
                                                   $date = date_create($row['faculty_date']);
                                                        echo date_format($date, 'd/m/Y');
                                                   
                                                      
                                                ?>
                                                </td>
                                                <td style="white-space: normal; width:300px;height: 300px;"><?=  htmlspecialchars_decode($row['faculty_desc'] );  ?></td>
                                                <td>
                                                    <a href="edit_faculty.php?edit=<?php echo  $row['faculty_id'] ?>"><i class="fa-solid fa-pen-to-square"></i> </a>
                                                    <a onclick="return confirm('bạn có muốn xóa?')" href="delete_faculty.php?delete=<?php echo  $row['faculty_id']  ?>"><i class="fa-solid fa-xmark"></i></a>
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
 