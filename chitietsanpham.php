<?php
$tb='';
$id=$_GET['id'];
$sql3="SELECT*FROM mon WHERE id='$id'";
$kq3=kq($sql3);
$email=$_SESSION['user'];
$sql4="SELECT*FROM user WHERE email='$email'";
$kq4=kq($sql4);
if(isset($_POST['dat'])){
    $id_user=$_POST['id_user'];
    $tenmon=$kq3[0]['ten'];
    $giamon=$kq3[0]['gia'];
    $soluong=$_POST['soluong'];
    $diachi=$_POST['diachi'];
    $sdt=$_POST['sdt'];
    $thoigiandat=date("Y-m-d H:i:s");
    $sql5="INSERT INTO don(id_user,tenmon,giamon,soluong,diachi,sdt,thoigiandat) VALUES('$id_user','$tenmon','$giamon','$soluong','$diachi','$sdt','$thoigiandat')";
    ex($sql5);
    $tb='<span style="color:green">Đặt hàng thành công</span>';
}
?>
<div class="sp-k">
    <div class="l">
        <img src="admin/mon/img/<?php echo $kq3[0]['img']?>" alt="">
        <h2><?php echo $kq3[0]['ten']?></h2>
        <p>Giá: <?php echo number_format($kq3[0]['gia'], 0, '', '.') ?> vnđ</p>
    </div>
    <div class="r">
       
        <form action="" method="POST">
        <?php 
        echo $tb;
        ?><br>
            <label for="">Họ và tên</label><br>
            <input readonly required type="text" name="hovaten"  value="<?php echo $kq4[0]['hovaten'] ?>"><br>
            <input type="hidden" name="id_user" value="<?php echo $kq4[0]['id'] ?>">
            <label for="">SĐT</label><br>
            <input required type="text" name="sdt"><br>
            <label for="">Email</label><br>
            <input readonly value="<?php echo $kq4[0]['email'] ?>" required type="text" name="email"><br>
            <label for="">Số lượng</label><br>
            <input required min="1" type="number" name="soluong"><br>
            <label for="">Địa chỉ</label><br>
            <input required type="text" name="diachi"><br>
            <input style="margin-top:20px;" type="submit" value="Đặt" name="dat" class="btn btn-xanh">
        </form>
    </div>
</div>


