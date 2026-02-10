<?php foreach ($data->result_array() as $i) :
$id=$i['id'];
$kode=$i['kd_barang'];
$qty=$i['qty'];
?>
	<input type="hidden" id="hapus_kd" value="<?php echo $id;?>"/>
	<input type="hidden" id="hapus_kdb" value="<?php echo $kode;?>"/>
	<input type="hidden" id="hapus_qty" value="<?php echo $qty;?>"/>
	<p>Apakah Anda yakin mau menghapus Barang <b><?php echo $kode;?></b> ?</p>
<?php endforeach;?>