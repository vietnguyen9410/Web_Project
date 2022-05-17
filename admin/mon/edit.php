<?php
if(isset($_POST['them'])){
    $ten=$_POST['ten'];
    $gia=$_POST['gia'];
    $img=$_FILES['img']['name'];
    $img_tmp=$_FILES['img']['tmp_name'];
    $id_danhmuc=$_POST['id_danhmuc'];
    $loaimon=$_POST['loaimon'];
    move_uploaded_file($img_tmp,'mon/img/'.$img);
    $sqlthem="INSERT INTO mon(ten,gia,img,id_dm,loaimon) VALUES('$ten','$gia','$img','$id_danhmuc','$loaimon')";
    ex($sqlthem);
}
if(isset($_POST['update'])){
    $id=$_POST['id'];
    $sql5="SELECT*FROM mon WHERE id='$id'";
    $kq5=kq($sql5);
    unlink('mon/img/'.$kq5[0]['img']);
    $ten=$_POST['ten'];
    $gia=$_POST['gia'];
    $img=$_FILES['img']['name'];
    $img_tmp=$_FILES['img']['tmp_name'];
    $id_danhmuc=$_POST['id_danhmuc'];
    $loaimon=$_POST['loaimon'];
    move_uploaded_file($img_tmp,'mon/img/'.$img);
    $sqlupdate="UPDATE mon SET ten='$ten',gia='$gia',img='$img',id_dm='$id_danhmuc',loaimon='$loaimon' WHERE id='$id'";
    ex($sqlupdate);
}
if(isset($_GET['ac'])&& $_GET['ac']=='delete'){
    $id=$_GET['id'];
    $sql6="SELECT*FROM mon WHERE id='$id'";
    $kq6=kq($sql6);
    unlink('mon/img/'.$kq6[0]['img']);
    $sqldl="DELETE FROM mon WHERE id='$id'";
    ex($sqldl);
}
if(isset($_GET['ac'])&& $_GET['ac']=='update'){
    $id=$_GET['id'];
    $sql4="SELECT*FROM mon WHERE id='$id'";
    $kq4=kq($sql4);
?>
<div class="form-mon">
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $kq4[0]['id'] ?>">
        <label for="">Tên món</label><br>
        <input value="<?php echo $kq4[0]['ten'] ?>" required type="text" name="ten"><br>
        <label for="">giá món</label><br>
        <input value="<?php echo $kq4[0]['gia'] ?>" required type="text" name="gia"><br>
        <label for="">ảnh đại diện</label> <br>
        <input required type="file" name="img"><br>
        <label for="">id_danhmuc</label>
        <select name="id_danhmuc" id="">
            <?php 
            $sqldm="SELECT*FROM danhmuc";
            $kqdm=kq($sqldm);
            foreach ($kqdm as $valuedm){
            ?>
            <?php 
            if($valuedm['id']==$kq4[0]['id_dm']){
                echo '
                <option selected value="'.$valuedm['id'].'">'.$valuedm['ten'].'</option>
                ';
            }else{
                echo '
                <option  value="'.$valuedm['id'].'">'.$valuedm['ten'].'</option>
                ';
            }
            ?>
            <?php } ?>
        </select><br>
        <label for="">Loại món</label>
        <select name="loaimon" id="">
        <?php 
            if($kq4[0]['loaimon']=='1'){
                echo '
                <option selected value="1">món thường</option>
                <option value="0">món ngon</option>
                ';
            }else{
                echo '
                <option selected value="0">món ngon</option>
                <option  value="1">món thường</option>
                ';
            }
            ?>
        </select><br>
        <input type="submit" value="Cập nhật" name="update" class="btn btn-xanh">
    </form>
</div>
<?php }else{?>
    <div class="form-mon">
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">Tên món</label><br>
        <input required type="text" name="ten"><br>
        <label for="">giá món</label><br>
        <input required type="text" name="gia"><br>
        <label for="">ảnh đại diện</label> <br>
        <input required type="file" name="img"><br>
        <label for="">id_danhmuc</label>
        <select name="id_danhmuc" id="">
            <?php 
            $sqldm="SELECT*FROM danhmuc";
            $kqdm=kq($sqldm);
            foreach ($kqdm as $valuedm){
            ?>
            <option value="<?php echo $valuedm['id'] ?>" value=""><?php echo $valuedm['ten'] ?></option>
            <?php } ?>
        </select><br>
        <label for="">Loại món</label>
        <select name="loaimon" id="">
            <option value="1">Món thường</option>
            <option value="0">Món ngon nhất</option>
        </select><br>
        <input type="submit" value="Thêm" name="them" class="btn btn-xanh">
    </form>
</div>
<?php } ?>
<div class="ds">
    <table>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>giá</th>
            <th>ảnh</th>
            <th>danh mục cha</th>
            <th>loại món</th>
            <th>action</th>
        </tr>
        <?php 
            $sql3="SELECT mon.*, danhmuc.ten as tendanhmuc FROM mon lEFT JOIN danhmuc ON mon.id_dm=danhmuc.id";
            $kq3=kq($sql3);
            $i=0;
            foreach ($kq3 as $value3) {
        ?>
        <tr>
            <td><?php echo ++$i ?></td>
            <td><?php  echo $value3['ten'] ?></td>
            <td><?php  echo $value3['gia'] ?></td>
            <td><img style="width:60px" src="mon/img/<?php  echo $value3['img'] ?>" alt=""></td>
            <td><?php  echo $value3['tendanhmuc'] ?></td>
            <td>
                <?php 
                 if($value3['loaimon']==1){
                     echo 'món thường';
                 }else{
                     echo 'món ngon';
                 }
                 ?>
            </td>
            <td>
                <a href="?view=qlmon&ac=delete&id=<?php echo $value3['id'] ?>" class="btn btn-do">xóa</a>
                <a href="?view=qlmon&ac=update&id=<?php echo $value3['id'] ?>" class="btn btn-xanh">sửa</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>