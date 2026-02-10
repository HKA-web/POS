<table id="example1" class="table table-striped" style="font-size:12px;">
  <thead>
  <tr>
      <th style="width:70px;">#</th>
      <th>KODE BARANG</th>
      <th>NAMA BARANG</th>
      <th>HARGA BELI</th>
      <th>HARGA JUAL</th>
      <th>STOCK</th>
      <th><center>PENGATURAN</center></th>
  </tr>
  </thead>
  <tbody>
      <?php
      $no=0;
        foreach ($data->result_array() as $i) :
           $no++;
                   $kode=$i['kd_barang'];
                   $nama=$i['nm_barang'];
                   $beli=number_format($i['harga_beli']);
                   $jual=number_format($i['harga_jual']);
                   $stk=$i['stok'];

                ?>
            <tr>
              <td><?php echo $no;?></td>
              <td><?php echo $kode;?></td>
              <td><?php echo $nama;?></td>
              <td>Rp.<?php echo $beli;?>,-</td>
              <td>Rp.<?php echo $jual;?>,-</td>
              <?php 
              if ($stk <=0) 
              {
                echo "<td class='btn btn-danger btn-flat btn-sm'>".$stk."</td>"; 
              }
              elseif($stk > 0 AND $stk <=10)
              {
                echo "<td class='btn btn-warning btn-flat btn-sm'>".$stk."</td>";
              }
              else
              {
                echo "<td class='btn btn-success btn-flat btn-sm'>".$stk."</td>"; 
              }
              ?>
              <td style="text-align:right;">
                 <a class="btn btn-sm" onclick="pilihDataEdit('<?php echo $kode;?>')"><span class="fa fa-pencil"></span></a>
                 <a class="btn btn-sm" onclick="pilihQrcode('<?php echo $kode;?>')" data-toggle="modal" data-target="#ModalQr" title="Qrcode"><span class="fa fa-qrcode"></span></a>
                 <a class="btn btn-sm" onclick="pilihBarcode('<?php echo $kode;?>')" data-toggle="modal" data-target="#ModalBarcode" title="Barcode"><span class="fa fa-barcode"></span></a>
                 <a class="btn btn-sm" data-toggle="modal" data-target="#ModalHapus" onclick="pilihDataHapus('<?php echo $kode;?>')" title="Hapus"><span class="fa fa-trash"></span></a>
              </td>
            </tr>
    <?php endforeach;?>
  </tbody>
</table>
<p><b>/* Catatan Penggunaan Warna Stok</b></p>
<p><button class='btn btn-danger btn-flat btn-sm'>?</button> <i>Warna Merah melambangkan bahwa stock barang telah habis.</i></p>
<p><button class='btn btn-warning btn-flat btn-sm'>?</button> <i>Warna kuning melambangkan bahwa stock barang telah memasuki jumlah minimum dan akan habis.</i></p>
<p><button class='btn btn-success btn-flat btn-sm'>?</button> <i>Warna Hijau melambangkan bahwa stock barang masih banyak.</i></p>
<script>
  $("#example1").DataTable();
</script>