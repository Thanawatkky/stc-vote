<div class="content-vote">
    <?php 
        $sql_num = $conn->query("SELECT * FROM tb_vote WHERE vote_user='".$_SESSION['user_id']."'");
       
        if($sql_num->num_rows <= 0) {

        
    ?>
    <div class="card">
        <h1>ลงคะแนนเสียง</h1>
        <div class="card-body">
            <form action="api/ac_vote.php?ac=user_vote" method="post">
                <div class="form-group">
                    <label for="cardID">เลขบัตรประจำตัวประชาชน</label>
                    <input type="text" name="cardID" id="cardID" minlength="13" maxlength="13" required>
                </div>
                <div class="form-group">
                <label for="vote">เลือกเบอร์ที่ต้องการ</label>
                    <select name="candidate" id="candidate">
                        <option disabled selected>เลือกเบอร์ที่ต้องการ</option>
                        <?php 
                            $sql = $conn->query("SELECT can_id,can_num FROM tb_candidate");
                            while($fet = $sql->fetch_object()) {
                        ?>
                        <option value="<?= $fet->can_id; ?>">เบอร์ <?= $fet->can_num; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn-submit">ยืนยัน</button>
            </form>
        </div>
    </div>
</div>
    <?php 
        }else{ 
            $fet_num = $sql_num->fetch_object();
            $sql = $conn->query("SELECT tb_vote.*,tb_candidate.* FROM tb_vote LEFT JOIN tb_candidate ON tb_vote.vote_candidate = tb_candidate.can_id WHERE tb_vote.vote_candidate='".$fet_num->vote_candidate."' ");
            $fet = $sql->fetch_object();
    ?>
    <div class="content-point">
        <div class="col-2">
        <div class="card" style="width: 100%; ">
                <h2 style="text-align: center; padding: .5rem 0; font-size: large; display: block; margin: 0 auto;">พรรค<?= $fet->can_party; ?></h2>
                <img src="images/avatar.jpg" alt="" width="200" height="200" class="card-img">
                <div class="card-body">
                    <h3 class="card-title" style="text-align: center;"><?= $fet->can_fname." ".$fet->can_lname; ?></h3>
                    <p class="card-detail">จังหวัด <?= $fet->can_province; ?></p>
                    <h1 class="num-seletor">เบอร์ <?= $fet->can_num; ?></h1>
                </div>
            </div>
        <div class="card" style="width: 100%;  height: 50%;">
                <div class="card-body" >
                    <h2 class="card-title" style="text-align: center; padding-top: 2rem;">คะแนน</h2>
                    <?php 
                    $sql_sum = $conn->query("SELECT COUNT(vote_id) AS total_vote FROM tb_vote WHERE vote_candidate='".$fet_num->vote_candidate."' ");
                    $fet_sum = $sql_sum->fetch_object();

                    ?>
                    <h2 class="card-detail" style="color: black; padding: 1rem;"><?= $fet_sum->total_vote; ?></h2>
                </div>
            </div>
        </div>
        <?php  } ?>
</div>