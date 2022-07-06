<?php 

        session_start();
        if (isset($_SESSION['user_name']) && $_SESSION['user_name'] != null ) {
            unset($_SESSION['user_name']);
           
        }
         
       header('location:login.php')
?>