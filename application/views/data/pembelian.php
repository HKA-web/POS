<table id="example4" class="table table-striped" style="font-size:12px;">
  <thead>
  <tr>
      <th style="width:70px;">#</th>
      <th>NO.Pembelian</th>
      <th>TGL.TRANSAKSI</th>
      <th>NAMA SUPPLIER</th>
      <th>NAMA KASIR</th>
      <th style="text-align:right;">AKSI</th>
  </tr>
  </thead>
  <tbody>
      <?php
      $no=0;
        foreach ($data->result_array() as $i) :
           $no++;
                   $kode=$i['no_pembelian'];
                   $tgl=$i['tgl_transaksi'];
                   $sup=$i['nm_supplier'];
                   $u=$i['nama'];

                ?>
            <tr>
              <td><?php echo $no;?></td>
              <td><?php echo $kode;?></td>
              <td><?php echo $tgl;?></td>
              <td><?php echo $sup;?></td>
              <td><?php echo $u;?></td>
              
              <td style="text-align:right;">
                 <center><a class="btn btn-sm" data-toggle="modal" data-target="#ModaldPEM" onclick="dPembelian('<?php echo $kode;?>')"><span class="fa fa-eye"></span></a></center>
              </td>
            </tr>
    <?php endforeach;?>
  </tbody>
</table>
<script>
  $("#example4").DataTable();
</script>