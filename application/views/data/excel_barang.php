<?php 
$objPHPExcel = new PHPExcel();
$objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
$objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
$objget->setTitle('Sample Sheet'); //sheet title
//Warna header tabel
$objget->getStyle("A1:H1")->applyFromArray(
	array(
		'fill' => array(
			'type' => PHPExcel_Style_Fill::FILL_SOLID,
			'color' => array('rgb' => 'dd4b39')
		),
		'font' => array(
			'color' => array('rgb' => 'ffffff')
		)
	)
);
//table header
$cols = array("A","B","C","D","E","F","G","H");
$val = array("NO","KODE BARANG","NAMA BARANG","HARGA BELI","HARGA JUAL","DISKON","STOCK","KATEGORI");
for ($a=0;$a<count($cols);$a++) { //style baris 1
	//berikan judul kolom
	$objset->setCellValue($cols[$a].'1', $val[$a]);
	//setting lebar
	$objPHPExcel->getActiveSheet()->getColumnDimension($cols[$a])->setWidth(25);
	$style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        )
    );
    $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
}
$baris=2; //isi data mulai baris ke 2
$nourut=0;
foreach ($data->result() as $row){ 
	$nourut++;
	$objset->setCellValue("A".$baris, $nourut); 
	$objset->setCellValue("B".$baris, $row->kd_barang);
	$objset->setCellValue("C".$baris, $row->nm_barang);
	$objset->setCellValue("D".$baris, number_format($row->harga_beli));
	$objset->setCellValue("E".$baris, number_format($row->harga_jual));
	$objset->setCellValue("F".$baris, $row->diskon);
	$objset->setCellValue("G".$baris, $row->stok);
	$objset->setCellValue("H".$baris, $row->nm_kategori);
	$baris++;
}
$objPHPExcel->getActiveSheet()->setTitle('Rekap Barang');

$objPHPExcel->setActiveSheetIndex(0);  
$filename = urlencode("Rekap_Barang_".date("d-m-Y").".xls");

header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache  
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
?>