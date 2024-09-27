<?php 
    session_start();
    include '../connect.php';
    if(isset($_REQUEST['ac'])){
        switch ($_REQUEST['ac']) {
            case 'add':
                if(!$_REQUEST['can_party'] || !$_REQUEST['can_fname'] && !$_REQUEST['can_lname'] && !$_REQUEST['can_num'] && !$_REQUEST['can_province']){
                    $_SESSION['error'] = "กรอกข้อมูลไม่ครบ กรุณาลองใหม่อีกครั้ง!";
                    header("Location: ../admin/index.php?p=add_candidate");
                }else{
                $sql = $conn->query("INSERT INTO tb_candidate(can_party, can_fname, can_lname, can_num, can_province) VALUES('".$_REQUEST['can_party']."','".$_REQUEST['can_fname']."','".$_REQUEST['can_lname']."','".$_REQUEST['can_num']."','".$_REQUEST['can_province']."')");
                if($sql) {
                    $_SESSION['success'] = "ลงทะเบียนผู้สมัครสำเร็จ";
                    header("Location: ../admin/index.php?p=candidate");
                }else{
                    echo $conn->error;
                }
            }
                break;
            case 'edit':
                $sql = $conn->query("UPDATE tb_candidate SET can_party='".$_REQUEST['can_party']."',can_fname='".$_REQUEST['can_fname']."',can_lname='".$_REQUEST['can_lname']."',can_num='".$_REQUEST['can_num']."', can_province='".$_REQUEST['can_province']."' WHERE can_id='".$_REQUEST['can_id']."' ");
                if($sql) {
                    $_SESSION['success'] = "แก้ไขข้อมูลผู้สมัครสำเร็จ";
                    header("Location: ../admin/index.php?p=candidate");
                }else{
                    echo $conn->error;
                }
                break;
            case 'del':
                $sql = $conn->query("DELETE FROM tb_candidate WHERE can_id='".$_REQUEST['can_id']."' ");
                if($sql) {
                    $_SESSION['success'] = "ลบข้อมูลสำเร็จ";
                    header("Location: ../admin/index.php?p=candidate");
                }else{
                    echo $conn->error;
                }
                break;
        }
    }
?>