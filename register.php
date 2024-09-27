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
            <form action="api/ac_register.php" method="post">
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
               <div class="form-regis">
                    <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Exmaple@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Your password..." required>
                        </div>
                        <div class="form-group">
                            <label for="fname">Firstname</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="Your firstname.." required>
                        </div>
                        <div class="form-group">
                            <label for="lname">Lastname</label>
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Your lastname..." required>
                        </div>
                        
                    </div>
                    <p>มีบัญชีอยู่แล้วใช่ไหม? <a href="login.php" style="text-decoration: none;">เข้าสู่ระบบ</a></p>

                <div class="my-3">
                    <button type="submit" class="btn-submit">Continue</button>
                </div>
            </form>
    </div>
</body>
</html>