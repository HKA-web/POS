<!--CSS File -->

  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

<!--CSS File-->
<!--=================================================================================================================-->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Laporan Stok Barang
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Stok_Brg</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <!-- /.row -->
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box">
          <div class="box-header">
            <a href="laporan/TCPDF_stok_barang" target="blank" class="btn btn-danger btn-flat pull-left"><i class="fa fa-print"></i> Cetak ke PDF <i class="fa fa-file-pdf-o"></i></a>
            <a href="laporan/PHPExcel_stok_barang" class="btn btn-success btn-flat pull-right"><i class="fa fa-print"></i> Cetak ke EXCEL <i class="fa fa-file-excel-o"></i></a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-striped" style="font-size:12px;">
              <thead>
              <tr>
                  <th style="width:70px;">#</th>
                  <th>KODE BARANG</th>
                  <th>NAMA BARANG</th>
                  <th>PESEDIAAN</th>
              </tr>
              </thead>
              <tbody>
                  <?php
                  $no=0;
                    foreach ($data->result_array() as $i) :
                       $no++;
                               $kode=$i['kd_barang'];
                               $nama=$i['nm_barang'];
                               $stk=$i['stok'];
                            ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $kode;?></td>
                          <td><?php echo $nama;?></td>
                          <?php 
                          if ($stk <=0) 
                          {
                            echo "<td class='btn btn-danger btn-flat btn-md'>".$stk."</td>"; 
                          }
                          elseif($stk > 0 AND $stk <=10)
                          {
                            echo "<td class='btn btn-warning btn-flat btn-md'>".$stk."</td>";
                          }
                          else
                          {
                            echo "<td class='btn btn-success btn-flat btn-md'>".$stk."</td>"; 
                          }
                          ?>
                          
                        </tr>
                <?php endforeach;?>
              </tbody>
            </table>
            <p><b>/* Catatan Penggunaan Warna Stok</b></p>
            <p><button class='btn btn-danger btn-flat btn-sm'>?</button> <i>Warna Merah melambangkan bahwa stock barang telah habis.</i></p>
            <p><button class='btn btn-warning btn-flat btn-sm'>?</button> <i>Warna kuning melambangkan bahwa stock barang telah memasuki jumlah minimum dan akan habis.</i></p>
            <p><button class='btn btn-success btn-flat btn-sm'>?</button> <i>Warna Hijau melambangkan bahwa stock barang masih banyak.</i></p>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

<!-- ===================================================================================================== -->
<!-- Jquery File-->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<!-- ============================================================================== -->
<!-- page script -->
<script>
  $("#example1").DataTable();
</script>
<!-- ============================================================================== -->
