
<?php include './head.php'; ?>

<body>
    <div class="app">

        <div class="header">
            <?php include './header.php'; ?>
            <div class="slider">
            </div>
            <div class="navbar">
                <ul>
                    <li><a href="./index.php" class="active">Trang Chủ</a></li>
                    <li><a href="./products.php">Sản Phẩm</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Liên Hệ</a></li>
                </ul>
            </div>
            <div class="slogan">
                <h1>Chất Lượng <br>Tuyệt Hảo</h1>
                <span><a href="./products.php">Mua Ngay</a></span>
            </div>
        </div>
        <div class="content" style="position: absolute;top: 1000px; background-color: #EEEEEE;">
            <h1><i class="fas fa-gem"></i> Sản Phẩm Mới</h1>
            <div class="row-card">
                <?php
                require '../admin/connect.php';
                $sql = "select * from product limit 4";
                $result = mysqli_query($con, $sql);
                foreach ($result as $each) {
                ?>
                    <div class="col">
                        <div class="img-col"><a href="./view_product.php?id=<?php echo $each['id']; ?>"><img src="../admin/product/<?php echo $each['photo'] ?>" alt="img"></a></div>
                        <div class="name-col" style="height: 16%;"><?php echo $each['name'] ?></div>
                        <div class="col-right">
                            <div class="price-col"><?php echo number_format($each['price'], 0, '', ','); ?> vnđ</div>
                            <div class="btn-col"><a href="./view_product.php?id=<?php echo $each['id']; ?>">Đặt Ngay</a></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <h1><i class="fas fa-gem"></i> Sản Phẩm Bán Chạy</h1>
            <div class="row-card">
                <?php
                $sql = "select * from product limit 4 offset 4";
                $result = mysqli_query($con, $sql);
                foreach ($result as $each) {
                ?>
                    <div class="col">
                        <div class="img-col"><a href="./view_product.php?id=<?php echo $each['id']; ?>"><img src="../admin/product/<?php echo $each['photo'] ?>" alt="img"></a></div>
                        <div class="name-col" style="height: 16%;"><?php echo $each['name'] ?></div>
                        <div class="col-right">
                            <div class="price-col"><?php echo number_format($each['price'], 0, '', ','); ?> vnđ</div>
                            <div class="btn-col"><a href="./view_product.php?id=<?php echo $each['id']; ?>">Đặt Ngay</a></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="view_detail"><a href="./products.php">Xem Thêm >>></a></div>
            <div class="row-box">
                <div class="form-subcribe">
                    <h2>Đăng Ký Nhận Thông Báo</h2>
                    <input type="text" class="form-control" autocomplete="false" id="text" placeholder="Họ Và Tên">
                    <input type="email" class="form-control" autocomplete="false" id="email" placeholder="Email">
                    <button type="button" class="btn btn-success">Đăng Ký</button>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.923451086597!2d105.86335631533187!3d20.995705394280826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac05404c1b1d%3A0xd865d467337f19d0!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBLaW5oIHThur8gS-G7uSB0aHXhuq10IEPDtG5nIG5naGnhu4dwIChVTkVUSSk!5e0!3m2!1svi!2s!4v1651685184518!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="footer" style="margin-top: 30px;">
                <p>Họ và Tên:Dương Ngô Tuấn</p>
                <p>MSV:19103100063</p>
                <p>Lớp:DHTI13A1HN</p>
            </div>
            <?php include './modal.php';?>
        </div>
        <?php $con->close(); ?>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="./Js/modal.js"></script>
<script>
    $(document).ready(function () {
        $("#btn-view-cart").hide();
    });
</script>

</html>