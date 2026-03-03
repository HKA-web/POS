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
  <!-- <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/JqueryPrintArea/jquery-ui-1.10.4.custom.css'?>" />
  <link type="text/css" rel="stylesheet" href="<?php echo base_url().'assets/JqueryPrintArea/PrintArea.css'?>" />  -->

<!--CSS File-->
<!--=================================================================================================================-->

  <style>
    .product-card {
      cursor: pointer;
      transition: all 0.3s;
      border: 1px solid #eee;
      margin-bottom: 15px;
      height: 230px; /* tinggi tetap */
      display: flex;
      flex-direction: column;
    }

    .product-img {
      height: 100px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #f4f4f4;
    }

    .product-card .box-body {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .product-title {
      font-size: 13px;
      line-height: 1.3em;
      height: 2.6em; /* 2 baris */
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2; /* max 2 baris */
      -webkit-box-orient: vertical;
      text-overflow: ellipsis;
    }
    .cart-container {
      background: #fff;
      height: calc(100vh - 120px);
      display: flex;
      flex-direction: column;
    }
    .cart-items {
      flex-grow: 1;
      overflow-y: auto;
      padding: 10px;
    }
    .cart-summary {
      border-top: 2px solid #eee;
      padding: 15px;
      background: #f9f9f9;
    }
    .total-price {
      font-size: 24px;
      font-weight: bold;
      color: #3c8dbc;
    }
    .cashback-price {
      font-size: 24px;
      font-weight: bold;
      color: #bc3c4dff;
    }
    .category-filter {
      margin-bottom: 15px;
      overflow-x: auto;
      white-space: nowrap;
      padding-bottom: 5px;
    }
    
  </style>
  
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
      <!-- Area Produk -->
      <div class="col-md-7">
        <div class="box box-primary">
          <div class="box-header with-border">
            <div class="input-group">
              <input type="text" id="search-product" class="form-control" placeholder="Cari nama produk...">
              <span class="input-group-btn">
                <button type="button" disabled id="btn-scan" class="btn btn-primary btn-flat"><i class="fa fa-qrcode"></i></button>
              </span>
            </div>
          </div>
          <div class="box-body">
            <div class="category-filter">
              <button class="btn btn-sm btn-default btn-flat active category-btn " data-id="all">
                Semua
              </button>
              <?php foreach ($category->result() as $value) { ?>
                <button class="btn btn-sm btn-default btn-flat category-btn"
                        data-id="<?php echo $value->kd_kategori ?>">
                  <?php echo $value->nm_kategori ?>
                </button>
              <?php } ?>
            </div>

            <div class="row" id="product-list"></div>
          </div>
        </div>
      </div>

      <!-- Area Keranjang -->
      <div class="col-md-5">
        <div class="box box-success direct-chat direct-chat-success">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-shopping-cart"></i> Detail Transaksi</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" onclick="clearCart()"><i class="fa fa-calendar"></i> <?php echo date('d-m-Y')?></button>
            </div>
          </div>
          
          <div class="box-body">
            <div class="cart-container">
              <div class="cart-items">
                <table class="table table-hover no-margin">
                  <thead>
                    <tr>
                      <th>Item</th>
                      <th width="80">Qty</th>
                      <th>Subtotal</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="cart-table-body">
                    <!-- Baris Keranjang Akan Ditambahkan Di Sini -->
                  </tbody>
                </table>
                <div id="empty-cart-msg" class="text-center text-muted" style="padding-top: 50px;">
                  <i class="fa fa-shopping-basket fa-4x"></i>
                  <p>Keranjang masih kosong</p>
                </div>
              </div>

              <div class="cart-summary">
                <div class="row">
                  <div class="col-xs-6">Subtotal</div>
                  <div class="col-xs-6 text-right" id="subtotal">Rp 0</div>
                </div>
                <div class="row">
                  <div class="col-xs-6">Pajak (10%)</div>
                  <div class="col-xs-6 text-right" id="tax">Rp 0</div>
                </div>
                <hr style="margin: 10px 0;">
                <div class="row">
                  <div class="col-xs-6 text-bold">TOTAL</div>
                  <div class="col-xs-6 text-right total-price" id="total">Rp 0</div>
                </div>
                <div class="row">
                  <div class="col-xs-6">Bayar </div>
                  <div class="col-xs-6 text-right input-group">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-primary btn-flat">Rp.</button>
                    </span>
                    <input type="text" id="cash" class="form-control" value="0">
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-6 text-bold">KEMBALIAN</div>
                  <div class="col-xs-6 text-right cashback-price" id="cashback">Rp 0</div>
                </div>
                <div class="margin-top" style="margin-top: 20px;">
                  <button type="submit" class="btn btn-success btn-lg btn-block btn-flat hide" id="checkout">
                    <i class="fa fa-money"></i> BAYAR SEKARANG
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="scannerModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">
              <i class="fa fa-qrcode"></i> Scan Barcode
            </h4>
          </div>

          <div class="modal-body">

            <div id="reader" style="width:100%"></div>

            <div id="scan-result" style="margin-top:15px;"></div>

          </div>

        </div>
      </div>
    </div>

</section>
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
<!-- <script src="<?php echo base_url().'assets/JqueryPrintArea/jquery-ui-1.10.4.custom.js'?>"></script>
<script src="<?php echo base_url().'assets/JqueryPrintArea/jquery.PrintArea.js'?>" type="text/JavaScript" language="javascript"></script> -->
<!-- Qrcode -->
<script src="https://unpkg.com/html5-qrcode"></script>

<script>
// $('#tgl').datepicker({
//     autoclose: true,
//     format: 'yyyy-mm-dd'
//   });

  
  let currentCategory = 'all';
  let currentSearch   = '';
  let html5QrCode;

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

  function loadProducts(page = 1) {
    $.ajax({
      url: "<?= base_url('penjualan/load_products') ?>",
      type: "GET",
      data: {
        page: page,
        category: currentCategory,
        search: currentSearch
      },
      success: function(response) {
        $('#product-list').html(response);
      }
    });
  }

  function disableScannerButton(message) {
    $('#btn-scan')
        .prop('disabled', true)
        .removeClass('btn-primary')
        .addClass('btn-default')
        .attr('title', message);
  }

  function onScanSuccess(decodedText) {

    html5QrCode.stop();

    $.ajax({
      url: "<?= base_url('penjualan/get_product_by_barcode') ?>",
      type: "GET",
      data: { barcode: decodedText },
      success: function(res) {

        let result = JSON.parse(res);

        if (result.status) {

          let p = result.data;

          $('#scan-result').html(`
            <div class="alert alert-success">
              <strong>${p.nm_barang}</strong><br>
              Harga: Rp ${parseInt(p.harga_jual).toLocaleString()}
            </div>
          `);

          // OPTIONAL auto add to cart
          // addToCart(p.nm_barang, p.harga_jual, p.kd_barang);

        } else {
          $('#scan-result').html(`
            <div class="alert alert-danger">
              Produk tidak ditemukan
            </div>
          `);
        }
      }
    });
  }

  function loadCart() {
    $.ajax({
      url: "<?= base_url('penjualan/load_cart') ?>",
      success: function(response){
        $('#cart-table-body').html(response);
      }
    });
  }

  function parseRupiah(text) {
      return parseInt(text.replace(/[^0-9]/g, '')) || 0;
  }

  function formatRupiah(angka) {
      return 'Rp ' + angka.toLocaleString('id-ID');
  }

  function hitungKembalian() {

    let totalText = $('#total').text();
    let total     = parseRupiah(totalText);

    let bayar     = parseInt($('#cash').val().replace(/[^0-9]/g, '')) || 0;

    let kembalian = bayar - total;

    if (kembalian < 0 || total === 0) {

        $('#cashback').html('<span class="text-danger">Rp 0</span>');

        // Sembunyikan tombol
        $('#checkout').addClass('hide');

    } else {

        $('#cashback').html(formatRupiah(kembalian));

        // Tampilkan tombol
        $('#checkout').removeClass('hide');
    }
  }

  $(document).ready(function(){

    loadProducts();
    loadCart();

    $(document).on('click', '.category-btn', function() {
      $('.category-btn').removeClass('active');
      $(this).addClass('active');

      currentCategory = $(this).data('id');
      loadProducts(1);
    });

    $(document).on('click', '.pagination-btn', function() {
      let page = $(this).data('page');
      loadProducts(page);
    });

    let typingTimer;
    $('#search-product').on('keyup', function() {
      clearTimeout(typingTimer);
      currentSearch = $(this).val();

      typingTimer = setTimeout(function() {
        loadProducts(1);
      }, 300);
    });

    if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
        disableScannerButton("Browser tidak support kamera");
        return;
    }

    // Cek apakah ada device kamera
    Html5Qrcode.getCameras()
    .then(devices => {
        if (devices && devices.length > 0) {
            $('#btn-scan').prop('disabled', false);
        } else {
            disableScannerButton("Kamera tidak ditemukan");
        }
    })
    .catch(err => {
        disableScannerButton("Izin kamera ditolak");
    });

    $('#btn-scan').on('click', function() {
      $('#scannerModal').modal('show');

      html5QrCode = new Html5Qrcode("reader");

      Html5Qrcode.getCameras().then(devices => {
        if (devices && devices.length) {
          let cameraId = devices[0].id;

          html5QrCode.start(
            cameraId,
            {
              fps: 10,
              qrbox: 250
            },
            onScanSuccess
          );
        }
      });
    });

    $('#scannerModal').on('hidden.bs.modal', function () {
      if (html5QrCode) {
        html5QrCode.stop().catch(err => {});
      }
    });

    $('#cash').on('keyup change', function() {

        // auto format ribuan saat mengetik
        let angka = parseInt($(this).val().replace(/[^0-9]/g, '')) || 0;
        $(this).val(angka.toLocaleString('id-ID'));

        hitungKembalian();
    });

    // jalankan ulang kalau total berubah
    $(document).ajaxComplete(function() {
        hitungKembalian();
    });

    $(document).on('click','#checkout',function(){
      $.ajax({  
          url:"<?php echo base_url();?>penjualan/saveTran",  
          method:"GET",
          success:function(data)
          { 
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url();?>nota/printThermal/'+JSON.parse(data).kode,
                success: function(data) {
                  loadCart();
                }
                // ,error: function (xhr, status, error) {
                //   alert('Gagal');
                // }
            });
            
            
          }  
      });
    });

  });  
</script>
