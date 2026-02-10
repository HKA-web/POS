<?php foreach ($data->result_array() as $i) :
$kode=$i['kd_supplier'];
$nama=$i['nm_supplier'];
$tlp=$i['telpon'];
$alamat=$i['alamat'];
?>
 
	<div class="form-group">
	  <label for="inputUserName" class="col-sm-4 control-label">Kode Supplier</label>
	  <div class="col-sm-7">
	    <input type="text" class="form-control" value="<?php echo $kode;?>" id="update_kd" readonly>
	  </div>
	</div>
	<div class="form-group">
	  <label for="inputUserName" class="col-sm-4 control-label">Nama Supplier</label>
	  <div class="col-sm-7">
	    <input type="text" class="form-control" value="<?php echo $nama;?>" id="update_nm" placeholder="Nama Kategori" required>
	  </div>
	</div>
	<div class="form-group">
	  <label for="inputUserName" class="col-sm-4 control-label">Telpon</label>
	  <div class="col-sm-7">
	    <input type="number" class="form-control" value="<?php echo $tlp;?>" id="update_tlp" placeholder="Nama Kategori" required>
	  </div>
	</div>
	<div class="form-group">
	  <label for="inputUserName" class="col-sm-4 control-label">Alamat</label>
	  <div class="col-sm-7">
	   <textarea class="form-control" id="update_alamat" placeholder="Alamat" required><?php echo $alamat ?></textarea>
	  </div>
	</div>
	<?php endforeach;?>