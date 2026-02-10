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
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datepicker/datepicker3.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

<!--CSS File-->
<!--=================================================================================================================-->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Laporan Periode Penjualan 
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Periode_penjualan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box">
          <div class="box-header">
            
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <div class="profile-info-row col-sm-5">
              <div class="profile-info-name"> Mulai Tanggal </div>

              <div class="profile-info-value">
                <span>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar bigger-110"></i>
                    </span>

                    <input type="text" class="form-control" id="tgl1" placeholder="yyyy-mm-dd" />
                  </div>
                </span>
              </div>
            </div>

            <div class="profile-info-row col-sm-1">
              <div style="margin-top: 20px">
               <button class="btn btn-default btn-md btn-block"><i class="fa fa-share"></i></button>
              </div>
            </div>

            <div class="profile-info-row col-sm-5">
              <div class="profile-info-name"> Sampai Tanggal </div>

              <div class="profile-info-value ">
                <span>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar bigger-110"></i>
                    </span>

                    <input type="text" class="form-control" id="tgl2" placeholder="yyyy-mm-dd" />
                  </div>
                </span>
              </div>
            </div>

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
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box box-primary">
          <div class="box-header">
            
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="tampilkan">
            <a href="laporan/TCPDF_periode_penjualan/<?php echo $param ?>" target="blank" class="btn btn-danger btn-flat pull-left"><i class="fa fa-print"></i> Cetak ke PDF <i class="fa fa-file-pdf-o"></i></a>
            <a href="laporan/PHPExcel_periode_penjualan/<?php echo $param ?>" class="btn btn-success btn-flat pull-right"><i class="fa fa-print"></i> Cetak ke EXCEL <i class="fa fa-file-excel-o"></i></a>
            <br><br>
            <table id="example1" class="table table-striped" style="font-size:12px;">
              <thead>
              <tr>
                  <th style="width:70px;">#</th>
                  <th>TANGGAL TRANSAKSI</th>
                  <th>NO.PENJUALAN</th>
                  <th>KODE BARANG</th>
                  <th>NAMA BARANG</th>
                  <th>JUMLAH</th>
                  <th>HARGA JUAL</th>
                  <th>SUB TOTAL</th>
              </tr>
              </thead>
              <tbody>
                  <?php
                  $no=0;
                  $st=0;
                  $t=0;
                    foreach ($data->result_array() as $i) :
                       $no++;
                               $tgl=$i['tgl_transaksi'];
                               $nop=$i['no_penjualan'];
                               $kode=$i['kd_barang'];
                               $nama=$i['nm_barang'];
                               $jml=$i['jumlah'];
                               $jual=$i['harga_jual'];
                        $st=$jml * $jual;
                        $t=$t+$st;
                            ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $tgl;?></td>
                          <td><?php echo $nop;?></td>
                          <td><?php echo $kode;?></td>
                          <td><?php echo $nama;?></td>
                          <td><?php echo $jml;?></td>
                          <td>Rp.<?php echo number_format($jual);?>,-</td>
                          <td>Rp.<?php echo number_format($st);?>,-</td>
                        </tr>
                <?php endforeach;?>
              </tbody>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b style="font-size: 20px"><i>Total Pendapatan :</i></b></td>
                <td></td>
                <td></td>
                <td><button class="btn btn-danger btn-xs btn-flat"><b>Rp.<?php echo number_format($t);?>,-</b></button></td>
              </tr>
            </table>
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
<script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'?>"></script>
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
  $('#tgl1').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
  $('#tgl2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
</script>
<!-- ============================================================================== -->
<!-- Ajax  -->
<script>
  $(document).on('change','#tgl2',function(){
    var tgl1=$('#tgl1').val();
    var tgl2=$(this).val();
    
    $.ajax({
      method:'GET',
      url: '<?php echo base_url();?>laporan/periodePej_param',
      data:'tgl1='+tgl1+'&tgl2='+tgl2,
      success:function(data){
        $('#tampilkan').html(data);
      }
    })
  })
</script>