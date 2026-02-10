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
    Laporan Barang Per Kategori
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Bulan_Pembelian</li>
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
              <div class="profile-info-name"> Kategori </div>

              <div class="profile-info-value">
                <span>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="fa fa-tag bigger-110"></i>
                    </span>

                   <select class="form-control" id="kd_kategori">
                    <option value="">- Pilih kategori -</option>
                    <?php 
                     foreach ($kat->result_array() as $i) :
                      $kode=$i['kd_kategori']; 
                      $nama=$i['nm_kategori']; 
                    ?>
                    <option value="<?php echo $kode?>"><?php echo $nama ?></option>
                    <?php endforeach;?>
                  </select>

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
      <div class="box box-primary">
        <div class="box box-primary">
          <div class="box-header">
           
          </div>
          <!-- /.box-header -->
          <div class="box-body" id="tampilkan">
            <a href="laporan/TCPDF_kategori_barang/<?php echo $param ?>" target="blank" class="btn btn-danger btn-flat pull-left"><i class="fa fa-print"></i> Cetak ke PDF <i class="fa fa-file-pdf-o"></i></a>
            <a href="laporan/PHPExcel_kategori_barang/<?php echo $param ?>" class="btn btn-success btn-flat pull-right"><i class="fa fa-print"></i> Cetak ke EXCEL <i class="fa fa-file-excel-o"></i></a>
            <br><br>
            <table id="example1" class="table table-striped" style="font-size:12px;">
              <thead>
              <tr>
                  <th style="width:70px;">#</th>
                  <th>KODE BARANG</th>
                  <th>NAMA BARANG</th>
                  <th>KODE KATEGORI</th>
                  <th>NAMA KATEGORI</th>
              </tr>
              </thead>
              <tbody>
                  <?php
                  $no=0;
                    foreach ($data->result_array() as $i) :
                       $no++;
                               $kode=$i['kd_barang'];
                               $nama=$i['nm_barang'];
                               $kat=$i['nm_kategori'];
                               $kodekat=$i['kd_kategori'];
                            ?>
                        <tr>
                          <td><?php echo $no;?></td>
                          <td><?php echo $kode;?></td>
                          <td><?php echo $nama;?></td>
                          <td><?php echo $kat?></td>
                          <td><?php echo $kat?></td>
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
<!-- Ajax  -->
<script>
  $(document).on('change','#kd_kategori',function(){
    var kode=$(this).val();
    
    $.ajax({
      method:'GET',
      url: '<?php echo base_url();?>Laporan/katBrg_param',
      data:'kode='+kode,
      success:function(data){
        $('#tampilkan').html(data);
      }
    })

  })
</script>