<?php foreach ($data->result_array() as $i) :
$kode=$i['kd_kategori'];
$nama=$i['nm_kategori'];
?>
 
	<div class="form-group">
	  <label for="inputUserName" class="col-sm-4 control-label">Kode Kategori</label>
	  <div class="col-sm-7">
	    <input type="text" class="form-control" value="<?php echo $kode;?>" id="update_kd" readonly>
	  </div>
	</div>
	<div class="form-group">
	  <label for="inputUserName" class="col-sm-4 control-label">Nama Kategori</label>
	  <div class="col-sm-7">
	    <input type="text" class="form-control" value="<?php echo $nama;?>" id="update_nm" placeholder="Nama Kategori" required>
	  </div>
	</div>
	<?php endforeach;?>