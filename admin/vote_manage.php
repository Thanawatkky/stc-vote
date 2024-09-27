<h1 style="text-align: start; color: gray; padding: 1rem;">คะแนน/อันดับ</h1>
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