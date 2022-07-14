<?php include './head.php'; ?>

<body>
    <div class="products" style="background-color: #eeee;" >
        <div class="header" style="background-color: #333;">
            <?php include './header.php'; ?>
            <div class="navbar">
                <ul>
                    <li><a href="./index.php">Trang Chủ</a></li>
                    <li><a href="#" class="active">Sản Phẩm</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Liên Hệ</a></li>
                    <li>
                        <div class="search">
                            <form action="" method="">
                                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content">
            <h1>Các Sản Phẩm Của Shop</h1>
            <div class="filter">
                <span>Sắp Xếp Theo</span>
                <button type="button" class="btn" style="background-color: #333; color: white; border: 1px solid #ffff;">Mới Nhất</button>
                <button type="button" class="btn" style="background-color: #333; color: white; border: 1px solid #ffff;">Bán Chạy</button>
                <input type="checkbox"><span>Giá Từ Thấp Đến Cao</span>
                <input type="checkbox"><span>Giá Từ Cao Xuống Thấp</span>
            </div>
            <div class="row-card">
                <!-- <img src="" alt=""> -->
                <?php
                require '../admin/connect.php';
                $sql = "select * from product limit 12";
                $result = mysqli_query($con, $sql);
                foreach ($result as $each) {
                ?>
                    <div class="col" style="padding-bottom: 10px;">
                        <div class="img-col"><a href="./view_product.php?id=<?php echo $each['id']; ?>"><img src="../admin/product/<?php echo $each['photo'] ?>" alt="img"></a></div>
                        <div class="name-col" style="height: 15%; font-size: 17px; color: red;"><?php echo $each['name'] ?></div>
                        <div class="col-right">
                            <div class="price-col"><?php echo number_format($each['price'], 0, '', ','); ?> vnđ</div>
                            <div class="btn-col"><a href="./view_product.php?id=<?php echo $each['id']; ?>">Đặt Ngay</a></div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
        <div id="pagination">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>
        <div class="footer">
            <p>Họ và Tên:Dương Ngô Tuấn</p>
            <p>MSV:19103100063</p>
            <p>Lớp:DHTI13A1HN</p>
        </div>
        <?php include './modal.php'; ?>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="./Js/modal.js"></script>
<script>
    // $(document).ready(function() {
    //     $("#myInput").on("keyup", function () {
    //     $("#pagination").hide();
    //     var value = $(this).val().toLowerCase();
    //     $(".col").filter(function () {
    //         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    //     });
    // }); 
    // });
</script>

</html>
<?php 
$con->close();
?>