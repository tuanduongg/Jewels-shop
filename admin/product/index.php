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
                    <li><a href="../customer/index.php">Tài Khoản</a></li>
                    <li><a href="#" class="active">Sản Phẩm</a></li>
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
        <div class="content" style="background-color: white;">
            <div class="products">
                <?php
                require '../connect.php';
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $photo = $_FILES['photo'];
                    $description = $_POST['description'];
                    $id_manufacture = $_POST['id_manufacture'];
                    $file_extension = explode('.', $photo['name'])[1]; // lấy đuôi file rồi
                    $file_folder = 'photos/';
                    $file_name =  time() . '.' . $file_extension; // folder lưu file
                    $file_path = $file_folder . $file_name; // tạo ra đường dẫn file
                    move_uploaded_file($photo['tmp_name'], $file_path);
                    $sql = "insert into product(name,price,photo,description,id_manufacture)values('$name','$price','$file_path','$description','$id_manufacture')";
                    $result1 = $con->query($sql);
                    $temp = '';
                    if (!$result1) {
                        echo '<script>alert("Lỗi Truy Vấn!")</script>';
                    } else {
                        $temp = 1;
                    }
                }
                ?>
                <?php
                if (!empty($temp)) {
                ?>
                    <div class="alert alert-success" style="width: 30%; margin: auto;">
                        <!-- <strong>Thêm Thành Công!</strong> -->
                    </div>
                <?php } ?>
                <!-- <img src="./photos/1651914641.jpg" alt=""> -->
                <h1 style="text-align: left;">Thêm Sản phẩm</h1>
                <div class="form-insert">
                    <form action="" method="post" enctype="multipart/form-data">
                        Tên<input type="text" class="form-control" id="text" name="name">
                        Giá<input type="number" class="form-control" id="number" name="price">
                        Ảnh<input type="file" class="form-control" id="file" name="photo">
                        <p>Mô Tả</p>
                        <textarea  name="description" id="" cols="50" rows="5"></textarea>
                        <?php
                        $sql = "select * from manufacture";
                        $result_manu = $con->query($sql);
                        ?>
                        <p>Nhà Sản Xuất</p>
                        <select name="id_manufacture" class="name-manufuture">
                            <?php foreach ($result_manu as $each_manu) : ?>
                                <option value="<?php echo $each_manu['id'] ?>"><?php echo $each_manu['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br>
                        <br>
                        <button type="submit" id="btn-insert" name="submit" class="btn btn-success">Thêm</button>
                    </form>
                </div>
                <h1>Danh Sách Sản Phẩm</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Nhà Sản Xuất</th>
                                <th>Photo</th>
                                <th>Mô Tả</th>
                                <th colspan="2">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "select product.*,manufacture.name as nam_manufacture 
                            from product INNER JOIN manufacture 
                            on product.id_manufacture=manufacture.id";
                            $result = mysqli_query($con, $sql);

                            foreach ($result as $each) { ?>
                                <tr>
                                    <td><?php echo $each['id']; ?></td>
                                    <td><?php echo $each['name']; ?></td>
                                    <td><?php echo $each['price']; ?></td>
                                    <td><?php echo $each['nam_manufacture']; ?></td>
                                    <td><img src="<?php echo $each['photo']; ?>" alt="img" height="80px"></td>
                                    <td><textarea style="outline: none;border: none;" name="" id="" cols="50" rows="5"><?php echo $each['description']; ?></textarea></td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-lg" id="btn-edit" style="background-color: #333;border-color: #333;" data-id="<?php echo $each['id'] ?>" data-toggle="modal" data-target="#ModalEdit">Sửa</button>
                                    </td>
                                    <td>
                                        <button type="button" id="btn-delete" data-id="<?php echo $each['id']; ?>" class="btn btn-danger">Xoá</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- modeal -->

                <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal<button> -->

                <!-- Modal -->
                <div class="modal fade" id="ModalEdit" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="alert alert-success" style="display: none;">
                                </div>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Sửa Sản Phẩm</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" id="fileinfo" name="fileinfo" onsubmit="return submitForm();">
                                    <p>
                                        Tên Sản Phẩm
                                        <input type="text" name="name_edit" style="width: 50%; height: 30px;">
                                    </p>
                                    <p>
                                        Giá Sản Phẩm
                                        <input type="number" name="price_edit" style="width: 50%; height: 30px;">
                                    </p>
                                    <input type="hidden" name="id">
                                    <input type="hidden" name="photo_old">
                                    <p>
                                        Mô Tả
                                        <textarea name="description_edit" cols="30" rows="5"></textarea>
                                    </p>
                                    <!-- address<input type="text" name="address"> -->
                                    <p>
                                        Giữ Ảnh Cũ
                                        <img src="" alt="img" id="img-photo-old" height="100px">
                                    </p>
                                    <p>

                                        <label>Hoặc Thay Ảnh Mới</label><br>
                                        <input type="file" name="file" />
                                    </p>
                                    <p>Nhà Sản Xuất
                                        <select name="id_manufacture_edit" class="name-manufacture-edit" style="width: 30%; height: 30px;">
                                            <?php foreach ($result_manu as $each_manu) : ?>
                                                <option value="<?php echo $each_manu['id'] ?>"><?php echo $each_manu['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </p>
                                    <input type="submit" style="width: 100px; height: 30px ; background-color: #333; color:white ;" value="Upload">
                                </form>
                                <div id="output"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end modal -->
                <!-- product -->
            </div>
        </div>
        <?php $con->close() ?>
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
        // $("#btn-delete").click(function() {

        // });
        $(document).on('click', '#btn-delete', function(e) {
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
                    // dataType: "dataType",
                    success: function(response) {
                        let parent_tr = btn.parents('tr');
                        parent_tr.remove();
                    }
                });
            }
        });
        $(document).on('click', '#btn-edit', function(e) {
            let id = $(this).data('id');
            // let btn = $(this);
            $.ajax({
                type: "get",
                url: "edit.php",
                data: {
                    id
                },
                // dataType: "dataType",
                success: function(response) {

                    let obj = JSON.parse(response);
                    $('input[name=name_edit]').val(obj.name);
                    $('input[name=price_edit]').val(obj.price);
                    $('input[name=id]').val(obj.id);
                    $('input[name=photo_old]').val(obj.photo);
                    $('textarea[name=description_edit]').val(obj.description);
                    $('#img-photo-old').attr('src', obj.photo);
                    $(".name-manufacture-edit option[value=" + obj.id_manufacture + "]").attr('selected', 'selected');
                }
            });
        });
    }); //jquery
    function submitForm() {
        console.log("submit event");
        var fd = new FormData(document.getElementById("fileinfo"));
        fd.append("label", "WEBUPLOAD");
        $.ajax({
            url: "process_update.php",
            type: "POST",
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false // tell jQuery not to set contentType
        }).done(function(data) {
            if (data == 1) {
                $(".alert-success").text("Thành Công!");
                $(".alert-success").show();
                setTimeout(function() {
                    $(".modal-backdrop,.modal").hide();
                    location.reload();
                }, 1000);
            } else {
                console.log('không thành công!');
            }
        });
        return false;
    }
</script>

</html>