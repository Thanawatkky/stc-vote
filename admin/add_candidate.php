<?php 
    if(isset($_REQUEST['can_id'])) {
        $sql = $conn->query("SELECT * FROM tb_candidate WHERE can_id='".$_REQUEST['can_id']."' ");
        $fet = $sql->fetch_object();
?>
<h1  style="text-align: start; color: gray; padding: 1rem;">แก้ไขข้อมูลผู้สมัคร</h1>
<div class="content-candidate">
<form action="../api/ac_candidate.php?ac=edit" method="post">
    <input type="hidden" name="can_id" value="<?= $fet->can_id; ?>">
    <div class="col-2">
        <div class="form-group">
            <label for="party">พรรค</label>
            <input type="text" name="can_party" id="can_party" value="<?= $fet->can_party; ?>" placeholder="กรอกชื่อพรรคของผู้สมัคร...." class="form-control" required>
        </div>
        <div class="form-group">
            <label for="province">สังกัด/จังหวัด</label>
            <input type="text" name="can_province" id="can_province" value="<?= $fet->can_province; ?>" class="form-control" placeholder="กรอกจังหวัดหรือสังกัดที่ลงสมัคร..." required>
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            <label for="can_fname">ชื่อ</label>
            <input type="text" name="can_fname" placeholder="กรอกชื่อผู้สมัคร..." id="can_fname" value="<?= $fet->can_fname; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lname">นามสกุล</label>
            <input type="text" name="can_lname" id="can_lname" placeholder="กรอกนามสกุลผู้สมัคร..." value="<?= $fet->can_lname; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="num">เบอร์เลือกตั้ง</label>
            <input type="text" min="0" max="99" name="can_num" placeholder="กรอกเบอร์ผู้สมัคร..."  id="can_num" value="<?= $fet->can_num; ?>" class="form-control" required>
        </div>
    </div>
   
    <div class="my-3">
        <button type="submit" class="btn-submit">ยืนยัน</button>
    </div>
</form>
</div>

<?php }else{ ?>
    <h1  style="text-align: start; color: gray; padding: 1rem;">ลงทะเบียนผู้สมัคร</h1>
    <div class="content-candidate">
    <form action="../api/ac_candidate.php?ac=add" method="post">
    <div class="col-2">
        <div class="form-group">
            <label for="party">พรรค</label>
            <input type="text" name="can_party" id="can_party" placeholder="กรอกชื่อพรรคของผู้สมัคร...." class="form-control" required>
        </div>
        <div class="form-group">
            <label for="province">สังกัด/จังหวัด</label>
            <input type="text" name="can_province" id="can_province" class="form-control" placeholder="กรอกจังหวัดหรือสังกัดที่ลงสมัคร..." required>
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            <label for="can_fname">ชื่อ</label>
            <input type="text" name="can_fname" placeholder="กรอกชื่อผู้สมัคร..." id="can_fname"  class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lname">นามสกุล</label>
            <input type="text" name="can_lname" id="can_lname" placeholder="กรอกนามสกุลผู้สมัคร..."  class="form-control" required>
        </div>
        <div class="form-group">
            <label for="num">เบอร์เลือกตั้ง</label>
            <input type="number" min="0" max="99" name="can_num" placeholder="กรอกเบอร์ผู้สมัคร..."  id="can_num"  class="form-control" required>
        </div>
    </div>
   
    <div class="my-3">
        <button type="submit" class="btn-submit">ยืนยัน</button>
    </div>
</form>
    </div>
<?php } ?>