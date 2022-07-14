<?php 

$id = $_GET['id'];
require '../connect.php';
// $sql = "SELECT oder_detail.* , product.name,oders.total_price,product.price,product.photo from oder_detail 
// INNER JOIN oders on oders.id = oder_detail.oder_id
// INNER JOIN product ON oder_detail.product_id = product.id
// where oders.id = '$id'";
// $sql = "SELECT * from oder_detail INNER JOIN oders on oders.id = oder_detail.oder_id  where oders.id = '$id'
// GROUP by oder_detail.oder_id";
// $arr = [];
// if($result->num_rows == 0) {
    $sql = "select * from oders where id = '$id'";
// }
$result = $con->query($sql);
    // print_r($result);
    // die;
    $each = $result->fetch_array();
    $arr['name_recever'] = $each['name_recever'] ?? '';
    $arr['phone_recever'] = $each['phone_recever'] ?? '';
    $arr['address_recever'] = $each['address_recever'] ?? '';
    $arr['total_price'] = $each['total_price'] ?? '';
    $arr['created_at'] = $each['created_at'] ?? '';
    $arr['status'] = $each['status'] ?? '';
    $arr['id_customer'] = $each['id_customer'] ?? '';
    $sql = "SELECT * from oder_detail INNER JOIN product  on oder_detail.product_id = product.id  
WHERE oder_detail.oder_id = '$id'
GROUP by oder_detail.product_id";
// $arr = [];
$result2 = $con->query($sql);
// $each2 = $result2->fetch_array();
foreach($result2 as $each2) {
    // $arr['product'][$each2['product_id']]['product_id'] = $each2['product_id'];
    $arr['product'][$each2['product_id']]['name'] = $each2['name'];
    $arr['product'][$each2['product_id']]['id'] = $each2['id'];
    $arr['product'][$each2['product_id']]['quantity'] = $each2['quantity'];
    $arr['product'][$each2['product_id']]['photo'] = $each2['photo'];
    $arr['product'][$each2['product_id']]['price'] = $each2['price'];
}
echo json_encode($arr);
