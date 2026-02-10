
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu Utama</li>
        <?php 
          if ($lv=='Admin') 
          {
            echo '
              <li class="active">
                <a href="'.base_url()."halaman_utama".'">
                  <i class="fa fa-home"></i> <span>Dashboard</span>
                  <span class="pull-right-container">
                    <small class="label pull-right"></small>
                  </span>
                </a>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-shopping-cart"></i>
                  <span>Transaksi</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="'.base_url()."halaman_pembelian".'"><i class="fa fa-sign-out fa-flip-horizontal"></i>&nbsp;&nbsp;&nbsp;Pembelian</a></li>
                  <li><a href="'.base_url()."halaman_penjualan".'">&nbsp;&nbsp;<i class="fa fa-sign-in"></i> Penjualan</a></li>
                </ul>
              </li>
              <li>
                <a href="'.base_url()."halaman_histori_jual".'">
                  <i class="fa fa-history"></i> <span>Histori Penjualan</span>
                  <span class="pull-right-container">
                    <small class="label pull-right"></small>
                  </span>
                </a>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-list"></i>
                  <span>Master Data</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="'.base_url()."halaman_kategori".'"><i class="fa fa-tag"></i>Kategori</a></li>
                  <li><a href="'.base_url()."halaman_supplier".'"><i class="fa fa-users"></i>Supplier</a></li>
                  <li><a href="'.base_url()."halaman_barang".'"><i class="fa fa-briefcase"></i>Barang</a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-book"></i>
                  <span>Laporan</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="'.base_url()."laporan_barang".'"><i class="fa fa-file"></i>Barang</a></li>
                  <li><a href="'.base_url()."laporan_stok_barang".'"><i class="fa fa-file"></i>Stock Barang</a></li>
                  <li><a href="'.base_url()."laporan_barang_kategori".'"><i class="fa fa-file"></i>Barang Per Kategori</a></li>
                  <li><a href="'.base_url()."laporan_periode_pembelian".'"><i class="fa fa-file"></i>Pembelian Per Periode</a></li>
                  <li><a href="'.base_url()."laporan_pembelian_perbulan".'"><i class="fa fa-file"></i>Pembelian Per Bulan</a></li>
                  <li><a href="'.base_url()."laporan_periode_penjualan".'"><i class="fa fa-file"></i>Penjualan Per Periode</a></li>
                  <li><a href="'.base_url()."laporan_penjualan_perbulan".'"><i class="fa fa-file"></i>Penjualan Per Bulan</a></li>
                  <li><a href="'.base_url()."laporan_kategori".'"><i class="fa fa-file"></i>Kategori</a></li>
                  <li><a href="'.base_url()."laporan_supplier".'"><i class="fa fa-file"></i>Supplier</a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="#">
                  <i class="fa fa-database"></i>
                  <span>Database</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="'.base_url()."halaman_backup".'"><i class="fa fa-download"></i>Backup</a></li>
                  <li><a href="'.base_url()."halaman_restore".'"><i class="fa fa-upload"></i>Restore</a></li>
                </ul>
              </li>
            ';     
          }
          else
          {
            echo '
                <li class="treeview active">
                <a href="#">
                  <i class="fa fa-shopping-cart"></i>
                  <span>Transaksi</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="'.base_url()."halaman_penjualan".'"><i class="fa fa-sign-out fa-flip-horizontal"></i>&nbsp;&nbsp;&nbsp;Penjualan</a></li>
                  <li><a href="'.base_url()."halaman_pembelian".'">&nbsp;&nbsp;<i class="fa fa-sign-in"></i> Pembelian</a></li>
                </ul>
              </li>
              <li>
                <a href="'.base_url()."halaman_histori_jual".'">
                  <i class="fa fa-history"></i> <span>Histori Penjualan</span>
                  <span class="pull-right-container">
                    <small class="label pull-right"></small>
                  </span>
                </a>
              </li>
            ';
          }

        ?>

      </ul>