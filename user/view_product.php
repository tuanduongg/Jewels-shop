<?php include './head.php'; ?>

<body>
    <div class="products" style="background-color:  #EEEEEE;">
        <div class="header" style="background-color: #333;">
            <?php include './header.php'; ?>
            <div class="navbar">
                <ul>
                    <li><a href="./index.php">Trang Chủ</a></li>
                    <li><a href="./products.php">Sản Phẩm</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Liên Hệ</a></li>
                    <!-- <li>
                        <div class="search">
                            <form action="" method="get">
                                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                            </form>
                        </div>
                    </li> -->
                </ul>
            </div>

        </div>
        <div class="content">
            <div class="alert alert-success success-add-to-cart" style=" position: absolute; right: 10%; display: none;">
                <strong>Đã Thêm Sản Phẩm Vào Giỏ Hàng!</strong>
            </div>
           
            <div class="view-product">
                <?php
                require '../admin/connect.php';

                if (empty($_GET['id'])) {
                    header('location:./products.php');
                }
                $id = $_GET['id'];
                $sql = "select * from product where id='$id'";
                $result = mysqli_query($con, $sql);
                $each = $result->fetch_array();
                ?>
                <div class="product-left">
                    <h3 style="padding: 10px;"><?php echo $each['name']; ?></h3>
                    <img class="img-product img-rounded" src="../admin/product/<?php echo $each['photo']; ?>" alt="img">
                </div>

                <div class="product-right">
                    <h3>Mô Tả</h3>
                    <p><strong> Giá:<?php echo number_format($each['price'], 0, '', ','); ?> vnđ</strong></p>
                    <p><strong> Nhà Sản Xuất:Jewery</strong></p>
                    <p>
                        <strong>Thông Tin Sản Phẩm:</strong>
                        <?php echo $each['description']; ?>
                    </p>
                    <div class="product-bottom">
                        <p>
                            <button type="button" id="btn-update-quantity" data-id="<?php echo $id ?>" data-type="decre" class="btn btn-primary">-</button>
                            <span id="span-counter" style="font-size: 20px; font-weight: bold; margin: 0px 10px;">1</span>
                            <button type="button" id="btn-update-quantity" data-id="<?php echo $id ?>" data-type="incre" class="btn btn-primary">+</button>
                        </p>
                        <button type="button" id="btn-pay" class="btn btn-danger" style="height: 50px; width: 140px;font-weight: bold;">
                            Mua Ngay
                        </button>
                        <button id="btn-add-to-cart" type="button" data-id="<?php echo $_GET['id']; ?>" class="btn btn-primary" style="height: 50px;">
                            <i class="fas fa-cart-plus"> Thêm Vào Giỏ Hàng</i>
                        </button>
                    </div>
                </div>

            </div>
            <div class="product-diff">
                <h4><i class="fas fa-gem"></i> Sản Phẩm Khác</h4>
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
            </div>

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
        
    // // ready
    // });
</script>

</html>
<?php $con->close(); ?>