<table id="example2" class="table table-striped" style="font-size:12px;">
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
<!-- ======================== DATA TABLE =========================== -->
<script>
  $(function () {
    $("#example2").DataTable();
  });
</script>