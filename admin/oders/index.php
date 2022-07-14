<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../../css/style.css">
    <title>Shop DiEnTi</title>
</head>

<body>
    <div class="app-admin">
        <div class="header" style="background-color: #333;">
            <div class="header-top">
                <div class="logo">
                    <a href="#">Shop DiEnTi</a>
                </div>
                <div class="header-right">
                    <span><a href=""><i class="fas fa-user" style='font-size:20px'> Admin Tuan</i></a></span>
                    <!-- <button type="button" class="btn btn-info">Login</button> -->
                    <button type="button" class="btn btn-danger">Signout</button>
                </div>
            </div>
            <div class="navbar">
                <ul>
                    <li><a href="../index.php">Trang Chủ</a></li>
                    <li><a href="#" class="active">Đơn Hàng</a></li>
                    <li><a href="../customer/index.php">Tài Khoản</a></li>
                    <li><a href="../product/index.php">Sản Phẩm</a></li>
                    <li><a href="../manufacture/index.php">Nhà Sản Xuất</a></li>
                </ul>
            </div>

        </div>
        <div class="content" style="height:1500px;">
            <div class="products">
                <p style="font-size: 30px; font-weight: bold;">Danh Sách Đơn Hàng Chờ Duyệt</p>
                <div class="search" style="width: 250px;">
                    <form action="" method="get">
                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-first">
                        <thead>
                            <tr>
                                <th>Mã Đơn Hàng</th>
                                <th>Mã Khách Hàng</th>
                                <th>Thời Gian Tạo</th>
                                <th>Tên Người Nhận</th>
                                <th>SDT</th>
                                <th>Địa chỉ</th>
                                <th>Tổng Tiền</th>
                                <th colspan="2">Control</th>
                                <th>Xem Chi Tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../connect.php';
                            $sql = "select * from oders where status = 0";
                            $result = mysqli_query($con, $sql);
                            foreach ($result as $each) { ?>
                                <tr>
                                    <td><?php echo $each['id']; ?></td>
                                    <td><?php echo $each['id_customer']; ?></td>
                                    <td><?php echo date("d/m/Y H:i:s", strtotime($each['created_at'])); ?></td>
                                    <td><?php echo $each['name_recever']; ?></td>
                                    <td><?php echo $each['phone_recever']; ?></td>
                                    <td><?php echo $each['address_recever']; ?></td>
                                    <td><?php echo number_format($each['total_price'], 0, '', ','); ?> vnđ</td>
                                    <td>
                                        <button type="button" id="btn-accept" data-id="<?php echo $each['id']; ?>" class="btn btn-info">Duyệt</button>
                                    </td>
                                    <td>
                                        <button type="submit" id="btn-delete" data-id="<?php echo $each['id']; ?>" class="btn btn-danger">Huỷ</button>
                                    </td>
                                    <td><button type="submit" id="btn-view-detail" class="btn btn-success" data-toggle="modal" data-target="#myModal" data-id="<?php echo $each['id']; ?>">Xem Chi Tiết</button></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- <div id="pagination">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div> -->
                    <p style="font-size: 30px; font-weight: bold;">Danh Sách Đơn Hàng Đã Duyệt</p>
                    <div class="search" style="width: 250px;">
                        <form action="" method="get">
                            <input class="form-control" id="myInput2" type="text" placeholder="Search..">
                        </form>
                    </div>
                    <table class="table table-second">
                        <thead>
                            <tr>
                                <th>Mã Đơn Hàng</th>
                                <th>Mã Khách Hàng</th>
                                <th>Thời Gian Duyệt</th>
                                <th>Tên Người Nhận</th>
                                <th>SDT</th>
                                <th>Địa chỉ</th>
                                <th>Tổng Tiền</th>
                                <!-- <th>Trạng Thái</th> -->
                                <th>Xem Chi Tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "select * from oders where status = 1";
                            $result = mysqli_query($con, $sql);
                            foreach ($result as $each) { ?>
                                <tr>
                                    <td><?php echo $each['id']; ?></td>
                                    <td><?php echo $each['id_customer']; ?></td>
                                    <td><?php echo date("d/m/Y H:i:s", strtotime($each['created_at'])); ?></td>
                                    <td><?php echo $each['name_recever']; ?></td>
                                    <td><?php echo $each['phone_recever']; ?></td>
                                    <td><?php echo $each['address_recever']; ?></td>
                                    <td><?php echo number_format($each['total_price'], 0, '', ','); ?> vnđ</td>
                                    <td><button type="submit" id="btn-view-detail" class="btn btn-success" data-toggle="modal" data-target="#myModal" data-id="<?php echo $each['id']; ?>">Xem Chi Tiết</button></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                    <!-- <div id="pagination">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                    </div> -->
                    <!-- Modal -->

                </div>
                <!-- modal -->
                <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog" style="width: 45%;">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Chi Tiết Đơn Hàng</h4>
                            </div>
                            <div class="modal-body">
                                <h4>
                                    <strong>
                                        Thông Tin Người Nhận
                                    </strong>
                                </h4>
                                <p>
                                    Mã Đơn Hàng:# <span id="oder_id"> </span>
                                </p>
                                <p>
                                    Thời Gian Tạo: <span id="created_at"> </span>
                                </p>
                                <p>
                                    Mã Khách Hàng:# <span id="id_customer"> </span>
                                </p>
                                <p>
                                    Tên Người Nhận: <span id="name_recever"> </span>
                                </p>
                                <p>
                                    SDT Người Nhận: <span id="phone_recever"> </span>
                                </p>
                                <p>
                                    Địa Chỉ Nhận: <span id="address_recever"></span>
                                </p>
                                <h4>
                                    <strong>
                                        Danh Sách Sản Phẩm
                                    </strong>
                                </h4>
                                <table width="100%" id="table-product">
                                    <tr>
                                        <td>Mã </td>
                                        <td>Tên</td>
                                        <td>Ảnh</td>
                                        <td>Số Lượng</td>
                                        <td>Giá</td>
                                    </tr>
                                    <tbody id="tbody-product">

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h4>
                                    Tổng Tiền: <span id="total_price"></span>
                                </h4>
                                <p>
                                    <strong>
                                        Thanh Toán Khi Nhận Hàng
                                    </strong>
                                </p>
                                <h5>
                                    Trạng Thái: <span id="status"></span>
                                </h5>
                                <!-- body modal -->
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info">Export</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end-modal -->
                <!-- product -->
            </div>
            <!-- <div class="footer">
            <p>Họ và Tên:Dương Ngô Tuấn</p>
            <p>MSV:19103100063</p>
            <p>Lớp:DHTI13A1HN</p>
        </div> -->
        </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    // ajax
    function format2(n, currency) {
        return currency + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
    }

    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".table-first > tbody > tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $("#myInput2").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".table-second > tbody > tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $(document).on("click", '#btn-view-detail', function(event) {
            let id = $(this).data('id');
            $.ajax({
                    type: "get",
                    url: "oder_detail.php",
                    data: {
                        id
                    },
                })
                .done(function(res) {
                    let obj = JSON.parse(res);
                    let status_oder = '';
                    if (obj.status == 0) {
                        status_oder = 'Chờ Duyệt';
                    } else {
                        status_oder = 'Đã Giao';

                    }
                    $('#tbody-product tr').remove();
                    $('#oder_id').text(id);
                    $('#status').text(status_oder);
                    $('#name_recever').text(obj.name_recever);
                    $('#phone_recever').text(obj.phone_recever);
                    $('#address_recever').text(obj.address_recever);
                    $('#created_at').text(obj.created_at);
                    $('#id_customer').text(obj.id_customer);
                    let total_price = new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(obj.total_price);
                    $('#total_price').text(total_price);
                    const arrProduct = Object.values(obj.product);
                    $.each(arrProduct, function(key, value) {
                        let price = new Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(arrProduct[key].price);
                        $('#tbody-product').append('<tr><td>' + arrProduct[key].id + '</td>  <td>' + arrProduct[key].name + '</td>  <td> <img height="100px" src="../product/' + arrProduct[key].photo + '" alt="img"> </td> <td>' + arrProduct[key].quantity + '</td> <td>' + price + '</td>');
                    })
                })
        });
        $(document).on("click", '#btn-accept', function(event) {
            let id = $(this).data('id');
            $.ajax({
                    type: "get",
                    url: "accept_oder.php",
                    data: {
                        id
                    },
                })
                .done(function(res) {
                    location.reload();
                })
        });
        $(document).on("click", '#btn-delete', function(event) {
            let confirmDelete = confirm('Are you sủa?');
            if (confirmDelete == true) {
            let id = $(this).data('id');
            let btn = $(this);
            $.ajax({
                    type: "get",
                    url: "delete.php",
                    data: {
                        id
                    },
                })
                .done(function(res) {
                    let parent_tr = btn.parents('tr');
                    parent_tr.remove();
                })
            }
        });


    }); // jquery
</script>

</html>