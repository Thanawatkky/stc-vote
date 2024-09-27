
<div class="content-profile">
    <h3 class="logo">STC</h3>
    <form action="api/ac_changePass.php?ac=user" method="post">

        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Enter your current password"  required>
        </div>
        <div class="form-group">
            <label for="new_pass">New Password</label>
            <input type="password" name="new_pass" id="new_pass" placeholder="Enter your new password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="confirm_pass">Confirm Password</label>
            <input type="password" name="confirm_pass" id="confirm_pass" placeholder="Enter your confirm password" class="form-control" required>
        </div>
        <div class="my-3">
            <button type="submit" class="btn-submit">CONTINUE</button>
        </div>
    </form>
</div>