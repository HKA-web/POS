<!-- CSS File -->

  <!-- Tell the browser to be responsive to screen width -->
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- Ionicons -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">

<!--CSS File-->
<?php
    error_reporting(0);
    /* Mengambil query report*/
    foreach($data as $result){
        $bulan[] = $result->tgl; //ambil bulan
        $value[] = (float) $result->jumlah; //ambil nilai
    }
    /* end mengambil query*/

?>
<!--=================================================================================================================-->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- Info boxes -->
  <div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-briefcase"></i></span>
         
        <div class="info-box-content">
          <span class="info-box-text">BARANG</span>
          <span class="info-box-number"><?php echo $barang ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-tag"></i></span>
        
        <div class="info-box-content">
          <span class="info-box-text">KATEGORI</span>
          <span class="info-box-number"><?php echo $kategori ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
       
        <div class="info-box-content">
          <span class="info-box-text">SUPPLIER</span>
          <span class="info-box-number"><?php echo $supplier ?></span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">GRAFIX PENJUALAN BULAN <?php echo strtoupper(date('F'));?> <?php echo date('Y');?></h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">

              <div class="col-md-12">
                      <canvas id="canvas" width="1000" height="280"></canvas>
              </div>
              <!-- /.chart-responsive -->
            </div>
            <!-- /.col -->

            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- ./box-body -->

        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <div class="col-md-8">
      <!-- MAP & BOX PANE -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">PRESENTASE LABA 5 TAHUN TERAKHIR</h3>
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="col-md-12 col-xs-12" id="donut">
                      
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
        </div>

        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- /.box -->
    </div>
    <!-- /.col -->

    <div class="col-md-4">
      <!-- Info Boxes Style 2 -->
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-pie-chart"></i></span>
        <?php
            $query=$this->db->query("SELECT * FROM view_labarugi ORDER BY tahun DESC limit 1");
            $data=$query->row();
            $hitung=$data->jual-$data->beli;
        ?>
        <div class="info-box-content">
          <span class="info-box-text">Laba tahun <?php  echo date('Y'); ?></span>
          <?php 
          if ($hitung>0) 
          {
            echo '<span class="info-box-number">'.number_format(abs($hitung)).',-</span>';
          }
          else
          {
            echo '<span class="info-box-number">0,-</span>';
          }
          ?>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
              <span class="progress-description">
                Rupiah
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="fa fa-area-chart"></i></span>
        <?php
            $query=$this->db->query("SELECT * FROM view_labarugi ORDER BY tahun DESC limit 1");
            $data=$query->row();
            $hitung=$data->jual-$data->beli;
        ?>
        <div class="info-box-content">
          <span class="info-box-text">Rugi tahun <?php  echo date('Y'); ?></span>
          <?php 
          if ($hitung>0) 
          {
           echo '<span class="info-box-number">0,-</span>'; 
          }
          else
          {
            echo '<span class="info-box-number">'.number_format(abs($hitung)).',-</span>';
          }
          ?>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
              <span class="progress-description">
                Rupiah
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-yellow">
        <span class="info-box-icon"><i class="fa fa-money"></i></span>
        <?php
            $query=$this->db->query("SELECT * FROM penjualan WHERE DATE_FORMAT(tgl_transaksi,'%m%y')=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH),'%m%y')");
            $data=$query->row();
        ?>
        <div class="info-box-content">
          <span class="info-box-text">Pendapatan Bulan Lalu</span>
          <span class="info-box-number"><?php echo number_format($data->total);?>,-</span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
              <span class="progress-description">
                Rupiah
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
      <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="glyphicon glyphicon-euro"></i></span>
        <?php
            $query=$this->db->query("SELECT * FROM penjualan WHERE DATE_FORMAT(tgl_transaksi,'%m%y')=DATE_FORMAT(CURDATE(),'%m%y')");
            $data=$query->row();
        ?>
        <div class="info-box-content">
          <span class="info-box-text">Pendapatan Bulan Ini</span>
          <span class="info-box-number"><?php echo number_format($data->total);?>,-</span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
              <span class="progress-description">
                Rupiah
              </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->

      <!-- PRODUCT LIST -->

      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<!--=================================================================================================================-->
<!-- Jquery File-->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url().'assets/plugins/sparkline/jquery.sparkline.min.js'?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url().'assets/plugins/chartjs/Chart.min.js'?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url().'assets/dist/js/pages/dashboard2.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<!-- Highcharts -->
<script src="<?php echo base_url().'assets/highcart/highcharts.js'?>"></script>
<script src="<?php echo base_url().'assets/highcart/exporting.js'?>"></script>
<!-- Jquery File-->
<script>

  var lineChartData = {
      labels : <?php echo json_encode($bulan);?>,
      datasets : [

          {
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(152,235,239,1)",
              data : <?php echo json_encode($value);?>
          }

      ]

  }

var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);

var canvas = new Chart(myLine).Line(lineChartData, {
  scaleShowGridLines : true,
  scaleGridLineColor : "rgba(0,0,0,.005)",
  scaleGridLineWidth : 0,
  scaleShowHorizontalLines: true,
  scaleShowVerticalLines: true,
  bezierCurve : true,
  bezierCurveTension : 0.4,
  pointDot : true,
  pointDotRadius : 4,
  pointDotStrokeWidth : 1,
  pointHitDetectionRadius : 2,
  datasetStroke : true,
  tooltipCornerRadius: 2,
  datasetStrokeWidth : 2,
  datasetFill : true,
  legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
  responsive: true
});

</script>

<script>
  // Radialize the colors
Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});

// Build the chart
Highcharts.chart('donut', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                },
                connectorColor: 'silver'
            }
        }
    },

    series: [{
        name: 'Presentase Laba',
        data: [
            <?php 
            foreach ($laba->result_array() as $row) {
                $tahun = $row['tahun'];
                $hitung=$row['jual']-$row['beli'];

                ?>{ name: 'Tahun: <?php echo $tahun?>', y: <?php echo $hitung?> },<?php
            }
            ?>
        ]
    }]
});
</script>