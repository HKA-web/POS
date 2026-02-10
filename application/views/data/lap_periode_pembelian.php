<a href="laporan/TCPDF_periode_pembelian/<?php echo $param ?>" target="blank" class="btn btn-danger btn-flat pull-left"><i class="fa fa-print"></i> Cetak ke PDF <i class="fa fa-file-pdf-o"></i></a>
<a href="laporan/PHPExcel_periode_pembelian/<?php echo $param ?>" class="btn btn-success btn-flat pull-right"><i class="fa fa-print"></i> Cetak ke EXCEL <i class="fa fa-file-excel-o"></i></a>
<br><br>
<table id="example2" class="table table-striped" style="font-size:12px;">
  <thead>
  <tr>
      <th style="width:70px;">#</th>
      <th>TANGGAL TRANSAKSI</th>
      <th>NO.PEMBELIAN</th>
      <th>KODE BARANG</th>
      <th>NAMA BARANG</th>
      <th>JUMLAH</th>
      <th>HARGA BELI</th>
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
                   $tgl=$i['tgl_transaksi'];
                   $nop=$i['no_pembelian'];
                   $kode=$i['kd_barang'];
                   $nama=$i['nm_barang'];
                   $jml=$i['jumlah'];
                   $beli=$i['harga_beli'];
          $st=$jml * $beli;
          $t=$t+$st;
                ?>
            <tr>
              <td><?php echo $no;?></td>
              <td><?php echo $tgl;?></td>
              <td><?php echo $nop;?></td>
              <td><?php echo $kode;?></td>
              <td><?php echo $nama;?></td>
              <td><?php echo $jml;?></td>
              <td>Rp.<?php echo number_format($beli);?>,-</td>
              <td>Rp.<?php echo number_format($st);?>,-</td>
            </tr>
    <?php endforeach;?>
  </tbody>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><b style="font-size: 20px"><i>Total Pengeluaran :</i></b></td>
    <td></td>
    <td></td>
    <td><button class="btn btn-danger btn-xs btn-flat"><b>Rp.<?php echo number_format($t);?>,-</b></button></td>
  </tr>
</table>
<script>
  $("#example2").DataTable();
</script>