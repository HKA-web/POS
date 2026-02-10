<table id="example2" class="table table-striped" style="font-size:12px;">
  <thead>
  <tr>
      <th style="width:70px;">#</th>
      <th>KODE KATEGORI</th>
      <th>NAMA KATEGORI</th>
      <th style="text-align:right;">AKSI</th>
  </tr>
  </thead>
  <tbody>
      <?php
      $no=0;
        foreach ($data->result_array() as $i) :
           $no++;
                   $kode=$i['kd_kategori'];
                   $nama=$i['nm_kategori'];

                ?>
            <tr>
              <td><?php echo $no;?></td>
              <td><?php echo $kode;?></td>
              <td><?php echo $nama;?></td>
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