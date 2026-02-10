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
  <!-- Jquery Print Area -->
  <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/JqueryPrintArea/jquery-ui-1.10.4.custom.css'?>" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/JqueryPrintArea/PrintArea.css'?>" /> 

<!--CSS File-->
<!--=================================================================================================================-->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Transaksi Pembelian
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Pembelian</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">

      <div class="box">
        <div class="box-header">
          <a class="btn btn-success btn-flat pull-left" data-toggle="modal" data-target="#ModalPEM" onclick="view()"><span class="fa fa-eye"></span> Tampilkan</a>
          <a class="btn btn-info btn-flat pull-right" href="<?php echo base_url().'halaman_pembelian'?>"><span class="fa fa-refresh"></span> Segarkan</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form id="input">
            <!-- ========================================== FORM INPUT ================================= -->
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">
                  <input type="text" id="nota" class="form-control" placeholder="Kode Beli" readonly="" value="otomatis" />
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control pull-right" id="tgl" required placeholder="yyyy-mm-dd" value="<?php echo $date?>">
                </div>    
              </div>
              <div class="row hide">
                <div class="col-md-12">
                  <input type="text" id="kd_barang" class="form-control" placeholder="Kode Barang"/>
                  <input type="text" id="stok" class="form-control" placeholder="Qty"/>
                  
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-3">
                  <input type="text" id="nm_barang" class="form-control" placeholder="Barang"  readonly=""/>
                </div>
                <div class="col-md-1">
                  <a class="btn btn-success btn-flat pull-left" data-toggle="modal" data-target="#myModal" onclick="viewBRG()"><span class="fa fa-search"></span> Cari</a>
                </div>
                <div class="col-md-4">
                  <input type="number" id="harga_beli" class="form-control" placeholder="Harga" required/>
                </div>
                <div class="col-md-4">
                  <input type="number" id="qty" class="form-control" placeholder="Jumlah" required/>
                </div>    
              </div>
              <br>
              <div class="row">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary btn-flat pull-left" id="tambah"><span class="fa fa-plus"></span> Tambah</button>
                  <button type="button" class="btn btn-warning btn-flat pull-right" onclick="clr()"><span class="fa fa-undo"></span> Ulangi</button>
                </div>    
              </div>
            </div>
            <!-- ========================================== FORM INPUT ================================= -->
          </form>
          <br>
          <!-- ============================================= KERANJANG =================================-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12" id="keranjang">
                <table id="example2" class="table table-striped" style="font-size:12px;">
                  <thead>
                  <tr>
                      <th style="width:70px;">#</th>
                      <th>KODE BARANG</th>
                      <th>NAMA BARANG</th>
                      <th>HARGA BELI</th>
                      <th>JUMLAH</th>
                      <th>SUBTOTAL</th>
                      <th style="text-align:right;">AKSI</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no=0;
                      $st=0;
                      $tot=0;
                        foreach ($tmp->result_array() as $i) :
                           $no++;
                                   $kode=$i['id']; 
                                   $kdb=$i['kd_barang']; 
                                   $nama=$i['nm_barang'];
                                   $beli=number_format($i['harga_beli']);
                                   $jml=$i['qty'];
                                   $st=$i['harga_beli'] * $i['qty'];
                                   $tot=$tot + $st;
                                ?>
                            <tr>
                              <td><?php echo $no;?></td>
                              <td><?php echo $kdb;?></td>
                              <td><?php echo $nama;?></td>
                              <td><?php echo $beli;?></td>
                              <td><?php echo $jml;?></td>
                              <td><?php echo number_format($st);?></td>
                              <td style="text-align:right;">
                                    <a class="btn" data-toggle="modal" data-target="#ModalEdit" onclick="pilihEdit('<?php echo $kode;?>','<?php echo $kdb;?>')"><span class="fa fa-pencil"></span></a>
                                    <a class="btn" data-toggle="modal" data-target="#Hapus" onclick="pilihDataHapus('<?php echo $kode;?>','<?php echo $kdb;?>')"><span class="fa fa-trash"></span></a>
                              </td>
                            </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
                <button type="button" class="col-md-2 btn btn-danger btn-flat pull-right" onclick="reset()"><span class="fa fa-trash"> Bersihkan Keranjang</span></button>
                <button type="button" class="col-md-10 btn btn-info btn-flat pull-left">TOTAL : Rp.<?= number_format($tot) ?>,- <span class="fa fa-money"></span></button>
                <br><br>
              </div>
            </div>
          </div>
          <!-- ============================================= KERANJANG =================================-->
          <div class="container-fluid">
            <div class="row">
              <form id="inputPEM">
                <div class="col-md-6">
                  <select class="form-control select2" id="kd_supplier" required>
                    <option value="">- Pilih Supplier -</option>
                    <?php 
                     foreach ($sup->result_array() as $i) :
                      $kode=$i['kd_supplier']; 
                      $nama=$i['nm_supplier']; 
                    ?>
                    <option value="<?php echo $kode?>"><?php echo $nama ?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                <div class="col-md-6">
                  <select class="form-control" id="kasir" readonly="">
                    <option value="<?php echo $uid?>"><?php echo $nm?></option>
                  </select>
                </div>    
                <br><br><br>
                <div class="col-sm-12">
                  <textarea class="form-control" id="catatan" placeholder="Catatan" style="min-height: 50px" required></textarea>
                </div>
                <br><br><br><br>
                <div class="col-sm-5 pull-right" id="simpanTran">
                  
                </div>
              </form>
            </div>
          </div>
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
<!-- ============================================= MODAL UPDATE ========================================== -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Rubah Jumlah Pembelian Barang</h4>
            </div>
            <form class="form-horizontal" id="update">           
            <!-- ===================================== FROM UPDATE ===================================== -->
            <div class="modal-body" id="detail">
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                <input type="submit" id="edit" value="Simpan" class="btn btn-primary btn-flat">
            </div>
            <!-- ===================================== FROM UPDATE =================================== -->
            </form>
        </div>
    </div>
