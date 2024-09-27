<?php 
    $sql = $conn->query("SELECT * FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
    $fet = $sql->fetch_object();
?>
<div class="content-profile">
    <h3 class="logo">STC</h3>
    <form action="api/ac_profile.php?ac=user" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $fet->email; ?>" class="form-control"  readonly>
        </div>
        <div class="form-group">
            <label for="fname">Fristname</label>
            <input type="text" name="fname" id="fname" value="<?= $fet->fname; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lname">Lastname</label>
            <input type="text" name="lname" id="lname" value="<?= $fet->lname; ?>" class="form-control" required>
        </div>
            <a href="index.php?p=change_password" style="text-decoration: none; text-align: center;" id="change_pass">เปลี่ยนรหัสผ่าน</a>
        <div class="my-3">
            <button type="submit" class="btn-submit">CONTINUE</button>
        </div>
    </form>
</div>