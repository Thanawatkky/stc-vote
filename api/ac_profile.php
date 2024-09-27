<?php 
    session_start();
    include '../connect.php';
    if(isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'user':
                $sql = $conn->query("UPDATE tb_user SET fname='".$_REQUEST['fname']."',lname='".$_REQUEST['lname']."' WHERE user_id='".$_SESSION['user_id']."' ");
                if($sql) {
                    $_SESSION['success'] = "แก้ไขข้อมูลส่วนตัวสำเร็จ";
                    header("Location: ../index.php?p=profile");
                }else{
                    echo $conn->error;
                }
                break;
            case 'admin':
                $sql = $conn->query("UPDATE tb_user SET fname='".$_REQUEST['fname']."',lname='".$_REQUEST['lname']."' WHERE user_id='".$_SESSION['user_id']."' ");
                if($sql) {
                    $_SESSION['success'] = "แก้ไขข้อมูลส่วนตัวสำเร็จ";
                    header("Location: ../admin/index.php?p=profile");
                }else{
                    echo $conn->error;
                }
                break;
            
            default:
                # code...
                break;
        }
    }
?>