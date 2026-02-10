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
    Laporan Penjualan PerBulan
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Bulan_Penjualan</li>
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

            <div class="profile-info-row col-sm-3">
              <div class="profile-info-name"> Bulan </div>

              <div class="profile-info-value">
                <span>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar bigger-110"></i>
                    </span>

                     <select class="form-control" id="bulan">
                      <option value="">- Pilih Bulan</option>
                      <option value="01">January</option>
                      <option value="02">February</option>
                      <option value="03">March</option>
                      <option value="04">April</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">August</option>
                      <option value="09">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
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
              <div class="profile-info-name"> Tahun </div>

              <div class="profile-info-value ">
                <span>
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="fa fa-calendar bigger-110"></i>
                    </span>

                    <select class="form-control" id="tahun">
                      <option value="">- Pilih Tahun</option>
                      <?php 
                        for($i=date('Y');$i>=date('Y')-32;$i-=1)
                        {
                          echo '<option value='.$i.'>'.$i.'</option>';
                        }
                      ?>
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
            <a href="laporan/TCPDF_penjualan_perbulan/<?php echo $param ?>" target="blank" class="btn btn-danger btn-flat pull-left"><i class="fa fa-print"></i> Cetak ke PDF <i class="fa fa-file-pdf-o"></i></a>
            <a href="laporan/PHPExcel_penjualan_perbulan/<?php echo $param ?>" class="btn btn-success btn-flat pull-right"><i class="fa fa-print"></i> Cetak ke EXCEL <i class="fa fa-file-excel-o"></i></a>            
            <br><br>
            <table id="example1" class="table table-striped" style="font-size:12px;">
              <thead>
              <tr>
                  <th style="width:70px;">#</th>
                  <th>BULAN/TAHUN</th>
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
                               $bln=$i['tgl_transaksi'];
                               $thn=$i['tahun'];
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
                          <td><?php echo date('F', strtotime($bln)).'/'.$thn ;?></td>
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
</script>
<!-- ============================================================================== -->
<!-- Ajax  -->
<script>
  $(document).on('change','#tahun',function(){
    var bulan=$('#bulan').val();
    var tahun=$(this).val();

    $.ajax({
      method:'GET',
      url: '<?php echo base_url();?>laporan/jualBulan_param',
      data:'bulan='+bulan+'&tahun='+tahun,
      success:function(data){
        $('#tampilkan').html(data);
      }
    })
  })
</script>