<?php foreach ($data->result_array() as $i) :
$kode=$i['no_penjualan'];
$tgl=$i['tgl_transaksi'];
$pl=$i['pelanggan'];
$nm=$i['nama'];
$ct=$i['catatan'];
$t=number_format($i['total']);
$D=substr($tgl, 8, 2);
$M=substr($tgl, 5, 2);
$Y=substr($tgl, 0, 4);

?>

<?php endforeach;?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Bootstrap 3.3.6 -->
  	<link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
	<style>@import url(http://fonts.googleapis.com/css?family=Bree+Serif);
  			body, h1, h2, h3, h4, h5, h6{
    			font-family: 'Bree Serif', serif;
 	 									}
  	</style>
  	<div class="table-responsive">  
		<div class="container">
			<div class="row">
            
		<div class="col-xs-6">
			<h1><a href=" "><img alt="" src="<?php echo base_url().'assets/images/logo.png' ?>" /> Example Penjualan </a></h1>
		</div>
		<div class="col-xs-6 text-right">
							<div class="panel panel-default">
							<div class="panel-heading">
									<h4>KASIR : 
										<a href="#"><?php echo $nm; ?></a>
									</h4>
									<h4>PELANGGAN : 
										<a href="#"><?php echo $pl; ?></a>
									</h4>
							</div>
							<div class="panel-body">
								<h4>NO.NOTA : 
										<a href="#"><?php echo $kode ?></a>
								</h4>
							</div>
						</div>
					</div>
 
			<hr />
 
			
				<h1 style="text-align: center;">NOTA PEMBAYARAN</h1> 
			
				<div class="row">
					<div class="col-xs-12">
						<div class="panel panel-default">
								<div class="panel-heading">
									<h4>Tanggal, <?php echo $D; ?> bulan <?php echo $M; ?> tahun <?php echo $Y; ?>
									
									</h4>
								</div>
						<div class="panel-body">
						
							
								<h4>Total yang harus di bayarkan adalah :  
									<a href="#">Rp.<?php echo $t; ?>,00</a>
								</h4>
					
						</div>
						</div>
					</div>
					
				</div>
<pre></pre>
<table class="table table-bordered">
	<thead >
		<tr >
			<th style="text-align: center;">
				<h4>No.</h4>
			</th>
			<th>
				<h4>Nama Barang</h4>
			</th>
			<th style="text-align: center;">
				<h4>Harga</h4>
			</th>
			<th style="text-align: center;">
				<h4>Sub Total</h4>
			</th>
			
		</tr>
	</thead>
	<tbody>
		<?php 
		$no=0;
        $sb=0;
        $tot=0;
        foreach ($data->result_array() as $i) :
                $no++;
                $kode=$i['kd_barang'];
                $nama=$i['nm_barang'];
                $jml=$i['jumlah'];
                $hj=$i['harga_jual'];
                $sb=$hj * $jml;
                $tot=$tot + $sb;
                $u=$i['nama'];
        ?>
		<tr>
			<td style="text-align: center;"><?php echo $no; ?></td>
			<td><a href="#"> <?php echo $nama; ?> </a></td>
			<td class=" text-right ">Rp.<?php echo number_format($hj);?> x <?php echo $jml; ?></td>
			<td class=" text-right "><?php echo number_format($sb); ?></td>
			
		</tr>
		<?php endforeach;?>
		<tr >
			<td colspan="3" style="text-align: right;">Total Bs.</td>
			<td style="text-align: right;"><a href="#" >Rp.<?php echo number_format($tot); ?> </a></td>
			
			
		</tr>
		<tr >
			<td colspan="4" style="text-align: right;">Terimakasih: atas kunjungannya,sampai jumpa</td>

		</tr>
	</tbody>
</table>
<pre></pre>
		

	<div class="row">
			<div class="col-xs-4">
				
			</div>
			<div class="col-xs-8">
			
				<div class="panel panel-info"  style="text-align: right;">
					<h6>PERINGATAN : "BARANG YANG TELAH DI BELI, TIDAK BISA DI KEMBALIKAN"</h6>
				</div>
			
		</div>
	</div>
		
</div>
</div>

</head>

             </div>
<body>
	
</body>
</html>