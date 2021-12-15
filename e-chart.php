<?php include "header.php"; ?>
<?php include "band.php"; ?>

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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">尊榮雙人房</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">本月營收:$11000</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">入住次數:11</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">本月營收:$1500</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">入住次數:1</div>
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
                            豪華雙床房</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">本月營收:$1500</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">入住次數:1</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">本月營收:$30000</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">入住次數:15</div>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">本月營收:$2500</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">入住次數:1</div>
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
                [' ', '11月份'],
                ['豪華單人房', 11000],
                ['尊榮單人房', 1500],
                ['豪華雙床房', 1500],
                ['尊榮雙人房', 30000],
                ['貴賓聖心套房', 2500]
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
<script>
        google.charts.load('current', { packages: ['corechart', 'bar'] });
        google.charts.setOnLoadCallback(drawRightY);

        function drawRightY() {
            var data = google.visualization.arrayToDataTable([
                [' ', '110年'],
                ['豪華單人房', 38155],
                ['尊榮單人房', 587940],
                ['豪華雙床房', 39155],
                ['尊榮雙人房', 89155],
                ['貴賓聖心套房', 91505]
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