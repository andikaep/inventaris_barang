<!DOCTYPE html>
<html>
<?php $this->load->view("admin/_includes/head.php") ?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view("admin/_includes/header.php") ?>
    <?php $this->load->view("admin/_includes/sidebar.php") ?>
    <script src="<?php echo base_url('js/custom_table.js'); ?>"></script>

    <style>
.label-secondary-custom {
            background: linear-gradient(45deg, #3498db, #4A90E2); /* Gradien warna biru ke hijau */
            color: #fff; /* Warna teks putih */
            padding: 15px; /* Ruang di dalam elemen */
            border-radius: 10px; /* Sudut melengkung */
            font-family: Arial, sans-serif; /* Gaya font */
            text-align: center; /* Teks di tengah */
            font-size: 1.2em; /* Ukuran teks lebih kecil */
            font-weight: bold; /* Membuat teks tebal */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Efek transisi */
        }
</style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

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

      <section class="content-header">
        <h1>
          Kelola
          <small>Data Klasifikasi Barang</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-fw fa-child"></i> Klasifikasi</a></li>
          <li><a href="<?php echo base_url('klasifikasi') ?>">Lihat Data Klasifikasi</a></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <div class="box-header"> 
                  <?php if (!empty($klasifikasi)): ?>
                    <br>
                    <h3 class="label label-secondary label-secondary-custom">
                      Klasifikasi Barang : <?php echo $klasifikasi[0]->nama_kategori; ?>
                    </h3>
                  <?php else: ?>
                    <br>
                    <h3 class="label label-secondary label-secondary-custom">
                      Klasifikasi Barang : Data tidak ditemukan
                    </h3>
                  <?php endif; ?>
                </div>
              </div>

              <div class="box-body table-responsive">
                <div class="box-header">
                  <h3 class="label label-primary" style="font-size: 12px; margin-right: -20px !important;">--- Detail Klasifikasi ---</h3><br><br>
                </div>
                <table id="customTable" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php if (!empty($klasifikasi)): ?>
                      <?php foreach ($klasifikasi as $nilai): ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $nilai->nama_barang; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="2">Data tidak ditemukan</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view("admin/_includes/footer.php") ?>
    <?php $this->load->view("admin/_includes/control_sidebar.php") ?>
    <div class="control-sidebar-bg"></div>
  </div>

  <!-- Logout Delete Confirmation-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
        </div>
      </div>
    </div>
  </div>
  <!-- ./wrapper -->
  <?php $this->load->view("admin/_includes/bottom_script_view.php") ?>
  <!-- page script -->
  <script>
    function deleteConfirm(url){
      $('#btn-delete').attr('href', url);
      $('#deleteModal').modal();
    }
  </script>
</body>
</html>