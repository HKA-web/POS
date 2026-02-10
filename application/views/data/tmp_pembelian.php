<table id="example3" class="table table-striped" style="font-size:12px;">
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
                    <a class="btn" data-toggle="modal" data-target="#Hapus" onclick="pilihDataHapus('<?php echo $kode;?>')"><span class="fa fa-trash"></span></a>
              </td>
            </tr>
    <?php endforeach;?>
  </tbody>
</table>
<button type="button" class="col-md-2 btn btn-danger btn-flat pull-right" onclick="reset()"><span class="fa fa-trash"> Bersihkan Keranjang</span></button>
<button type="button" class="col-md-10 btn btn-info btn-flat pull-left">TOTAL : Rp.<?= number_format($tot) ?>,- <span class="fa fa-money"></span></button>
<br><br>
<!-- ======================== DATA TABLE =========================== -->
<script>
  $(function () {
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>