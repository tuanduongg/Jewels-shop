<!-- Modal -->
<div class="modal fade" id="myModal" id="ModalEdit" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content" style="width:160%;right:110px;">
            <div class="modal-header">
                <div class="alert alert-success alert-success-login" style="display: none;">
                    <strong>Thành Công!</strong>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h1 class="modal-title"></h1>
            </div>
            <div class="modal-body">
                <div class="info-cart">
                    <h4>
                        <strong>
                            Danh Sách Sản Phẩm
                        </strong>
                    </h4>

                    <table width="100%" id="table-product">

                        <?php
                        $total_price = 0;
                        if (empty($_SESSION['cart'])) { ?>
                            <p>Giỏ Hàng Trống</p>
                        <?php } else { ?>
                            <tbody id="tbody-product-cart">
                                <tr>
                                    <td>Mã</td>
                                    <td>Tên</td>
                                    <td>Ảnh</td>
                                    <td>Số Lượng</td>
                                    <td>Giá</td>
                                    <td>Thành Tiền</td>
                                    <td>Xoá</td>
                                </tr>
                                <?php
                                // if(!empty($_SESSION['cart'])) {
                                $cart = $_SESSION['cart'];
                                // $total_price = 0;
                                foreach ($cart as $id => $item) :
                                    $sum_price = $item['price'] * $item['quantity'];
                                    $total_price += $sum_price;
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $id ?>
                                        </td>
                                        <td>
                                            <?php echo $item['name'] ?>
                                        </td>
                                        <td>
                                            <img height="100px" src="../admin/product/<?php echo $item['photo'] ?>" alt="img">
                                        </td>
                                        <td>
                                            <?php echo $item['quantity'] ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($item['price'], 0, '', ','); ?>
                                        </td>
                                        <td>
                                            <?php echo number_format($sum_price, 0, '', ','); ?>
                                        </td>
                                        <td>
                                            <button type="button" id="btn-remove-product" data-id="<?php echo $id ?>" data-price="<?php echo $sum_price ?>" class="btn btn-danger">X</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <p>
                                <strong>
                                    Thanh Toán Khi Nhận Hàng
                                </strong>
                            </p>
                        <?php } ?>

                    </table>

                    <h4>
                        <strong>Tổng Tiền: <span id="span-total-price"><?php echo $total_price ?></span> vnđ</strong>
                    </h4>
                    <?php 
                        $id = $_SESSION['id'];
                        $sql = "select * from customer where id='$id'";
                        $result = $con->query($sql);
                        $each = $result->fetch_array();
                    ?>
                    <form id="form_pay" action="" method="post">
                        <div class="form-group">
                            <label for="exampleInputName">Tên Người Nhận:</label>
                            <input required type="text" name="name_recever" value="<?php echo $each['name'] ?>" class="form-control" placeholder="Enter name">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">SDT Người Nhận:</label>
                            <input required type="number" name="phone_recever" value="<?php echo $each['phone'] ?>" class="form-control" placeholder="Enter Phone Number">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Địa Chỉ Người Nhận:</label>
                            <input required type="text" name="address_recever" value="<?php echo $each['address'] ?>" class="form-control" placeholder="Enter Address">
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <button type="button" id="btn-create-oder" class="btn btn-primary" style="margin-left: 45%;">Lên Đơn</button>
                    </form>
                    <!-- body modal -->
                </div>
                <form id="form-login" action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputName">Nhập Tên</label>
                        <input required type="text" class="form-control" name="name" placeholder="Enter name">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <input required type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone">SDT</label>
                        <input required type="number" class="form-control" id="exampleInputPhone" name="phone" aria-describedby="emailHelp" placeholder="Enter Phone Number">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress">Địa Chỉ</label>
                        <input required type="text" class="form-control" id="exampleInputAddress" name="address" aria-describedby="emailHelp" placeholder="Enter Address">
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input required type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" name="remember_login" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck">Ghi Nhớ Tài Khoản</label>
                    </div>
                    <button type="button" id="btn-signin" style="display: none;" class="btn btn-primary">Login</button>
                    <button type="button" id="btn-signup" class="btn btn-primary">Signup</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn-show-signup" style="background-color: #333; color: white;" class="btn btn-default">Đăng Ký</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>