</div>
<!-- ============================================= MODAL HAPUS ========================================== -->
<div class="modal fade" id="Hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">Hapus</h4>
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
<!-- ============================================= MODAL DATA PEMBELIAN ========================================== -->
<div class="modal fade" id="ModalPEM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 75%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                <h4 class="modal-title" id="myModalLabel">DATA TRANSAKSI PEMBELIAN</h4>
            </div>
            <div class="modal-body" id="data">
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- ============================================= MODAL DETAIL PEMBELIAN ========================================== -->
<div class="modal fade" id="ModaldPEM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
<script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'?>"></script>
<!-- Jquery Print Area -->
<script src="<?php echo base_url().'assets/JqueryPrintArea/jquery-ui-1.10.4.custom.js'?>"></script>
<script src="<?php echo base_url().'assets/JqueryPrintArea/jquery.PrintArea.js'?>" type="text/JavaScript" language="javascript"></script>
<!-- Page script -->
<!-- ============================================================================== -->
<!-- page script -->
<script>
  $(function () {
    $(".select2").select2();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

  $('#tgl').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
</script>
<!-- AJAX -->
<script>
  // MEMBERSIHKAN INPUTAN
  function clr() {
    document.getElementById("kd_barang").value = "";
    document.getElementById("nm_barang").value = "";
    document.getElementById("harga_beli").value = "";
    document.getElementById("stok").value = "";
    document.getElementById("qty").value = "";
    document.getElementById("kd_supplier").value = "";
    document.getElementById("catatan").value = "";
  }

  // MEMASUKKAN DATA BARU
  $(document).ready(function(){
        $('#input').on('submit',function(e){
            e.preventDefault();
            var kode=$('#kd_barang').val();
            var beli=$('#harga_beli').val();
            var stk=$('#qty').val();

            // var a = $('#stok').val();
            // var b = $('#qty').val();
            
            // var c = a-b;
            if (kode=='' || kode==null) 
            {
              alert('Pilih barang yang akan ditambahkan');
            }
            else if (stk <= 0) 
            {
              alert('Jumlah tidak boleh kurang dari 1');
            }

            else
            {
              $.ajax({
                 url :'<?php echo base_url();?>pembelian/tambah',
                 type:"post",
                 data: 'kode='+kode+'&beli='+beli+'&stk='+stk,
                 beforeSend: function(){
                    $('#tambah').addClass('disabled');
                  },
                  success: function(data){
                    $('#tambah').removeClass('disabled');
                    viewCart()
                    clr();
                    focus();
                  }
                     
              });  
            }
        })
    })

  // MEMASUKKAN DATA PEMBELIAN BARU
  $(document).ready(function(){
        $('#inputPEM').on('submit',function(e){
            e.preventDefault();
            var kode=$('#nota').val();
            var tanggal=$('#tgl').val();
            var catatan=$('#catatan').val();
            var supplier=$('#kd_supplier').val();
            var total=$('#total').val();
            var uid   =$('#kasir').val();
            $.ajax({
               url :'<?php echo base_url();?>pembelian/tambah_pembelian',
               type:"post",
               data: 'kode='+kode+'&tgl='+tanggal+'&ct='+catatan+'&sup='+supplier+'&t='+total+'&uid='+uid,
               beforeSend: function(){
                  $('#simpan').val('Connecting...');;
                },
                success: function(data){

                  $('#simpan').val('Simpan transaksi');
                  viewCart()
                  clr();
                  focus();
                  view();
                  $("#ModalPEM").modal('show');
                }
                   
            });
            
        })
    })

  //MENAMPILKAN DATA BARANG
  function viewBRG() {
    $.ajax({
      type: 'GET',
      url: '<?php echo base_url();?>barang/data_barang',
      success: function(data) {
      $('#tampil').html(data);
      }
    });
  }

  //MENAMPILKAN DATA KERANJANG
  function viewCart() {
    $.ajax({
      type: 'GET',
      url: '<?php echo base_url();?>pembelian/data_keranjang_beli',
      success: function(data) {
      $('#keranjang').html(data);
      focus();
      }
    });
  }

  //MERUBAH DATA
  $(document).ready(function(){
      $('#update').on('submit',function(e){
          e.preventDefault();
          var kode=$('#update_kd').val();
          var qty=$('#update_qty').val();
          
          $.ajax({
             url :'<?php echo base_url();?>pembelian/edit_tmp',
             type:"post",
             data: 'kode='+kode+'&qty='+qty,
             beforeSend: function(){
                $("#edit").val('Connecting...');
              },
              success: function(data){
                $(".modal").modal('hide');
                $("#edit").val('Simpan');
                viewCart();
                focus();
              }
                 
          });
          // ============================
      })
  })

  //MENAMPILKAN DATA KERANJANG
  function view() {
    $.ajax({
      type: 'GET',
      url: '<?php echo base_url();?>pembelian/data_beli',
      success: function(data) {
      $('#data').html(data);
      }
    });
  }

  //MENGHAPUS DATA TMP_PEMBELIAN
  $(document).ready(function(){
      $('#delete').on('submit',function(e){
          e.preventDefault();
          var kode=$('#hapus_kd').val();
          var kdb=$('#hapus_kdb').val();
          var qty=$('#hapus_qty').val();
          $.ajax({
             url :'<?php echo base_url();?>pembelian/hapus_tmpBRG',
             type:"post",
             data: 'kode='+kode+'&kdb='+kdb+'&qty='+qty,
             beforeSend: function(){
                $("#hapus").val('Connecting...');
              },
              success: function(data){
                $(".modal").modal('hide');
                $("#hapus").val('Hapus');
                viewCart();
                focus();
              }
                 
          });
      })
  })

  function dPembelian(kode) {
    var kode=kode;
    $.ajax({
      type: 'GET',
      data: 'kode='+kode,
      url: '<?php echo base_url();?>nota/nota_beli',
      success: function(data) {
      // $('#detail').html(data)
        $('#nomor').html(kode);
        $('#dNota').html(data);
      }
     });
  }

  function reset(){
   $.ajax({
      url: '<?php echo base_url();?>pembelian/tmp_reset',
      success: function(data) {
      viewCart();
      focus();
      }
     });
  }
  // MEMILIH DATA UNTUK DI EDIT
  function pilihEdit (kode,kdb) {
    var kode=kode;
    var kdb=kdb;
    $.ajax({
      type: 'GET',
      data: 'kode='+kode+'&brg='+kdb,
      url: '<?php echo base_url();?>pembelian/tmp_detail',
      success: function(data) {
      $('#detail').html(data)
      }
     });
  }

  // MEMILIH DATA UNTUK DI HAPUS
  function pilihDataHapus(kode,kdb) {
    var kode=kode;
    var kdb=kdb;
    $.ajax({
      type: 'GET',
      data: 'kode='+kode+'&brg='+kdb,
      url: '<?php echo base_url();?>pembelian/detail_hapus',
      success: function(data) {
      $('#detail_delete').html(data)
      }
     });
  }

  // MEMILIH DATA BARANG == FUNGSI INI DIPINJAM DI V_BARANG ==
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
      $('#stok').val(obj.stk);
      $("#myModal").modal('hide');
      }
     });
  }

  function focus() {
    $('#nm_barang').focus();
  }

  var refreshId=setInterval(function()
  {
    $('#simpanTran').load('<?php echo base_url();?>pembelian/btn_simpanTran');
  },1000);
</script>

  <script>
   $(document) .ready(function(){
    $("#printNota").click(function(){
      var mode='iframe';
      var close = mode =='popup';
      var options = { mode : mode, popClose : close};
      $(".container").printArea( options );
    })
   })
  </script>