<?php
$tb = '';
if (isset($_POST['them'])) {
    $ten = $_POST['ten'];
    $sqlthem = "INSERT INTO danhmuc(ten) VALUES('$ten')";
    ex($sqlthem);
    $tb = '<span style="color:green">thêm thành công</span>';
}
if(isset($_POST['update'])){
    $ten = $_POST['ten'];
    $id=$_POST['id'];
    $sqlupdate="UPDATE danhmuc SET ten='$ten' WHERE id='$id'";
    ex($sqlupdate);
    $tb = '<span style="color:green">cập nhật thành công</span>';
}
if(isset($_GET['action'])&&$_GET['action']=='delete'){
    $id=$_GET['id'];
    $sqldl="DELETE FROM danhmuc WHERE id='$id'";
    ex($sqldl);
    $check="SELECT*FROM mon WHERE id_dm='$id'";
    $kqcheck=kq($check);
    $sl=count($kqcheck);
    if($sl>0){
        echo '
        <script>
            alert("bạn không xóa được vì đang có món trong danh mục");
        </script>';
    }
}
?>
<div class="form">
    <?php echo $tb ?>
    <?php
    if (isset($_GET['action']) && $_GET['action'] == 'update') {
        $id = $_GET['id'];
        $sql2 = "SELECT*FROM danhmuc WHERE id='$id'";
        $kq2 = kq($sql2);
        echo '
        <form action="" method="POST">
        <input type="hidden" value="'.$id.'" name="id"><br>
        <label for="">tên danh mục</label><br>
        <input value="'.$kq2[0]['ten'].'" type="text" name="ten" required><br>
        <input style="margin-top:5px" type="submit" value="Cập nhất" name="update" class="btn btn-xanh">
    </form>
        ';
    } else {
    ?>
        <form action="" method="POST">
            <label for="">tên danh mục</label><br>
            <input type="text" name="ten" required><br>
            <input style="margin-top:5px" type="submit" value="Thêm" name="them" class="btn btn-xanh">
        </form>
    <?php } ?>
</div>
<div class="ds">
    <table>
        <tr>
            <th>stt</th>
            <th>tên</th>
            <th>action</th>
        </tr>
        <?php
        $sqllay = "SELECT*FROM danhmuc ORDER BY id DESC";
        $kqlay = kq($sqllay);
        $i = 0;
        foreach ($kqlay as $valuelay) {
        ?>
            <tr>
                <td><?php echo ++$i ?></td>
                <td><?php echo $valuelay['ten'] ?></td>
                <td>
                    <a href="?view=qldm&action=update&id=<?php echo $valuelay['id'] ?>" class="btn btn-bien">sửa</a>
                    <a href="?view=qldm&action=delete&id=<?php echo $valuelay['id'] ?>" class="btn btn-do">xóa</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
