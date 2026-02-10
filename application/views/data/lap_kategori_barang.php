<a href="laporan/TCPDF_kategori_barang/<?php echo $param ?>" target="blank" class="btn btn-danger btn-flat pull-left"><i class="fa fa-print"></i> Cetak ke PDF <i class="fa fa-file-pdf-o"></i></a>
<a href="laporan/PHPExcel_kategori_barang/<?php echo $param ?>" class="btn btn-success btn-flat pull-right"><i class="fa fa-print"></i> Cetak ke EXCEL <i class="fa fa-file-excel-o"></i></a>
<br><br>
<table id="example2" class="table table-striped" style="font-size:12px;">
  <thead>
  <tr>
      <th style="width:70px;">#</th>
      <th>KODE BARANG</th>
      <th>NAMA BARANG</th>
      <th>KODE KATEGORI</th>
      <th>NAMA KATEGORI</th>
  </tr>
  </thead>
  <tbody>
      <?php
        $no=0;
          foreach ($data->result_array() as $i) :
             $no++;
                     $kode=$i['kd_barang'];
                     $nama=$i['nm_barang'];
                     $kat=$i['nm_kategori'];
                     $kodekat=$i['kd_kategori'];
                  ?>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $kode;?></td>
                <td><?php echo $nama;?></td>
                <td><?php echo $kodekat?></td>
                <td><?php echo $kat?></td>
              </tr>
      <?php endforeach;?>
  </tbody>
</table>
<script>
  $("#example2").DataTable();
</script>