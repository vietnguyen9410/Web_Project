<?php
$sql3="SELECT*FROM danhmuc ORDER BY id DESC";
$kq3=kq($sql3);
foreach ($kq3 as $value3) {
?>
<h2 style="color:orange;margin-top:20px"><?php echo $value3['ten'] ?></h2>
<div class="dm">
    <?php 
    $id_dm=$value3['id'];
    $sql4="SELECT*FROM mon WHERE id_dm='$id_dm' ORDER BY id DESC";
    $kq4=kq($sql4);
    foreach ($kq4 as $value4) {
    ?>
    <div class="sp">
        <img src="admin/mon/img/<?php echo $value4['img'] ?>" alt="">
        <h2><?php echo $value4['ten'] ?></h2>
        <div>
            <p>Giá: <?php echo number_format($value4['gia'], 0, '', '.') ?> vnđ</p>
            <a href="?view=chi-tiet-san-pham&id=<?php echo $value4['id'] ?>" class="btn btn-xanh">Đặt</a>
        </div>
    </div> 
    <?php }?>
</div>
<?php } ?>