<?php foreach ($products->result() as $value) { ?>
  <div class="col-sm-3 col-xs-6">
    <div class="box box-solid product-card"
         onclick="addToCart('<?php echo $value->nm_barang?>',
                            <?php echo $value->harga_jual?>,
                            '<?php echo $value->kd_barang?>')">

      <div class="product-img">
        <i class="fa fa-cube fa-3x text-muted"></i>
      </div>

      <div class="box-body text-center">
        <h5 class="text-bold product-title">
          <?php echo $value->nm_barang?>
        </h5>

        <span class="text-primary">
          Rp <?php echo number_format($value->harga_jual) ?>
        </span>
      </div>
    </div>
  </div>
<?php } ?>

<div class="col-xs-12 text-center" style="margin-top:15px;">
  <?php
    $total_pages = ceil($total / $limit);
    for ($i = 1; $i <= $total_pages; $i++) {
      $active = ($i == $page) ? 'btn-primary' : 'btn-default';
      echo "<button class='btn btn-sm $active pagination-btn' data-page='$i'>$i</button> ";
    }
  ?>
</div>

<script>
    function addToCart(nama, harga, kode) {
      $.ajax({
        url: "<?= base_url('penjualan/add_to_cart') ?>",
        type: "POST",
        data: {
          kd_barang: kode,
          harga: harga
        },
        success: function(response) {
          $('#cart-table-body').html(response);
        }
      });

    }

    function removeItem(kode) {
      $.ajax({
        url: "<?= base_url('penjualan/remove_item') ?>",
        type: "POST",
        data: { kd_barang: kode },
        success: function(response) {
          $('#cart-table-body').html(response);
        }
      });
    }
</script>