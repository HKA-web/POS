<!-- CSS File -->

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
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.css'?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datepicker/datepicker3.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

<!--CSS File-->
<!-- ==================================================================================================================== -->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Supplier
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Supplier</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">

      <div class="box">
        <div class="box-header">
          <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add Supplier</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="tampilkan">
          <table id="example1" class="table table-striped" style="font-size:12px;">
            <thead>
            <tr>
                <th style="width:70px;">#</th>
                <th>KODE SUPPLIER</th>
                <th>NAMA SUPPLIER</th>
                <th>NO.TELP</th>
                <th style="text-align:right;">AKSI</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $no=0;
                  foreach ($data->result_array() as $i) :
                     $no++;
                             $kode=$i['kd_supplier'];
                             $nama=$i['nm_supplier'];
                             $tlp=$i['telpon'];

                          ?>
                      <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $kode;?></td>
                        <td><?php echo $nama;?></td>
                        <td><?php echo $tlp;?></td>
                        <td style="text-align:right;">
                              <a class="btn" data-toggle="modal" data-target="#ModalEdit" onclick="pilihDataEdit('<?php echo $kode;?>')"><span class="fa fa-pencil"></span></a>
                              <a class="btn" data-toggle="modal" data-target="#ModalHapus" onclick="pilihDataHapus('<?php echo $kode;?>')"><span class="fa fa-trash"></span></a>
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
<!-- ============================================= MODAL TAMBAH ========================================== -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Add Supplier</h4>
          </div>
          <!-- ========================================== FORM INPUT ================================= -->
          <form class="form-horizontal" id="input">

          <div class="modal-body">
              <div class="form-group">
                      <label for="inputUserName" class="col-sm-4 control-label">Kode Supplier</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" id="kd_supplier" placeholder="Otomatis">
                      </div>
                  </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama Supplier</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="nm_supplier" placeholder="Nama Supplier" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Telpon</label>
                  <div class="col-sm-7">
                    <input type="number" class="form-control" id="telpon" placeholder="085xxxxx" required>
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Alamat</label>
                  <div class="col-sm-7">
                    <textarea class="form-control" minlength="5" placeholder="Alamat" id="alamat"></textarea>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary btn-flat" id="simpan" value="Simpan" />
          </div>
          <!-- ========================================== FORM INPUT ==================================== -->
          </form>
      </div>
  </div>
</div>
<!-- ============================================= MODAL EDIT ========================================== -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Supplier</h4>
            </div>
            <form class="form-horizontal" id="update">           
            <!-- ===================================== FROM UPDATE ===================================== -->
            <div class="modal-body"  id="detail">
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary btn-flat" id="edit" value="Simpan" />
            </div>
            <!-- ===================================== FROM UPDATE =================================== -->
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
                <h4 class="modal-title" id="myModalLabel">Hapus Supplier</h4>
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

<!-- ===================================================================================================== -->
<!-- Jquery File-->

<!-- jQuery 2.2.3 -->
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
<script src="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'?>"></script>
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
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker4').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $(".timepicker").timepicker({
      showInputs: true
    });

  });
</script>
<!-- ================================================================================== -->
<!-- Ajax -->
<script>
  // MEMASUKKAN DATA BARU
  $(document).ready(function(){
      $('#input').on('submit',function(e){
          e.preventDefault();
          var kode    =$('#kd_supplier').val();
          var nama    =$('#nm_supplier').val();
          var tlp     =$('#telpon').val();
          var alamat  =$('#alamat').val();
          $.ajax({
             url :'<?php echo base_url();?>supplier/simpan',
             type:"post",
             data: 'kode='+kode+'&nama='+nama+'&tlp='+tlp+'&alamat='+alamat,
             beforeSend: function(){
                $("#simpan").val('Connecting...');
              },
              success: function(data){
                $("#myModal").modal('hide');
                $("#simpan").val('Simpan');
                view();
              }           
          });
        })
    })

  //MENAMPILKAN DATA
  function view() {
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url();?>supplier/data_supplier',
        success: function(data) {
        $('#tampilkan').html(data);
        }
    });
  }

  //MERUBAH DATA
  $(document).ready(function(){
      $('#update').on('submit',function(e){
          e.preventDefault();
          var kode    =$('#update_kd').val();
          var nama    =$('#update_nm').val();
          var tlp     =$('#update_tlp').val();
          var alamat  =$('#update_alamat').val();
          $.ajax({
             url :'<?php echo base_url();?>supplier/edit',
             type:"post",
             data: 'kode='+kode+'&nama='+nama+'&tlp='+tlp+'&alamat='+alamat,
             beforeSend: function(){
                $("#edit").val('Connecting...');
              },
              success: function(data){
                $(".modal").modal('hide');
                $("#edit").val('Simpan');
                view();
              }
                 
          });
      })
  })

  //MENGHAPUS DATA
  $(document).ready(function(){
      $('#delete').on('submit',function(e){
          e.preventDefault();
          var kode=$('#hapus_kd').val();
          $.ajax({
             url :'<?php echo base_url();?>supplier/hapus',
             type:"post",
             data: 'kode='+kode,
             beforeSend: function(){
                $("#hapus").val('Connecting...');
              },
              success: function(data){
                $(".modal").modal('hide');
                $("#hapus").val('Simpan');
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
      url: '<?php echo base_url();?>supplier/detail',
      success: function(data) {
      $('#detail').html(data)

      }
     });
  }

  //MEMILIH DATA UNTUK DIIHAPUS
  function pilihDataHapus(kode) {
    var kode=kode;

    $.ajax({
      type: 'GET',
      data: 'kode='+kode,
      url: '<?php echo base_url();?>supplier/detail_hapus',
      success: function(data) {
      $('#detail_delete').html(data)

      }
     });
  }
</script>