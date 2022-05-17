<?php
if(isset($_POST['them'])){
    $tieude=$_POST['ten'];
    $noidung=$_POST['noidung'];
    $sqlthem="INSERT INTO tuyendung(ten,noidung) VALUES ('$tieude','$noidung')";
    ex($sqlthem);
}
if(isset($_POST['update'])){
    $ten=$_POST['ten'];
    $noidung=$_POST['noidung'];
    $id=$_POST['id'];
    $sqlupdate="UPDATE tuyendung SET ten='$ten', noidung='$noidung' WHERE id='$id'";
    ex($sqlupdate);
}
if(isset($_GET['ac'])&&$_GET['ac']=='delete'){
    $id=$_GET['id'];
    $sqldl="DELETE FROM tuyendung WHERE id='$id'";
    ex($sqldl);
}
?>
<?php
if(isset($_GET['ac'])&&$_GET['ac']=='update'){ 
    $id=$_GET['id'];
    $sql4="SELECT*FROM tuyendung";
    $kq4=kq($sql4);
?>
<div class="form">
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $kq4[0]['id'] ?>">
        <label for="">Tiêu đề</label><br>
        <input value="<?php echo $kq4[0]['ten'] ?>" type="text" name="ten"><br>
        <label for="">Nội dung</label><br>
        <textarea name="noidung" id="" cols="50" rows="3"><?php echo $kq4[0]['noidung'] ?></textarea><br>
        <input type="submit" name="update" value="Cập nhật" class="btn btn-xanh">
    </form>
</div>
<?php }else{ ?>
    <div class="form">
    <form action="" method="POST">
        <label for="">Tiêu đề</label><br>
        <input type="text" name="ten"><br>
        <label for="">Nội dung</label><br>
        <textarea name="noidung" id="" cols="50" rows="3"></textarea><br>
        <input type="submit" name="them" value="Thêm" class="btn btn-xanh">
    </form>
</div>
<?php } ?>
<div class="ds">
    <table>
        <tr>
        <th>STT</th>
        <th>Tiêu đề</th>
        <th>Nội dung</th>
        <th>Action</th>
        </tr>
        <?php
        $i=0;
        $sql3="SELECT*FROM tuyendung";
        $kq3=kq($sql3);
        foreach ($kq3 as $value3) {
         ?>
        <tr>
            <td><?php echo ++$i ?></td>
            <td><?php  echo $value3['ten'] ?></td>
            <td><?php  echo $value3['noidung'] ?></td>
            <td>
            <a class="btn btn-xanh" href="?view=qltd&ac=update&id=<?php echo $value3['id'] ?>">sửa</a>
            <a class="btn btn-do" href="?view=qltd&ac=delete&id=<?php echo $value3['id'] ?>">xóa</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

