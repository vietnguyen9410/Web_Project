<?php
if (isset($_GET['ac']) && $_GET['ac'] == 'xn') {
    $id = $_GET['id'];
    $sqlxn = "UPDATE don SET tinhtrang=1 WHERE id='$id'";
    ex($sqlxn);
}
if (isset($_GET['ac']) && $_GET['ac'] == 'delete') {
    $id = $_GET['id'];
    $sqldl = "DELETE FROM don WHERE id='$id'";
    ex($sqldl);
}
?>
<div class="ds">
    <table>
        <tr>
            <th>STT</th>
            <th>tên khách</th>
            <th>email</th>
            <th>SĐT</th>
            <th>tên món</th>
            <th>giá món</th>
            <th>Số lượng</th>
            <th>địa chỉ</th>
            <th>Thời gian đặt</th>
            <th>tình trạng</th>
        </tr>
        <?php
        $sql3 = "SELECT don.*, user.email, user.hovaten FROM don LEFT JOIN user ON don.id_user=user.id";
        $kq3 = kq($sql3);
        $i = 0;
        foreach ($kq3 as $value3) {
        ?>
            <tr>
                <td><?php echo ++$i ?></td>
                <td><?php echo $value3['hovaten'] ?></td>
                <td><?php echo $value3['email'] ?></td>
                <td><?php echo $value3['sdt'] ?></td>
                <td><?php echo $value3['tenmon'] ?></td>
                <td><?php echo $value3['giamon'] ?></td>
                <td><?php echo $value3['soluong'] ?></td>
                <td><?php echo $value3['diachi'] ?></td>
                <td><?php echo $value3['thoigiandat'] ?></td>
                <td>
                    <?php
                    if ($value3['tinhtrang']==0) {
                    ?>
                        <a style="font-size:8px" href="?view=qldh&ac=xn&id=<?php echo $value3['id'] ?>" class="btn btn-xanh">Xác nhận</a>
                    <?php }elseif($value3['tinhtrang']==1){?>
                        <a style="font-size:8px;color:black" href="?view=qldh" class="btn">Đã xác nhận</a>
                    <?php } ?>
                    <a style="font-size:8px" href="?view=qldh&ac=delete&id=<?php echo $value3['id'] ?>" class="btn btn-do">Xóa</a>
                </td>

            </tr>
        <?php } ?>
    </table>
</div>