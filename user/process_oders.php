<?php 
    $name_recever = $_POST['name_recever'];
    $phone_recever = $_POST['phone_recever'];
    $address_recever = $_POST['address_recever'];
    $total_price = 0;
    $status = 0; // mới đặt
    // echo 1;
    session_start();
    $cart = $_SESSION['cart'];
    $id_customer = $_SESSION['id'];
    foreach($cart as $each) {
        $total_price += $each['price'] * $each['quantity'];
    }
    require '../admin/connect.php';
    $sql = "insert into oders(id, id_customer, name_recever, phone_recever, address_recever, status, total_price)
    values(null, '$id_customer', '$name_recever', '$phone_recever', '$address_recever', '$status', '$total_price')";
    mysqli_query($con,$sql);
    // thêm vào bảng oder-detail
    
    $sql = "select max(id) from oders where id_customer = '$id_customer'";
    $result =  mysqli_query($con,$sql);
    $order_id = $result->fetch_array()['max(id)'];
    // lấY product_id trong giỏ hàng để thêm vào oder-detail
    foreach ($cart as $product_id => $each) {
        $quantity = $each['quantity'];
        $sql = "insert into oder_detail(oder_id,product_id,quantity)
        values('$order_id','$product_id','$quantity')";
        $con->query($sql);
    }
    $con->close();
    unset($_SESSION['cart']);
    echo 1;
// header('location:./index.php');