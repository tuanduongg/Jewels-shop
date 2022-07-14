<?php 
session_start();
$id = $_GET['id'];
if (empty($_SESSION['cart'][$id])) { // nếu k có sản phẩm trong giỏ thì lấy thông tin trong database
    require '../admin/connect.php';
    $sql = "select * from product where id = '" . $id . "'";
    $result = $con->query($sql);
    $each = $result->fetch_array();
    $_SESSION['cart'][$id]['name'] = $each['name'];
    $_SESSION['cart'][$id]['photo'] = $each['photo'];
    // $_SESSION['cart'][$id]['photo'] = $each['photo'];
    $_SESSION['cart'][$id]['price'] = $each['price'];
    $_SESSION['cart'][$id]['quantity'] = $quantity;
}
$type = $_GET['type'];
if($type === 'decre') {

    if($_SESSION['cart'][$id]['quantity'] > 1) {
        $_SESSION['cart'][$id]['quantity']--;
    }else {
        unset($_SESSION['cart'][$id]);
    }
}else {
    
    $_SESSION['cart'][$id]['quantity']++;
}
// header('location:view_cart.php');