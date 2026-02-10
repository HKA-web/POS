<?php foreach ($data->result_array() as $i) :
$kode=$i['kd_barang'];
$qty=$i['qty'];
?>
 
	<div class="form-group hide">
	  <label for="inputUserName" class="col-sm-4 control-label">Kode</label>
	  <div class="col-sm-7">
	    <input type="text" class="form-control" value="<?php echo $kode;?>" id="update_kd" readonly>
	  </div>
	</div>
	<div class="form-group">
	  <label for="inputUserName" class="col-sm-4 control-label">Jumlah</label>
	  <div class="col-sm-2">
	    <input type="number" class="form-control" value="<?php echo $qty;?>" id="jml" required readonly>
	  </div>
	  <div class="col-sm-1">
	    <button class="btn btn-danger btn-md btn-flat" ><i class="fa fa-plus"></i></button>
	  </div>
	  <div class="col-sm-2">
	    <input type="number" class="form-control" value="0" id="update_qty" placeholder="Jumlah" onkeyup="hitung()" onclick="hitung()" required>
	  </div>
	  <div class="col-sm-1">
	    <button class="btn btn-success btn-md btn-flat" >=</button>
	  </div>
	  <div class="col-sm-2">
	    <input type="number" class="form-control" id="tot" readonly>
	  </div>
	</div>
	
	<?php endforeach;?>

<script>
	function hitung() {
		var a=parseInt($('#jml').val());
		var b=parseInt($('#update_qty').val());
		var c= (a + b);
		$('#tot').val(c);

		if (c < 0) 
		{
			$('#edit').addClass('hide');

		}
		else
		{
			$('#edit').removeClass('hide');
		}
	}
	
</script>

<?php foreach ($data_stok->result_array() as $i) :
$jml=$i['stok'];
?>
	<div class="form-group">
	  <label for="inputUserName" class="col-sm-4 control-label">Stok</label>
	  <div class="col-sm-8">
	    <input type="number" class="form-control" readonly="" value="<?php echo $jml;?>" id='stok_akhir'>
	  </div>
	</div>
	
	
	<?php endforeach;?>
<h4>Catatan</h4>
<p class="text-help">Untuk <b><i>Mengurangi Jumlah</i></b> tambahkan tanda <label style="color:red">(-)</label> pada awal angka !</p>