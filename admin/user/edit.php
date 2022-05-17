<?php
if(isset($_POST['update'])){
    $id=$_POST['id'];
    $quyen=$_POST['quyen'];
    $sqlupdate="UPDATE user SET quyen='$quyen' WHERE id='$id'";
    ex($sqlupdate);
}
?>
<div class="ds">
    <table>
        <tr>
            <th>STT</th>
            <th>email/tài khoản</th>
            <th>Họ và tên</th>
            <th>Quyền</th>
        </tr>
        <?php
        $sql2 = "SELECT*FROM user";
        $kq2 = kq($sql2);
        $i = 0;
        foreach ($kq2 as $value2) {
        ?>
            <tr>
                <td><?php echo ++$i ?></td>
                <td><?php echo $value2['email'] ?></td>
                <td><?php echo $value2['hovaten'] ?></td>
                <td>
                    <form action="" method="POST">
                        <select name="quyen" id="">
                            <?php
                            if ($value2['quyen'] == 2) {
                                echo '
                                <option  value="0">admin</option>
                                <option selected  value="2">khách hàng</option>
                            ';
                            } elseif($value2['quyen'] == 0) {
                                echo '
                                <option selected value="0">admin</option>
                                <option  value="2">khách hàng</option>
                            ';
                            }elseif($value2['quyen']==1){
                                echo '
                                    <option selected value="1">admin</option>
                                ';
                            }
                            ?>
                        </select>
                        <input type="hidden" name="id" value="<?php echo $value2['id'] ?>">
                        <input type="submit" name="update" value="cập nhật" class="btn btn-xanh">
                    </form>

                </td>
            </tr>
        <?php } ?>
    </table>
</div>