<?php 
    $sql_alluser = $conn->query("SELECT * FROM tb_user WHERE user_role = 2");
    $sql_allcandidate = $conn->query("SELECT * FROM tb_candidate");
    $sql_vote = $conn->query("SELECT * FROM tb_vote");
    $num_all = [$sql_alluser->num_rows,$sql_allcandidate->num_rows,$sql_vote->num_rows];
    
?>
<h1>Dashboard Overview</h1>
<p style="color: gray; padding-top: 1rem; width: 100%; margin-bottom: 20px;">Welcome to the admin panel. Here is a summary of your platform's statistics.</p>
<div class="col-3">
    <div class="card">
        <h2>จำนวนผู้ใช้งาน</h2>
        <p><?= $num_all[0]; ?></p>
    </div>
    <div class="card">
        <h2>จำนวนผู้สมัคร</h2>
        <p><?= $num_all[1]; ?></p>
    </div>
    <div class="card">
        <h2>จำนวนครั้งเลือกตั้ง</h2>
        <p><?= $num_all[2]; ?></p>
    </div>
</div>
<hr>
<table>
    <thead>
        <tr>
            <th>อันดับ</th>
            <th>พรรค</th>
            <th>ชื่อ-นามสกุล</th>
            <th>สังกัด/จังหวัด</th>
            <th>เบอร์</th>
            <th>คะแนน</th>
        </tr>
    </thead>
    <tbody>
        <?php 
       
       $sql = $conn->query("SELECT tb_candidate.*,tb_vote.*, RANK() OVER(ORDER BY COUNT(tb_vote.vote_id) DESC) AS rank,COUNT(tb_vote.vote_id) AS total_vote FROM tb_vote LEFT JOIN tb_candidate ON tb_vote.vote_candidate = tb_candidate.can_id GROUP BY tb_vote.vote_candidate");
            $num = $sql->num_rows;
            while($fet = $sql->fetch_object()) {

        ?>
        <tr>
            <td><?= $fet->rank; ?></td>
            <td><?= $fet->can_party; ?></td>
            <td><?= $fet->can_fname." ".$fet->can_lname; ?></td>
            <td><?= $fet->can_province; ?></td>
            <td><?= $fet->can_num; ?></td>
            <td><?= $fet->total_vote; ?></td>
        </tr>
        <?php } ?>
        
    </tbody>
</table>
        <?php 
            if($num <= 0) {
        ?>
        <h2 style="text-align: center; color: gray;">Not found!</h2>
        <?php } ?>