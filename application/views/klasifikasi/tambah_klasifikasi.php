<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html>
<?php $this->load->view("admin/_includes/head.php") ?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php $this->load->view("admin/_includes/header.php") ?>
    <?php $this->load->view("admin/_includes/sidebar.php") ?>

    <div class="content-wrapper">

      <section class="content-header">
        <h1>
          Kelola
          <small>Data Klasifikasi Barang</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-fw fa-user-plus"></i> Klasifikasi Barang</a></li>
          <li><a href="<?php echo base_url('klasifikasi/index') ?>">Lihat Data Klasifikasi</a></li>
          <li><a href="<?php echo base_url('klasifikasi/add') ?>">Tambah Data Klasifikasi</a></li>
        </ol>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Form Tambah Klasifikasi</h3>
              </div>
              <form role="form" action="<?php echo base_url('klasifikasi/add') ?>" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label>Nama</label>
                    <input name="nama_kategori" class="form-control <?php echo form_error('nama_kategori') ? 'is-invalid':'' ?>" placeholder="Masukan Nama" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('nama_kategori') ?>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
              <button class="btn btn-success" name="submit" type="button" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-fw fa-plus"></i>Simpan</button>

<!-- Modal Simpan Data-->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="confirmModalLabel">Konfirmasi Simpan Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Apakah Anda yakin ingin menambahkan klasifikasi barang baru?</h4>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success">Simpan</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
                  <button class="btn btn-danger" type="button" onclick="window.history.back();"><i style="margin-left: -3px;" class="fa fa-fw fa-times"></i>Batal</button>
                  <button class="btn btn-warning" type="reset"><i style="margin-left: -3px;" class="fa fa-fw fa-undo"></i>Clear Data</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php $this->load->view("admin/_includes/footer.php") ?>
    <?php $this->load->view("admin/_includes/control_sidebar.php") ?>
   <div class="control-sidebar-bg"></div>
 </div>
 <?php $this->load->view("admin/_includes/bottom_script_view.php") ?>
</body>
</html>