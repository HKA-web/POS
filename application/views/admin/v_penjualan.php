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
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.css'?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datepicker/datepicker3.css'?>">
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
    Transaksi Penjualan
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Penjualan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-xs-3">
      <div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title">Informasi Nota</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <input type="text" class="form-control" placeholder="No.Nota" value="Otomatis" readonly/>
            </div>
            <!-- /.col -->
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <input type="text" class="form-control" id="tgl" required placeholder="yyyy-mm-dd" value="<?php echo $date?>">
            </div>
            <!-- /.col -->
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <select class="form-control" id="kasir" readonly="">
                <option value="<?php echo $uid?>"><?php echo $nm?></option>
              </select>
            </div>
            <!-- /.col -->
          </div>
        </div>
        <!-- /.box-body -->  
      </div>
      <!-- /.col -->  
      <div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title">Informasi Pelanggan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <input type="text" class="form-control" id="pembeli" required placeholder="Nama Pelanggan" value="Umum">
            </div>
            <!-- /.col -->
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <textarea class="form-control" placeholder="Catatan Transaksi" id="ct">Lunas</textarea>
            </div>
            <!-- /.col -->
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title">Informasi Pembayaran</h3>
        </div>
        <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Bayar" id="bayar" />
              </div>
              <!-- /.col -->
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Kembalian" id="kembalian" readonly />
              </div>
              <!-- /.col -->
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <button id="simpan" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-flat btn-md btn-block"><i class="fa fa-save"></i> Simpan</button>
              </div>
              <!-- /.col -->
            </div>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- ====================== -->
    <div class="col-xs-9">
      <div class="box box-warning">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="tampil_total">
          
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>
    <div class="col-xs-9">
      <div class="box box-danger">
        <div class="box-header with-border">
          
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="live_data">
          
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.col -->
    </div>
  </div>
  <!-- ============================================= MODAL NOTA BAYAR ========================================== -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width: 95%;">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Detail Nota</h4>
          </div>
          <form class="form-horizontal">
          <div class="modal-body" id="nota_bayar">
             
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-flat" id="printNota"><i class="fa fa-print"></i> Cetak Nota</button>
          </div>
          </form>
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
<!-- Jquery Print Area -->
<script src="<?php echo base_url().'assets/JqueryPrintArea/jquery-ui-1.10.4.custom.js'?>"></script>
<script src="<?php echo base_url().'assets/JqueryPrintArea/jquery.PrintArea.js'?>" type="text/JavaScript" language="javascript"></script>
<script>
$('#tgl').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd'
  });
