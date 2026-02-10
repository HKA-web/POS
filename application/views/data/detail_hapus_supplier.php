<?php foreach ($data->result_array() as $i) :
$kode=$i['kd_supplier'];
$nama=$i['nm_supplier'];
?>
	<input type="hidden" id="hapus_kd" value="<?php echo $kode;?>"/>
	<p>Apakah Anda yakin mau menghapus Supplier <b><?php echo $nama;?></b> ?</p>
<?php endforeach;?>