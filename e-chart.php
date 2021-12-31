<?php include "header.php"; ?>
<?php include "band.php"; ?>
<?php
    $pdo = new PDO('mysql:host=localhost;dbname=fjcu_inn;charset=utf8', 'root', '');
    $year = date('Y');
    $month = date('m');
    // $today = date("Y-m-d",strtotime("-1 day"));
    // echo $today;
    $room_earn_per_month = array();
    $room_total = array();
    // echo "$year $month ";

    $sql = $pdo->query("select id, name, price from inn");
    foreach($sql as $sql){
        $r_id = $sql['id'];
        $name = $sql['name'];
        $price = $sql['price'];

        $sql2 = $pdo->query("select count(inn_style), inn_style from appointment_record 
            where year(a_time) = '$year' and month(a_time) = '$month' and inn_style = '$r_id' and status = '完成' ");
        foreach($sql2 as $sql2){
            $room_sum_temp = $sql2['count(inn_style)'];
        }

        // echo "$price $room_sum ";
        $room_earn_per_month[$name] = $price*$room_sum_temp;
        $room_total[$name] = $room_sum_temp;
    }
    $sql = NULl;
    $sql2 = NULL;
    // print_r($room_earn_per_month);
?>
<!-- Begin Page Content -->
<div class="container-fluid mt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">報表</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                本月營收冠軍房型</div>
                                <?php
                                    $champion = array_search(max($room_earn_per_month),$room_earn_per_month);
                                ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $champion ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-crown fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            豪華單人房</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">本月營收:
                                <?php echo "$".$room_earn_per_month['豪華單人房']; ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">入住次數:
                            <?php echo $room_total['豪華單人房']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            尊榮單人房</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">本月營收:
                                <?php echo "$".$room_earn_per_month['尊榮單人房']; ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">入住次數:
                                <?php echo $room_total['尊榮單人房']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            豪華雙人房</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">本月營收:
                                <?php echo "$".$room_earn_per_month['豪華雙人房']; ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">入住次數:
                                <?php echo $room_total['豪華雙人房']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            尊榮雙人房</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">本月營收:
                                <?php echo "$".$room_earn_per_month['尊榮雙人房']; ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">入住次數:
                                <?php echo $room_total['尊榮雙人房']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            貴賓聖心套房</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">本月營收:
                                <?php echo "$".$room_earn_per_month['貴賓聖心套房']; ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">入住次數:
                                <?php echo $room_total['貴賓聖心套房']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">本月收入</h6>
                    <div class="dropdown no-arrow">
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                    <div id="chart_m" style="width: 1000px; height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">本年份收入</h6>
                    <div class="dropdown no-arrow">
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                    <div id="chart_y" style="width: 1000px; height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    google.charts.load('current', { packages: ['corechart', 'bar'] });
        google.charts.setOnLoadCallback(drawRightY);

        function drawRightY() {
            var data = google.visualization.arrayToDataTable([
                [' ', '<?php echo $month; ?>月份'],
                ['豪華單人房', <?php echo $room_earn_per_month['豪華單人房']; ?>],
                ['尊榮單人房', <?php echo $room_earn_per_month['尊榮單人房']; ?>],
                ['豪華雙人房', <?php echo $room_earn_per_month['豪華雙人房']; ?>],
                ['尊榮雙人房', <?php echo $room_earn_per_month['尊榮雙人房']; ?>],
                ['貴賓聖心套房', <?php echo $room_earn_per_month['貴賓聖心套房']; ?>]
            ]);

            var materialOptions = {
                chart: {
                    title: '當月各房型營收',
                },
                hAxis: {
                    title: '金額',
                    minValue: 0,
                },
                vAxis: {
                    title: '類別'
                },
                bars: 'horizontal',
                axes: {
                    y: {
                        0: { side: 'right' }
                    }
                }
            };

            var materialChart = new google.charts.Bar(document.getElementById('chart_m'));
            materialChart.draw(data, materialOptions);
        }
</script>
<?php
    $year = date('Y');
    $chinese_year = $year - 1911;
    $room_earn_year = array();
    // echo $last_year;

    $y_sql = $pdo->query("select id, name, price from inn");
    foreach($y_sql as $y_sql){
        $y_r_id = $y_sql['id'];
        $y_name = $y_sql['name'];
        $y_price = $y_sql['price'];

        $y_sql2 = $pdo->query("select count(inn_style), inn_style from appointment_record 
            where year(a_time) = '$year' and inn_style = '$y_r_id' and status = '完成' ");
        foreach($y_sql2 as $y_sql2){
            $sum_temp = $y_sql2['count(inn_style)'];
        }

        $room_earn_year[$y_name] = $sum_temp * $y_price;
        // echo "$price $room_sum ";    
    }
    $y_sql = NULL;
    $y_sql2 = NULL;
?>
<script>
        google.charts.load('current', { packages: ['corechart', 'bar'] });
        google.charts.setOnLoadCallback(drawRightY);

        function drawRightY() {
            var data = google.visualization.arrayToDataTable([
                [' ', '<?php echo $chinese_year; ?>年'],
                ['豪華單人房', <?php echo $room_earn_year['豪華單人房']; ?>],
                ['尊榮單人房', <?php echo $room_earn_year['尊榮單人房']; ?>],
                ['豪華雙人房', <?php echo $room_earn_year['豪華雙人房']; ?>],
                ['尊榮雙人房', <?php echo $room_earn_year['尊榮雙人房']; ?>],
                ['貴賓聖心套房', <?php echo $room_earn_year['貴賓聖心套房']; ?>]
            ]);

            var materialOptions = {
                chart: {
                    title: '本年度個房型總營收',
                },
                hAxis: {
                    title: '金額',
                    minValue: 0,
                },
                vAxis: {
                    title: '類別'
                },
                bars: 'horizontal',
                axes: {
                    y: {
                        0: { side: 'right' }
                    }
                }
            };

            var materialChart = new google.charts.Bar(document.getElementById('chart_y'));
            materialChart.draw(data, materialOptions);
        }
    </script>
<?php include "footer.php"; ?>