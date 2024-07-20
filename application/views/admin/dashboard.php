<!DOCTYPE html>
<html>
<?php $this->load->view("admin/_includes/head.php") ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view("admin/_includes/header.php") ?>
<?php $this->load->view("admin/_includes/sidebar.php") ?>

<style>
  .small-box {
    width: 250px; /* Atur lebar card */
    height: 150px; /* Atur tinggi card */
    border-radius: 15px; /* Membuat card round */
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
  }

  .small-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 20px rgba(0, 0, 255, 0.8); /* Shadow biru yang sangat jelas */
    background-color: #4d4dff; /* Warna biru pada hover */
}


  .inner {
    padding: 20px;
  }

  .small-box h4 {
    font-size: 24px;
    font-weight: bold;
    margin: 0;
  }

  .small-box p {
    font-size: 16px;
    margin: 10px 0;
    color: #555;
  }

  .small-box-footer {
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    text-align: center;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0 0 10px 10px; /* Membuat sudut bawah card round */
  }
  .header {
            font-family: 'Roboto', sans-serif; /* Menggunakan font yang lebih modern */
            font-size: 2em; /* Ukuran teks lebih besar */
            color: #fff; /* Warna teks putih */
            text-align: center;
            font-weight: bold; /* Membuat teks tebal */
            background: linear-gradient(45deg, #4A90E2, #1b5996); /* Gradien warna */
            padding: 20px;
            border-radius: 10px; /* Membuat sudut melengkung */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan */
            transition: transform 0.3s ease; /* Efek transisi */
        }

        .header:hover {
            transform: scale(1.03); /* Efek zoom saat hover */
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <!-- Alert -->
	  <!-- Alert -->
    <?php if ($this->session->flashdata('success')): ?>
        <div class="box-body">
          <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i>Alert!</h4>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        </div>
      <?php endif; ?>
      <!-- Alert -->
      <script>
// Tampilkan alert jika pesan flashdata berhasil diset
<?php if ($this->session->set_flashdata('success')): ?>
  <div class="box-body">
          <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i>Alert!</h4>
    <?php echo $this->session->set_flashdata('success'); ?>
    </div>
        </div>
<?php endif; ?>
</script>
	  <!-- Alert -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
    <h2 class="header">
        Sistem Inventaris Barang
    </h2>
		<h2>
			Selamat Datang, 	
			<?php echo $this->session->userdata('nama'); ?>
      </h2>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
      <div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <a href="barang" style="color: inherit; text-decoration: none; position: relative;">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h4><?php echo $jumlah_barang; ?> Barang</h4>
      </div>
      <div class="icon">
        <i class="fa fa-window-restore"></i>
      </div>
      <div class="small-box-footer" style="position: absolute; bottom: 0; left: 0; width: 100%; background-color: #0bc6f4; color: #fff; padding: 10px; text-align: center;">Lihat <i class="fa fa-arrow-circle-right"></i></div>
    </div>
  </a>
</div>



        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <a href="klasifikasi" style="color: inherit; text-decoration: none; position: relative;">
    <div class="small-box bg-red">
      <div class="inner">
      <h4><?php echo $jumlah_klasifikasi; ?> Klasifikasi Barang</h4>
      </div>
      <div class="icon">
      <i class="fa fa-list-alt"></i>
      </div>
      <div class="small-box-footer" style="position: absolute; bottom: 0; left: 0; width: 100%; background-color: #ed5744; color: #fff; padding: 10px; text-align: center;">Lihat <i class="fa fa-arrow-circle-right"></i></div>
    </div>
  </a>
</div>

  <div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <a href="pengguna" style="color: inherit; text-decoration: none; position: relative;">
  <div class="small-box" style="background-color: #b4a7d6;">
      <div class="inner">
      <h4 style="color: #fff;"><?php echo $jumlah_pengguna; ?> Pengguna Aplikasi</h4>
      </div>
      <div class="icon">
      <i class="fa fa-users"></i>
      </div>
      <div class="small-box-footer" style="position: absolute; bottom: 0; left: 0; width: 100%; background-color: #bcade2; color: #fff; padding: 10px; text-align: center;">Lihat <i class="fa fa-arrow-circle-right"></i></div>
    </div>
  </a>
</div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      
          <!-- /.box -->

        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php $this->load->view("admin/_includes/footer.php") ?>
<?php $this->load->view("admin/_includes/control_sidebar.php") ?>
<?php $this->load->view("admin/_includes/bottom_script.php") ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


</body>
</html>
