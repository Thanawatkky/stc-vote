<?php 
    session_start();
    include '../connect.php';
    $sql_check = $conn->query("SELECT email FROM tb_user WHERE email='".$_REQUEST['email']."' ");
    $num_check = $sql_check->num_rows;
    if($num <= 0) {
        
        $sql = $conn->query("INSERT INTO tb_user(email,password,fname,lname,user_role) VALUES('".$_REQUEST['email']."','".md5($_REQUEST['password'])."','".$_REQUEST['fname']."','".$_REQUEST['lname']."',2) ");
        if($sql) {
            header("Location: ../login.php");
        }else{
            echo $conn->error;
        }
    }else{
        $_SESSION['error'] = "Email นี้มีบัญอยู่แล้ว กรุณาเข้าสู่ระบบหรือเปลี่ยน email ของท่าน";
        header("Location: ../register.php");
    }

?>