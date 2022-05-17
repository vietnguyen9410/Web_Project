<?php
?>
<div class="td">
    <?php
    $sql4 = "SELECT*FROM tuyendung ORDER BY id DESC LIMIT 5";
    $kq4 = kq($sql4);
    foreach ($kq4 as $value4) {
    ?>
        <div class="td-i">
            <h3><?php echo $value4['ten'] ?></h3>
            <p>
                <?php echo $value4['noidung'] ?>
            </p>
            <a href="tel:099999999" style="margin-top:3px" class="btn btn-do">Ứng tuyển</a>
        </div>
    <?php } ?>
</div>