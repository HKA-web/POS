<?php
 $output = '';
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered" id="example5">
            <thead>
                <tr>  
                     <th >#</th>  
                     <th width:80px>KODE</th>  
                     <th width="80%">NAMA BARANG</th>
                     <th width:80px>JUMLAH</th>
                     <th >HARGA</th>
                     <th width="100%">SUB TOTAL</th> 
                     <th ></th>  
                </tr>
            </thead>';
$rows = $rows;
$no =0;
$subT=0;
if($rows > 0)  
{ 
  foreach ($tmp->result_array() as $row)
  {
    $no++;
    $subT= $row["qty"] * $row["harga_jual"];
    $output .= '  
        <tr>  
             <td>'.$no.'</td>  
             <td > 
                <input type="text" class="edit_kd form-control" value='.$row["kd_barang"].' style="width:80px" readonly>
             </td>  
             <td > 
                <label class="edit_nama">'.$row["nm_barang"].'</label>
              </td>
              <td > 
                <input type="number" class="edit_qty form-control" data-id1="'.$row["kd_barang"].'" data-id2="'.$row["id"].'" value='.$row["qty"].' style="width:80px">
              </td>
              <td > 
                <input type="text" class="edit_hj form-control hide" value='.$row["harga_jual"].'>
                <label>Rp.'.number_format($row["harga_jual"]).',-</label>
              </td>
              <td > 
                <label>Rp.'.number_format($subT).',-</label>
              </td>

             <td>
             <button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-danger btn_delete btn-md btn-flat" ><i class="fa fa-trash"></i></button>
             </td>  
        </tr>  
   ';  
  }
  $output .= '  
     <tr>  
        <td></td>  
          <td  ><input type="text" id="kd_barang" class="form-control" onkeyup="generate()" style="width:80px"></td>  
          <td  >
            <label class="nm_barang"></label>
          </td>
          <td  >
            <input type="number" id="qty" class="form-control" onkeyup="hitung()" onclick="hitung()" readonly style="width:80px">
          </td>  
          <td  >
          <input type="text" id="harga_jual" class="form-control hide" >
            <label class="harga_jual"></label>
          </td>  
          <td  >
            <label id="sTotal"></label>
          </td>  
          <td>
          <button type="button" name="btn_add" id="btn_add" class="btn btn-success btn-md btn-flat" ><i class="fa fa-plus-circle"></i></button>
          </td>  
     </tr>  
';
  
}
else
{
  $output .= '
    <tr>  
        <td></td>  
          <td  ><input type="text" id="kd_barang" class="form-control" onkeyup="generate()" style="width:80px"></td>  
          <td  >
            <label class="nm_barang"></label>
          </td>
          <td  >
            <input type="number" id="qty" class="form-control" onkeyup="hitung()" onclick="hitung()" readonly style="width:80px">
          </td>  
          <td  >
          <input type="text" id="harga_jual" class="form-control hide" >
            <label class="harga_jual"></label>
          </td>  
          <td  >
            <label id="sTotal"></label>
          </td>  
          <td>
          <button type="button" name="btn_add" id="btn_add" class="btn btn-success btn-md btn-flat" ><i class="fa fa-plus-circle"></i></button>
          </td>  
     </tr>
    ';  
}

 $output .= '</table>  
      </div>';  
 echo $output;  
?>

<script>
  $(function () {
    $('#example5').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": false,
      "autoWidth": false
    });
  });
</script>