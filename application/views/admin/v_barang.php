<!--CSS File -->
  
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datepicker/datepicker3.css'?>">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.css'?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2/select2.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">

<!--CSS File-->
<!--=================================================================================================================-->


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Barang
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Barang</a></li>
    <li class="active">Add Barang</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<form id="input">
  <!-- SELECT2 EXAMPLE -->
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Post Barang</h3>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-8">
          <input type="text" id="kd_barang" class="form-control" placeholder="Kode Barang" required/>
        </div>
        <!-- /.col -->
        <div class="col-md-4">
          <div class="form-group">
            <button type="button" class="btn btn-success btn-flat pull-right" data-toggle="modal" data-target="#myModal" onclick="view()" id="lihat"><span class="fa fa-eye"></span> Tampilkan</button>
            <input type="submit" class="btn btn-primary btn-flat btn-flat pull-left" id="simpan" value="Simpan Barang" />

            <button type="button" class="btn btn-warning btn-flat pull-left" onclick="clr()" style="margin-left: 4px"><span class="fa fa-undo"></span> Ulangi</button>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
  </div>
</div>
  <!-- /.box -->

  <div class="row">
    <div class="col-md-8">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title">Detail Barang</h3>
        </div>
        <div class="box-body">
          <div class="form-group col-sm-12">
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nm_barang" placeholder="Nama Barang" required>
                  </div>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" id="stok" placeholder="Jumlah Awal" required>
                  </div>
              </div>
              <br><br>
              <div class="form-group col-sm-12">
                  <div class="col-sm-5">
                    <input type="number" class="form-control" id="harga_beli" placeholder="Harga Beli" required>
                  </div>
                  <div class="col-sm-5">
                    <input type="number" class="form-control" id="harga_jual" placeholder="Harga Jual" required>
                  </div>
                  <div class="col-sm-2">
                    <input type="number" class="form-control" id="diskon" placeholder="Disc" required>
                  </div>
              </div>
              <br><br>
              <div class="form-group col-sm-12">
                  <div class="col-sm-12">
                    <textarea class="form-control" id="keterangan" placeholder="Keterangan Barang" style="max-width: 635px;min-height: 150px"></textarea>
                  </div>
              </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col (left) -->
    <div class="col-md-4">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Pengaturan Lainnya</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <select class="form-control select2" id="kd_kategori" style="width: 100%;" required>
              <option value="">-Pilih Kategori Barang-</option>
                  <?php
                  $no=0;
                  foreach ($kat->result_array() as $i) :
                     $no++;
                               $kategori_id=$i['kd_kategori'];
                               $kategori_nama=$i['nm_kategori'];

                            ?>
                          <option value="<?php echo $kategori_id;?>"><?php echo $kategori_nama;?></option>
                  <?php endforeach;?>
            </select>
          </div>
          
      <!-- /.box -->
    </div>
    <!-- /.col (right) -->
  </div>
  <!-- /.row -->
</form>
</section>
<!-- /.content -->

<!-- ============================================= MODAL DAFTAR BARANG ========================================== -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 75%;">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Daftar Barang</h4>
          </div>
          <form class="form-horizontal">
          <!-- ========================================== FORM DAFTAR BARANG ================================= -->
          <div class="modal-body" id="tampil">
              
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
          </div>
          <!-- ========================================== FORM DAFTAR BARANG ==================================== -->
          </form>
      </div>
  </div>
</div>
<!-- ============================================= MODAL HAPUS ========================================== -->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
            </div>
            <form class="form-horizontal" id="delete">
            <!-- ===================================== FROM HAPUS =================================== -->
            <div class="modal-body" id="detail_delete">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary btn-flat" id="hapus" value="Hapus" />
            </div>
            <!-- ===================================== FROM HAPUS =================================== -->
            </form>
        </div>
    </div>
</div>
<!-- ============================================= MODAL QRCODE ========================================== -->
<div class="modal fade" id="ModalQr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">QRCODE BARANG</h4>
            </div>
            <div class="modal-body" id="QRcode">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <!-- <input type="submit" class="btn btn-primary btn-flat" id="hapus" value="Hapus" /> -->
            </div>
        </div>
    </div>
</div>
<!-- ============================================= MODAL QRCODE ========================================== -->
<div class="modal fade" id="ModalBarcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">BARCODE BARANG</h4>
            </div>
            <div class="modal-body" id="barcode">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <!-- <input type="submit" class="btn btn-primary btn-flat" id="hapus" value="Hapus" /> -->
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
<!-- Select2 -->
<script src="<?php echo base_url().'assets/plugins/select2/select2.full.min.js'?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url().'assets/plugins/input-mask/jquery.inputmask.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/input-mask/jquery.inputmask.date.extensions.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/input-mask/jquery.inputmask.extensions.js'?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>

