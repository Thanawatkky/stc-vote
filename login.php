<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | STC</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="container">
            <div class="logo-box">
                <h2>STC</h2>
            </div>
            <form action="api/ac_login.php" method="post">
                <?php
                    if(isset($_SESSION['success'])) {

                    
                ?>
                <div class="alert-success"><?php echo $_SESSION['success']; ?></div>
                <?php
                unset($_SESSION['success']);
             } 
             ?>
                <?php
                    if(isset($_SESSION['error'])) {

                    
                ?>
                <div class="alert-error"><?php echo $_SESSION['error']; ?></div>
                <?php
                unset($_SESSION['error']);
             } 
             ?>
               <div class="form-login">
                    <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Exmaple@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Your password..." required>
                        </div>
                    </div>
                    <p>ยังไม่มีบัญชีใช่ไหม? <a href="register.php" style="text-decoration: none;">สมัครสมาชิก</a></p>
                <div class="my-3">
                    <button type="submit" class="btn-submit">Continue</button>
                </div>
            </form>
    </div>
</body>
</html>