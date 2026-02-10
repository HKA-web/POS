<?php foreach ($data->result_array() as $i) :
$kode=$i['kd_kategori'];
$nama=$i['nm_kategori'];
?>
	<input type="hidden" id="hapus_kd" value="<?php echo $kode;?>"/>
	<p>Apakah Anda yakin mau menghapus Kategori <b><?php echo $nama;?></b> ?</p>
<?php endforeach;?>