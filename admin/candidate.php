<h1 style="text-align: start; color: gray; padding: 1rem;">จัดการผู้สมัครเลือกตั้ง</h1>
<div style="text-align: end;">
    <a href="index.php?p=add_candidate" class="btn-add">เพิ่ม</a>
</div>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>พรรค</th>
            <th>ชื่อ-นามสกุล</th>
            <th>สังกัด/จังหวัด</th>
            <th>เบอร์</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
       
            $sql = $conn->query("SELECT * FROM tb_candidate");
            $i = 0;
            $num = $sql->num_rows;
            while($fet = $sql->fetch_object()) {
                $i++;
        ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $fet->can_party; ?></td>
            <td><?= $fet->can_fname." ".$fet->can_lname; ?></td>
            <td><?= $fet->can_province; ?></td>
            <td><?= $fet->can_num; ?></td>
            <td>
                <a href="index.php?p=add_candidate&can_id=<?= $fet->can_id; ?>" class="btn-edit" id="btn-edit">Edit</a>

                <a href="../api/ac_candidate.php?ac=del&can_id=<?= $fet->can_id; ?>" onclick="return confirm('ต้องการลบข้อมูลหรือไม่!')" class="btn-delete" id="btn-del">Delete</a>

            </td>
        </tr>
        <?php } ?>
        
    </tbody>
</table>
        <?php 
            if($num <= 0) {
        ?>
        <h2 style="text-align: center; color: gray;">Not found!</h2>
        <?php } ?>