<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- Page script -->

<!-- ============================================================================== -->
<!-- page script -->
<script>
  $(function () {
    $(".select2").select2();
  });
</script>
<!-- Ajax  -->
<script>
  // MEMBERSIHKAN INPUTAN
  function clr() {
    document.getElementById("kd_barang").value = "";
    document.getElementById("nm_barang").value = "";
    document.getElementById("harga_beli").value = "";
    document.getElementById("harga_jual").value = "";
    document.getElementById("diskon").value = "";
    document.getElementById("keterangan").value = "";
    document.getElementById("kd_kategori").value = "";
    document.getElementById("stok").value = "";
  }

  // MEMASUKKAN DATA BARU
  $(document).ready(function(){
        $('#input').on('submit',function(e){
            e.preventDefault();
            var kode=$('#kd_barang').val();
            var nama=$('#nm_barang').val();
            var beli=$('#harga_beli').val();
            var jual=$('#harga_jual').val();
            var disc=$('#diskon').val();
            var ktr=$('#keterangan').val();
            var kkt=$('#kd_kategori').val();
            var stk=$('#stok').val();
            $.ajax({
               url :'<?php echo base_url();?>barang/simpan',
               type:"post",
               data: 'kode='+kode+'&nama='+nama+'&beli='+beli+'&jual='+jual+'&disc='+disc+'&ktr='+ktr+'&kkt='+kkt+'&stk='+stk,
               beforeSend: function(){
                  $("#simpan").val('Connecting...');
                },
                success: function(data){
                  $("#simpan").val('Simpan Barang');
                  clr();
                  view();
                  $("#myModal").modal('show');
                  
                }
                   
            });
        })
    })

  //MENAMPILKAN DATA
  function view() {
    $.ajax({
      type: 'GET',
      url: '<?php echo base_url();?>barang/data_barang',
      success: function(data) {
      $('#tampil').html(data);
      }
    });
  }

  //MENGHAPUS DATA
  $(document).ready(function(){
      $('#delete').on('submit',function(e){
          e.preventDefault();
          var kode=$('#hapus_kd').val();
          $.ajax({
             url :'<?php echo base_url();?>barang/hapus',
             type:"post",
             data: 'kode='+kode,
             beforeSend: function(){
                $("#hapus").val('Connecting...');
              },
              success: function(data){
                $("#hapus").val('Hapus');
                $("#ModalHapus").modal('hide');
                view();
              }
                 
          });
      })
  })

  // MEMILIH DATA UNTUK DI EDIT
  function pilihDataEdit (kode) {
    var kode=kode;

    $.ajax({
      type: 'GET',
      data: 'kode='+kode,
      url: '<?php echo base_url();?>barang/detail',
      success: function(data) {
      var json=data,
      obj = JSON.parse(json);
      $('#kd_barang').val(obj.kode);
      $('#nm_barang').val(obj.nama);
      $('#harga_beli').val(obj.beli);
      $('#harga_jual').val(obj.jual);
      $('#stok').val(obj.stk);
      $('#diskon').val(obj.disc);
      $('#keterangan').val(obj.ktr);
      $('#kd_kategori').val(obj.kkt);
      $("#myModal").modal('hide');
      }
     });
  }

  //MEMILIH DATA UNTUK DIIHAPUS
  function pilihDataHapus(kode) {
    var kode=kode;

    $.ajax({
      type: 'GET',
      data: 'kode='+kode,
      url: '<?php echo base_url();?>barang/detail_hapus',
      success: function(data) {
      $('#detail_delete').html(data)

      }
     });
  }

  //MEMILIH DATA QRCODE
  function pilihQrcode(kode) {
    var kode=kode;

    $.ajax({
      type: 'GET',
      data: 'kode='+kode,
      url: '<?php echo base_url();?>barang/Qrcode',
      success: function(data) {
      $('#QRcode').html(data)

      }
     }); 
  }

  //MEMILIH DATA BARCODE
  function pilihBarcode(kode) {
    var kode=kode;

    $.ajax({
      type: 'GET',
      data: 'kode='+kode,
      url: '<?php echo base_url();?>barang/Barcode',
      success: function(data) {
      $('#barcode').html(data)

      }
     }); 
  }
</script>