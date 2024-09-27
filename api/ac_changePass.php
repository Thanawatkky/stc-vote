<?php
session_start();
    include '../connect.php';
    if(isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'user':
                $sql = $conn->query("SELECT * FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
                $fet = $sql->fetch_object();
                if($fet->password == md5($_REQUEST["current_password"])) {
                    if($_REQUEST['new_pass'] == $_REQUEST['confirm_pass']) {
                        $sql_update = $conn->query("UPDATE tb_user SET password='".md5($_REQUEST['new_pass'])."' WHERE user_id='".$_SESSION['user_id']."' ");
                        if($sql_update) {
                            $_SESSION['success'] = "เปลี่ยนรหัสผ่านสำเร็จ";
                            header("Location: ../index.php?p=change_password");
                        }else{
                            echo $conn->error;
                        }
                    }else{
                        $_SESSION['error'] = "รหัสผ่านไม่ตรงกัน";
                        header("Location: ../index.php?p=change_password");
                    }
                }else{
                    $_SESSION['error'] = "รหัสผ่านปัจจุบันไม่ถูกต้อง";
                    header("Location: ../index.php?p=change_password");
                }
                break;
            case 'admin':
                $sql = $conn->query("SELECT * FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
                $fet = $sql->fetch_object();
                if($fet->password == md5($_REQUEST["current_password"])) {
                    if($_REQUEST['new_pass'] == $_REQUEST['confirm_pass']) {
                        $sql_update = $conn->query("UPDATE tb_user SET password='".md5($_REQUEST['new_pass'])."' WHERE user_id='".$_SESSION['user_id']."' ");
                        if($sql_update) {
                            $_SESSION['success'] = "เปลี่ยนรหัสผ่านสำเร็จ";
                            header("Location: ../admin/index.php?p=change_password");
                        }else{
                            echo $conn->error;
                        }
                    }else{
                        $_SESSION['error'] = "รหัสผ่านไม่ตรงกัน";
                        header("Location: ../admin/index.php?p=change_password");
                    }
                }else{
                    $_SESSION['error'] = "รหัสผ่านปัจจุบันไม่ถูกต้อง";
                    header("Location: ../admin/index.php?p=change_password");
                }
                break;
        }
    }
?>