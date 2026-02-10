<!--CSS File -->

  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
  <!-- Jquery Print Area -->
  <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/JqueryPrintArea/jquery-ui-1.10.4.custom.css'?>" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/JqueryPrintArea/PrintArea.css'?>" /> 
<!--CSS File-->
<!--=================================================================================================================-->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Histori Penjualan
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">historiJual</li>
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
          <table id="example1" class="table table-striped" style="font-size:12px;">
            <thead>
            <tr>
			          <th style="width:70px;">#</th>
                <th>NO.PENJUALAN</th>
                <th>TGL.TRANSAKSI</th>
                <th>NAMA PELANGGAN</th>
                <th>NAMA KASIR</th>
                <th style="text-align:right;">AKSI</th>
            </tr>
            </thead>
            <tbody>
		           <?php
                $no=0;
                  foreach ($data->result_array() as $i) :
                     $no++;
                             $kode=$i['no_penjualan'];
                             $tgl=$i['tgl_transaksi'];
                             $p=$i['pelanggan'];
                             $u=$i['nama'];

                          ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $kode;?></td>
                        <td><?php echo $tgl;?></td>
                        <td><?php echo $p;?></td>
                        <td><?php echo $u;?></td>
                        
                        <td style="text-align:right;">
                           <center><a class="btn btn-sm" data-toggle="modal" data-target="#Mymodal" onclick="detail('<?php echo $kode;?>')"><span class="fa fa-eye"></span></a></center>
                        </td>
                      </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<!-- ============================================= MODAL DETAIL PEMBELIAN ========================================== -->
<div class="modal fade" id="Mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 95%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">NOTA NOMOR <label><i id="nomor"></i></label></h4>
            </div>
            <div class="modal-body" id="dNota">
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-flat" id="printNota"><i class="fa fa-print"></i> Cetak Nota</button>
            </div>
        </div>
    </div>
</div>
<!-- ===================================================================================================== -->
<!-- Jquery File-->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<!-- Jquery Print Area -->
<script src="<?php echo base_url().'assets/JqueryPrintArea/jquery-ui-1.10.4.custom.js'?>"></script>
<script src="<?php echo base_url().'assets/JqueryPrintArea/jquery.PrintArea.js'?>" type="text/JavaScript" language="javascript"></script>
<!-- ============================================================================== -->
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
<!-- ============================================================================== -->
<!-- Ajax  -->
<script>
  function detail(kode) {
    var kode=kode;
    $.ajax({
      type: 'GET',
      url: '<?php echo base_url();?>nota/nota_jual/'+kode,
      success: function(data) {
      // $('#detail').html(data)
        $('#nomor').html(kode);
        $('#dNota').html(data);
      }
     });
  }

   $("#printNota").click(function(){
      var mode='iframe';
      var close = mode =='popup';
      var options = { mode : mode, popClose : close};
      $(".container").printArea( options );
    })
   
</script>