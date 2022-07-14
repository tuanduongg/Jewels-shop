<?php include '../user/head.php'; ?>

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
                    <li><a href="#" class="active">Trang Chủ</a></li>
                    <li><a href="./oders/index.php">Đơn Hàng</a></li>
                    <li><a href="./customer/index.php">Tài Khoản</a></li>
                    <li><a href="./product/index.php">Sản Phẩm</a></li>
                    <li><a href="./manufacture/index.php">Nhà Sản Xuất</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <?php
            require './connect.php';
            $sql = "select count(*) from customer";
            $result = mysqli_query($con, $sql);
            $each = $result->fetch_array();
            ?>
            <div class="statistical">
                <div class="card-statis">
                    <h2 class="card-statis-number">
                        <i class='fas fa-users'></i>
                        <?php echo $each['count(*)'] ?>
                    </h2>
                    <div class="card-statis-desc">
                        Người Dùng Hệ Thống
                    </div>
                </div>
                <div class="card-statis">
                    <h2 class="card-statis-number">
                        <i class="fas fa-dollar-sign"></i>
                        <?php
                        // $sql1 = "set global sql_mode='';";
                        // $con->query($sql1) ;
                        $sql = "select SUM(oders.total_price) as sum_total, MONTH(created_at) as month_cre,year(created_at) as year_cre from oders
                        where MONTH(created_at)=MONTH(now())
                        and YEAR(created_at)=YEAR(now())
                        and oders.status = 1;";
                        $result = $con->query($sql) ;
                        $each = $result->fetch_array();
                        
                        ?>
                        <?php echo number_format($each['sum_total'], 0, '', ',') ?>
                    </h2>
                    <div class="card-statis-desc">
                        Doanh Thu Trong Tháng <?php echo ($each['month_cre']) . '/' . ($each['year_cre']) ?>
                    </div>
                </div>
                <div class="card-statis">
                    <h2 class="card-statis-number">
                        <i class="fas fa-truck"></i>
                        <?php
                        $sql = "select count(*) from oders;";
                        $result = mysqli_query($con, $sql);
                        $each = $result->fetch_array();
                        echo $each['count(*)'];
                        ?>
                    </h2>
                    <div class="card-statis-desc">
                        Đơn Hàng Đã Được Tạo
                    </div>
                </div>
                <div class="card-statis">
                    <h2 class="card-statis-number">
                        <i class="fas fa-gem"></i>
                        <?php
                        $sql = "select count(*) from product;";
                        $result = mysqli_query($con, $sql);
                        $each = $result->fetch_array();
                        echo $each['count(*)'];
                        ?>
                    </h2>
                    <div class="card-statis-desc">
                        Sản Phẩm Đang Được Bán
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-chart" style=" width: 70%;margin: auto;margin-top: 20px;">
            <p> <strong>Thống Kê Doanh Thu Theo Tháng</strong> </p>
            <p>
                Chọn Tháng:
                <input type="number" id="month" value="<?php echo date('n') ?>" name="month">
            </p>
            <p>
                Chọn Năm:
                <input type="number" id="year" value="<?php echo date('Y') ?>" name="year">
            </p>
            <p><button type="button" id="btn-statis" class="btn btn-success">Thống Kê</button></p>
        </div>
        <div id="chart"></div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    // const currentMonth = new Date().getMonth() + 1;
    // let month = currentMonth;
    // const currentYear = new Date().getFullYear();
    // let year = currentYear;
    // ajax
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".col").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        var month = new Date().getMonth() + 1;
        var year = new Date().getFullYear();
        getData(month, year);
       

        // $("#month,#year").on('keyup', function() {
        //     let month = $("#month").val();
        //     let year = $("#year").val();
        //     getData(month,year);

        // });

        $(document).on('click', '#btn-statis', function(e) {
            month = $("#month").val();
            year = $("#year").val();
            getData(month, year);
        });

        function getData(month, year) {
            $.ajax({
                // type: "get",
                url: "get_doanh_thu.php",
                data: {
                    month,
                    year
                },
                dataType: "json",
                success: function(response) {
                    // console.log(response);
                    if (response == 1) {
                        alert('Không Có Dữ Liệu');
                        // $("#chart").text('Không Có Dữ Liệu')
                    } else {
                        var result = Object.entries(response);
                        // console.log(result);
                        Highcharts.chart('chart', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Thống kê doanh thu tháng ' + month + '/' + year + ''
                            },
                            xAxis: {
                                type: 'category',
                                labels: {
                                    rotation: -45,
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }
                                }
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Doanh Thu'
                                }
                            },
                            legend: {
                                enabled: false
                            },

                            series: [{
                                name: 'Total Price',
                                data: result,
                                dataLabels: {
                                    enabled: true,
                                    rotation: -90,
                                    color: '#FFFFFF',
                                    align: 'right',
                                    format: '{point.y}', // one decimal
                                    y: 10, // 10 pixels down from the top
                                    style: {
                                        fontSize: '13px',
                                        fontFamily: 'Verdana, sans-serif'
                                    }
                                }
                            }]
                        });
                    }
                }
            });
        }

        // let month = $("#month").val();
        // let year = $("#year").val();

       
        // ready
    });

</script>

</html>