<?php
if(isset($_GET['action'])){
    $action=$_GET['action'];
    if($action=='dang-xuat'){
        session_destroy();
        header('location:dangnhap.php');
    }
}
if(isset($_GET['ac'])&&$_GET['ac']=='huy'){
    $id=$_GET['id'];
    $sql4="DELETE FROM don WHERE id='$id'";
    ex($sql4);
}
?>
<div class="tk-k">
    <label for="">Email/tên tài khoản:</label>
    <span><?php echo $_SESSION['user'] ?></span><br>
    <a href="?view=tai-khoan&action=dang-xuat" class="btn btn-do">Đăng xuất</a><br>
    <label for="">Đơn đặt</label>: <br>
    <?php
    $sql3="SELECT don.*, user.email FROM don LEFT JOIN user ON don.id_user=user.id";
    $kq3=kq($sql3);
    $i=0;
    ?>
    <table>
        <tr>
            <th>STT</th>
            <th>tên món</th>
            <th>giá món</th>
            <th>Số lượng</th>
            <th>Địa chỉ</th>
            <th>Thời gian đặt</th>
            <th>Trạng thái</th>
            <th>action</th>
        </tr>
        <?php 
        foreach ($kq3 as $value3) {
        ?>
        <tr>
            <td><?php echo ++$i ?></td>
            <td><?php echo $value3['tenmon'] ?></td>
            <td><?php echo number_format($value3['giamon'], 0, '', '.') ?> vnđ</td>
            <td><?php echo $value3['soluong'] ?></td>
            <td><?php echo $value3['diachi'] ?></td>
            <td><?php echo $value3['thoigiandat'] ?></td>
            <td>
                <?php 
                if($value3['tinhtrang']==0){
                ?>
                <p class="btn btn-xanh">
                    đang chờ
                </p>
                <?php }elseif($value3['tinhtrang']==1){ ?>
                    <p class="btn btn-xanh">
                    đã xác nhận
                    </p>
                <?php } ?>
            </td>
            <td>
                <a href="?view=tai-khoan&ac=huy&id=<?php echo $value3['id'] ?>" class="btn btn-do">hủy</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>