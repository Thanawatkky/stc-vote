<div class="content-dashboard">
    <?php 
        $sql_num = $conn->query("SELECT * FROM tb_vote WHERE vote_user='".$_SESSION['user_id']."' ");
    if($sql_num->num_rows <= 0) {
    ?>
    <h1 class="text-header">รายชื่อผู้ลงเลือกตั้ง</h1>
    <?php }else{ ?>
        <h1 class="text-header">อับดับการเลือกตั้ง</h1>
        <?php } ?>
    <hr>
    <div class="col-4">
    <?php 
    

        if($sql_num->num_rows <= 0) {
            $sql = $conn->query("SELECT * FROM tb_candidate");
            while($fet = $sql->fetch_object()) {
        ?>
        <div class="card" style="width: 100%;">
            <h2 style="text-align: center; padding: .5rem 0; font-size: large;">พรรค<?= $fet->can_party; ?></h2>
            <img src="images/avatar.jpg" alt="" width="200" height="200" class="card-img">
            <div class="card-body">
                <h3 class="card-title" style="text-align: center;"><?= $fet->can_fname." ".$fet->can_lname; ?></h3>
                <p class="card-detail">จังหวัด <?= $fet->can_province; ?></p>
                <h1 class="num-seletor">เบอร์ <?= $fet->can_num; ?></h1>
            </div>
        </div>
       <?php  
            } 
        }else{
            $sql = $conn->query("SELECT tb_candidate.*,tb_vote.*, RANK() OVER(ORDER BY COUNT(tb_vote.vote_id) DESC) AS rank FROM tb_vote LEFT JOIN tb_candidate ON tb_vote.vote_candidate = tb_candidate.can_id GROUP BY tb_vote.vote_candidate");
            while ($fet = $sql->fetch_object()) {
               
       ?>
       <div class="card" style="width: 100%;">
            <h2 style="text-align: center; padding: .5rem 0; font-size: large;">อันดับ <?= $fet->rank; ?></h2>
           <img src="images/avatar.jpg" alt="" width="200" height="200" class="card-img">
           <div class="card-body">
                <h2 style="text-align: center; padding: .5rem 0; font-size: large;">พรรค<?= $fet->can_party; ?></h2>
                <h3 class="card-title" style="text-align: center;"><?= $fet->can_fname." ".$fet->can_lname; ?></h3>
                <p class="card-detail">จังหวัด <?= $fet->can_province; ?></p>
                <h1 class="num-seletor">เบอร์ <?= $fet->can_num; ?></h1>
            </div>
        </div>
       <?php 
            }
    } 
    ?>
    </div>
</div>