$(document).ready(function(){  
    function fetch_data()  
    {
        $.ajax({  
            url:"<?php echo base_url();?>penjualan/tmp_jual", 
            method:"POST",  
            success:function(data){  
            $('#live_data').html(data);
            $('#kd_barang').focus();
            $('#bayar').val(0);
            $('#kembalian').val('');
            $('#simpan').addClass('hide');
            }  
        });
    }  
    fetch_data();  
    $(document).on('click','#simpan',function(){
      var tgl   =$('#tgl').val();
      var uid   =$('#kasir').val();
      var p     =$('#pembeli').val();
      var ct    =$('#ct').val();
      var t     =$('#total').val();
      if (uid=='' || tgl=='')
      {
        alert('Data belum lengkap!'); 
        return false;
      }
      else
      {
        $.ajax({  
            url:"<?php echo base_url();?>penjualan/simpanTran",  
            method:"POST",  
            data:{tgl:tgl, uid:uid, p:p, ct:ct, t:t},  
            dataType:"text",
            success:function(data)
            { 
              var json=data,
              obj = JSON.parse(json);
              last(obj.kode);
              fetch_data();
            }  
        });
      }
    })
    function last(kode) {
      var kode=kode;
      var refreshId=setInterval(function(){
        $('#nota_bayar').load('<?php echo base_url();?>nota/nota_jual/'+ kode);
      },1000);
      
    }
    $(document).on('click', '#btn_add', function(){  
        var kode = $('#kd_barang').val();  
        var qty = $('#qty').val();  
        var hj = $('#harga_jual').val();  
        if(kode == '')  
        {  
            alert("Masukkan kode barang");  
            $('#kd_barang').focus();
            return false;  
        }  
        if(qty <= 0)  
        {  
            alert("Masukkan jumlah paling sedikit 1");  
            $('#qty').focus();
            return false;  
        }  
        $.ajax({  
            url:"<?php echo base_url();?>penjualan/simpan",   
            method:"POST",  
            data:{kode:kode, qty:qty, hj:hj},  
            dataType:"text",  
            success:function(response){
               if(response=="berhasil")
               {
                fetch_data();
               }
               else
               {
                alert(response);
                $('#qty').focus();
               }
            }  
        })  
    });  
    
  function edit_data(id, text, column_name, kode)  
    {  
        $.ajax({  
            url:"<?php echo base_url();?>penjualan/edit",   
            method:"POST",  
            data:{id:id, text:text, column_name:column_name, kode:kode},  
            dataType:"text",  
            success:function(response){
              if(response=="berhasil")
               {
                fetch_data();
               }
               else
               {
                alert(response);
                fetch_data();
               }
            }  
        });  
    }  
    $(document).on('blur', '.edit_qty', function(){  
        var kd = $(this).data("id1");  
        var id = $(this).data("id2");  
        var qty = $(this).val();
        if (qty=='') 
        {
          alert('Jangan Kosong');
          fetch_data();
        }
        else
        {
          edit_data(id,qty, "qty",kd);  
        }
        
    });
    $(document).on('click', '.btn_delete', function(){  
        var id=$(this).data("id3");
        if(confirm("Apakah Anda yakin mau menghapus barang ?"))  
        {
            $.ajax({  
                url:"<?php echo base_url();?>penjualan/hapus",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){ 
                  fetch_data();  

                }  
            });  
        }  
    });  
});
$(document).on('keyup', '#bayar', function(){  
    var bayar = parseInt($(this).val());
    var total = parseInt($('#total').val()); 
    var hitung = bayar - total;
    $('#kembalian').val(hitung);
    var k=$('#kembalian').val();
    if (k=='NaN' || k < 0) 
    {
      $('#simpan').addClass('hide');
    }
    else
    {
     $('#simpan').removeClass('hide'); 
    }

}); 
  function generate () {
    var kode = $('#kd_barang').val();  
    $.ajax({
      type: 'GET',
      data: 'kode='+kode,
      url:"<?php echo base_url();?>penjualan/otomatis_field", 
      beforeSend: function(){
        $('.harga_jual').html("");
        $('.nm_barang').html("");
        $('#qty').val('');
        document.getElementById('qty').readOnly = true;
      },
      success: function(data) {
      var json=data,
      obj = JSON.parse(json);
      $('#harga_jual').val(obj.jual);

      var hj="Rp." + obj.view_jual + ",-";

      $('.harga_jual').html(hj);
      $('.nm_barang').html(obj.nama);
      $('#qty').val(1);
      document.getElementById('qty').readOnly = false;
      hitung();
      $('#qty').focus();
      // console.log(obj.jual);
      }
     });
  }
  
  function hitung() {
    var a=parseInt($('#qty').val());
    var b=parseInt($('#harga_jual').val());
    var c= (a * b);
    $('#sTotal').html(c);
  }

  var refreshId=setInterval(function()
  {
    $('#tampil_total').load('<?php echo base_url();?>penjualan/view_total');
  },1000);

  $(document) .ready(function(){
    $("#printNota").click(function(){
      var mode='iframe';
      var close = mode =='popup';
      var options = { mode : mode, popClose : close};
      $(".container").printArea( options );
    })
   })  
</script>
