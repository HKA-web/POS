<?php foreach ($data->result_array() as $i) :
$kode=$i['kd_barang'];
$nama=$i['nm_barang'];
?>
	<input type="hidden" id="hapus_kd" value="<?php echo $kode;?>"/>
	<p>Apakah Anda yakin mau menghapus barang <b><?php echo $nama;?></b> ?</p>
<?php endforeach;?>