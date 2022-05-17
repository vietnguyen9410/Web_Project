<div class="banner">
    <div class="banner-img">
        <img src="img/banner/banner1.jpg" alt="banner1">
        <img src="img/banner/banner2.jpg" alt="banner1">
        <img src="img/banner/banner3.jpg" alt="banner1">
    </div>
    <div class="next">
        <img id="trai" width="40px" src="img/icon/left-arrow.png" alt="">
        <img id="phai" width="40px" src="img/icon/right-arrow.png" alt="">
    </div>
    <script>
        const trai = document.querySelector('#trai');
        const phai = document.querySelector('#phai');
        var sl = document.querySelectorAll('.banner-img img').length;
        let index = 0;

        function tudong() {
            index = index + 1;
            if (index > sl - 1) {
                index = 0
            };
            document.querySelector('.banner-img').style.right = index * 100 + "%";
        }
        phai.addEventListener('click', function() {
            index = index + 1;
            if (index > sl - 1) {
                index = 0
            };
            document.querySelector('.banner-img').style.right = index * 100 + "%";
        });
        trai.addEventListener("click", function() {
            index = index - 1;
            if (index < 0) {
                index = sl - 1
            };
            document.querySelector(".banner-img").style.right = index * 100 + "%"
        });
        setInterval(tudong, 3000);
    </script>
</div>
<h3 style="text-align:center;font-size:30px;color:rgb(218, 112, 26);margin-top:25px">Món mới nhất</h3>
<div class="mon-moi">
    <?php
    $sql2 = "SELECT*FROM mon ORDER BY id DESC LIMIT 4";
    $kq2 = kq($sql2);
    foreach ($kq2 as $value2) {
    ?>
        <div class="sp">
            <img src="admin/mon/img/<?php echo $value2['img'] ?>" alt="">
            <h2><?php echo $value2['ten'] ?></h2>
            <div>
                <p>Giá: <?php echo number_format($value2['gia'], 0, '', '.') ?> vnđ</p>
                <a href="?view=chi-tiet-san-pham&id=<?php echo $value2['id'] ?>" class="btn btn-xanh">Đặt</a>
            </div>
        </div>
    <?php } ?>
</div>
<h3 style="text-align:center;font-size:30px;color:rgb(218, 112, 26);margin-top:25px">Món Ăn Ngon Nhất</h3>
<div class="mon-ngon">
    <?php
    $sql3="SELECT*FROM mon WHERE loaimon='0' ORDER BY id DESC LIMIT 8";
    $kq3=kq($sql3);
    foreach ($kq3 as $value3) {
    ?>
    <div class="sp">
        <img src="admin/mon/img/<?php echo $value3['img'] ?>" alt="">
        <h2><?php echo $value3['ten'] ?></h2>
        <div>
            <p>Giá: <?php echo number_format($value3['gia'], 0, '', '.') ?> vnđ</p>
            <a href="?view=chi-tiet-san-pham&id=<?php echo $value3['id'] ?>" class="btn btn-xanh">Đặt</a>
        </div>
    </div>
    <?php } ?>
</div>
<h3 style="font-size:20px;color:blue"><u>Tin tức tuyển dụng</u></h3>
<div class="td">
    <?php
    $sql4="SELECT*FROM tuyendung ORDER BY id DESC LIMIT 5";
    $kq4=kq($sql4);
    foreach ($kq4 as $value4) {
    ?>
    <div class="td-i">
        <h3><?php echo $value4['ten'] ?></h3>
        <p>
           <?php  echo $value4['noidung'] ?>
        </p>
        <a href="tel:0969043737" style="margin-top:3px" class="btn btn-do">Ứng tuyển</a>
    </div>
    <?php } ?>
</div>