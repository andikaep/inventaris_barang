<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assetAdmin/dist/img/popr.jpg')?> " class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Admin</p>
         <small><?php echo $this->session->userdata('nama'); ?></small><br>
        <!-- <a href="#"><i class="fa fa-circle text-success"></i> Siap</a> -->
      </div>
    </div>

    <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>

        <li><a href="<?php echo base_url('') ?>"><i class="fa fa-book"></i> <span>Dashboard</span></a></li>
        <li><a href="<?php echo base_url('barang') ?>"><i class="fa fa-window-restore"></i> <span>Data Barang</span></a></li>
        
          
        <li><a href="<?php echo base_url('klasifikasi') ?>"><i class="fa fa-list-alt"></i> <span>Klasifikasi Barang</span></a>
        </li>
       
        
        <li><a href="<?php echo base_url('pengguna') ?>"><i class="fa fa-fw fa-users"></i> <span>Manajemen Pengguna</span></a>
        </li>
        <li><a href="<?php echo base_url('dashboard/petunjuk') ?>"><i class="fa fa-folder-open-o" aria-hidden="true"></i> <span>Petunjuk</span></a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
