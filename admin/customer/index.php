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
                    <li><a href="../oders/index.php">Đơn Hàng</a></li>
                    <li><a href="#" class="active">Tài Khoản</a></li>
                    <li><a href="../product/index.php">Sản Phẩm</a></li>
                    <li><a href="../manufacture/index.php">Nhà Sản Xuất</a></li>
                    <li>
                        <div class="search">
                            <form action="" method="get">
                                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                            </form>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
        <div class="content" style="height:1000px;">
            <div class="modal fade" id="ModalEdit" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="alert alert-success" style="display: none;">
                            </div>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Sửa Tài Khoản</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" id="form-edit" method="post">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="text">Tên:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="text" name="name_edit" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="text">SDT:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="number" name="phone_edit" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="text">Email:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="number" name="email_edit" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="text">Địa Chỉ:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="number" name="address_edit" required>
                                    </div>
                                </div>
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="button" id="btn-update" class="btn btn-info">Sửa</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default" id="btn-close" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="products">
                <p style="font-size: 30px; font-weight: bold;">Danh Sách Customer</p>
                <p style="font-size: 20px; font-weight: bold;">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Tên</th>
                                <th>SDT</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th colspan="2">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../connect.php';
                            $sql = "select * from customer";
                            $result = mysqli_query($con, $sql);
                            foreach ($result as $each) { ?>
                                <tr>
                                    <td><?php echo $each['id']; ?></td>
                                    <td id="name"><?php echo $each['name']; ?></td>
                                    <td><?php echo $each['phone']; ?></td>
                                    <td><?php echo $each['email']; ?></td>
                                    <td><?php echo $each['address']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-lg" id="btn-edit" style="background-color: #333;border-color: #333; " data-id="<?php echo $each['id'] ?>" data-toggle="modal" data-target="#ModalEdit">Sửa</button>
                                    </td>
                                    <td>
                                        <button id="btn-delete" class="btn btn-danger" data-id="<?php echo $each['id'] ?>">Xoá</button>
                                    </td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
                <!-- Modal -->

            </div>
        </div>

    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    // ajax
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".table > tbody > tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $(document).on("click", '#btn-edit', function(event) {
            let id = $(this).data('id');
            $.ajax({
                    type: "get",
                    url: "edit.php",
                    data: {
                        id
                    },
                })
                .done(function(res) {
                    let obj = JSON.parse(res);
                    $('input[name=name_edit]').val(obj.name);
                    $('input[name=phone_edit]').val(obj.phone);
                    $('input[name=id]').val(obj.id);
                    $('input[name=email_edit]').val(obj.email);
                    $('input[name=address_edit]').val(obj.address);
                })
        });
        $("#btn-update").click(function() {
            $.ajax({
                type: "post",
                url: "process_edit.php",
                data: $("#form-edit").serializeArray(),
                success: function(response) {
                    if (response == 1) {
                        $(".alert-success").text("Sửa Thành Công!");
                        $(".alert-success").show();
                        setTimeout(function() {
                            $('#ModalEdit').modal().hide();
                            location.reload();
                        }, 1000);
                    } else {
                        $(".alert-danger").text("Lỗi Truy Vấn!");
                        $(".alert-danger").show();
                    }
                }
            });
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
    }); //jquery
</script>

</html>