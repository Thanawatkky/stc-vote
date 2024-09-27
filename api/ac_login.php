<?php 
    session_start();
    include '../connect.php';
    $sql = $conn->query("SELECT * FROM tb_user WHERE email='".$_REQUEST['email']."' ");
    $num = $sql->num_rows;
    if($num <= 0) {
        $_SESSION['error'] = "Email ไม่ถูกต้อง";
        header("Location: ../login.php");
    }else{
        $fet = $sql->fetch_object();
        if($fet->password == md5($_REQUEST['password'])) {

            $_SESSION['user_id'] = $fet->user_id;
            $_SESSION['email'] = $fet->email;
            $_SESSION['fname'] = $fet->fname;
            $_SESSION['lname'] = $fet->lname;


            if($fet->user_role == 1) {
                header("Location: ../admin/index.php");
            }else{
                header("Location: ../index.php");
            }
        }else{
            $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง";
            header("Location: ../login.php");
        }
    }
?>