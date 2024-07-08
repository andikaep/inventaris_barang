<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<?php $this->load->view("admin/_includes/head.php") ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view("admin/_includes/header.php") ?>
  <?php $this->load->view("admin/_includes/sidebar.php") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php if (isset($success_message) && !empty($success_message)): ?>
      <div class="alert alert-success" role="alert">
        <?php echo $success_message; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>

    <section class="content-header">
      <h1>
        Kelola
        <small>Data Klasifikasi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-fw fa-child"></i> Klasifikasi</a></li>
        <li><a href="<?php echo base_url('klasifikasi/index') ?>">Lihat Data Klasifikasi</a></li>
        <li><a href="">Edit Data Klasifikasi</a></li>
      </ol>
    </section>
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pengisian Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('klasifikasi/edit/'.$klasifikasi->id) ?>" method="post">
              <input type="hidden" name="id" value="<?php echo $klasifikasi->id?>" />
              <div class="box-body">
                <div class="form-group">
                  <label>Nama</label>
                  <input name="nama_kategori" class="form-control <?php echo form_error('nama_kategori') ? 'is-invalid':'' ?>" placeholder="Masukan Nama" value="<?php echo $klasifikasi->nama_kategori?>" type="text">
                  <div class="invalid-feedback">
                    <?php echo form_error('nama_kategori') ?>
                  </div>
                </div>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              <button class="btn btn-success" name="submit" type="button" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-fw fa-plus"></i>Simpan</button>

<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="confirmModalLabel">Konfirmasi Update Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Apakah Anda yakin ingin menyimpan data baru?</h4>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success">Simpan</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

    <button class="btn btn-danger" type="button" onclick="window.history.back();"><i style="margin-left: -3px;" class="fa fa-fw fa-times"></i>Batal</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view("admin/_includes/footer.php") ?>
  <?php $this->load->view("admin/_includes/control_sidebar.php") ?>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php $this->load->view("admin/_includes/bottom_script_view.php") ?>
<!-- page script -->
<script type="text/javascript">
    $(".alert").delay(5000).slideUp(200, function () {
        $(this).alert('close');
    });
</script>
</body>
</html>
