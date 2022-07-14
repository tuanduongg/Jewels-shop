<?php 
date_default_timezone_set("Asia/Bangkok");
$arr = [];
// echo date('d');
$month = $_GET['month'];
$year = $_GET['year'];
if($month == date('m') && $year == date('Y')) {
    $days_of_month = date('d');
}else {
    $days_of_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
}
// echo "<br>";
for($i = 1; $i <= $days_of_month; $i++) {
    $day = $i . '/0'.$month; 
    $arr[$day] = 0;
}

// $sql = 'SELECT DATE_FORMAT(created_at, "%e/%m") as ngay,SUM(total_price) as doanh_thu FROM oders
// where MONTH(created_at) BETWEEN 1 and MONTH(CURRENT_DATE())
// and oders.status = 1
// GROUP by DATE_FORMAT(created_at, "%e/%m")';
$sql = 'SELECT DATE_FORMAT(created_at, "%e/%m") as ngay,SUM(total_price) as doanh_thu FROM oders
where Month(created_at) = '.$month.' AND YEAR(created_at) = '.$year.'
and oders.status = 1
GROUP by DATE_FORMAT(created_at, "%e/%m")';
// echo $sql;
// die;
require './connect.php';
$result = $con->query($sql);
if($result->num_rows == 0) {
    echo 1;
}else {

    foreach ($result as $each) {
        $arr[$each['ngay']] = (int)$each['doanh_thu'];
    }
    echo json_encode($arr);
}
// foreach ($result as $each) {
//     $arr[$each['ngay']] = (int)$each['doanh_thu'];
// }

