<?php 
    session_start();
    include '../connect.php';
    if(isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'user_vote':
                $sql = $conn->query("INSERT INTO tb_vote(vote_user,vote_cardID,vote_candidate) VALUES('".$_SESSION['user_id']."','".$_REQUEST['cardID']."','".$_REQUEST['candidate']."') ");
                if($sql) {
                    $_SESSION['success'] = "ดำเนินการสำเร็จ";
                    header("Location: ../index.php?p=vote");
                }else{
                    $conn->error;
                }
                break;
            
            default:
                # code...
                break;
        }
    }
?>