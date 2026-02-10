<!--Counter Inbox-->

<!DOCTYPE html>
<html>
<head>
  <!-- Pace -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/pace/macOs.css'?>">
  <!-- Pace -->
  <script src="<?php echo base_url().'assets/pace/pace.min.js'?>"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>M-Sekolah | Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!--Header-->
  <!--Counter Inbox-->

  <header class="main-header">
  <?php echo $_atas ?> 
  </header>


  <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <?php echo $_menu ?>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php echo $_tengah ?>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?> <a href="#">Ananda Al Hakim</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

</body>
</html>

<!-- ============================================= MODAL DAFTAR BARANG ========================================== -->
<div class="modal fade" id="ModalAkun" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Manajemen Akun</h4>
          </div>
          <form class="form-horizontal">
          <!-- ========================================== FORM DAFTAR BARANG ================================= -->
          <div class="modal-body">
          <?php
            $query=$this->db->query("SELECT * FROM user_login WHERE id='$uid'");
            $getAkun=$query->row();
          ?>
              <div class="form-group hide">
                  <label for="inputUserName" class="col-sm-4 control-label">ID</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="ID" value="<?php echo $getAkun->id?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">UserID</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="Userid" value="<?php echo $getAkun->userid?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" id="Nama" value="<?php echo $nm?>">
                  </div>
              </div>
              <div class="form-group">
                  <label for="inputUserName" class="col-sm-4 control-label">Password Baru</label>
                  <div class="col-sm-7">
                    <input type="password" class="form-control" id="Pass" placeholder="example: Admin">
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary btn-flat pull-right" id="smpn" >Simpan</button>
          </div>
          <!-- ========================================== FORM DAFTAR BARANG ==================================== -->
          </form>
      </div>
  </div>
</div>

<script>
  $(document).on('click','#smpn',function(){
    var id=$('#ID').val();
    var u=$('#Userid').val();
    var n=$('#Nama').val();
    var p=$('#Pass').val();
    

    $.ajax({
      type: 'POST',
      data: 'id='+id+'&u='+u+'&n='+n+'&p='+p,
      url:"<?php echo base_url();?>admin/simpan",
      success: function(data){
        $("#ModalAkun").modal('hide');
        window.location.href="keluar";
      }
    })

  })
</script>