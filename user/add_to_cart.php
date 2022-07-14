<?php
// làm việc với sission

//TH1:khi chưa có gì trong giỏ hàng=> thếm sản phầm vào
//TH2:Khi có gì trong giỏ hàng:
// tìm trong giỏ hàng có  sản phẩm chưa ?
// nếu có trong giỏ rồi thì tằng số lượng lên 1
//nếu chưa thì thêm vào
/* 
[
    7=>[
        'name'=> 'xiaomi',
        'quanity' => 2,
        'photo' => 'abc.png',
        'price' => 123
    ],
    8=>[
        'name'=> 'xiaomi tàu',
        'quanity' => 4,
        'photo' => 'cdf.png',
        'price' => 344
        ]
        ]
        */
try {
    session_start();
    // if(empty($_GET['id'])) {
    //     throw new Exception('Không Tồn Tại ID');
    // }
    $id = $_GET['id'];
    $quantity = (int)$_GET['quantity'];
    if (empty($_SESSION['cart'][$id]) || !isset($_SESSION['cart'][$id])) { // nếu k có sản phẩm trong giỏ thì lấy thông tin trong database
        require '../admin/connect.php';
        $sql = "select * from product where id = '" . $id . "'";
        $result = $con->query($sql);
        $each = $result->fetch_array();
        $_SESSION['cart'][$id]['name'] = $each['name'];
        $_SESSION['cart'][$id]['photo'] = $each['photo'];
        $_SESSION['cart'][$id]['price'] = $each['price'];
        $_SESSION['cart'][$id]['quantity'] = $quantity;
    } else { // nếu có rồi thì tăng số lượng lên 1
        $_SESSION['cart'][$id]['quantity']++;
    }
    // echo json_encode($_SESSION['cart']);
    echo 1;
    // header('location: index.php');
    // echo '<pre>';
    // print_r($_SESSION['cart']);
    // echo '</pre>';
} catch (\Throwable $th) {
    echo $th->getMessage();
}
