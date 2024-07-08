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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <section class="content-header">
        <h1>
          Kelola
          <small>Data Barang</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-fw fa-user-plus"></i> Barang</a></li>
          <li><a href="<?php echo base_url('barang/index') ?>">Lihat Data Barang</a></li>
          <li><a href="<?php echo base_url('barang/add') ?>">Tambah Data Barang</a></li>
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
              <form role="form" action="<?php echo base_url('barang/add') ?>" method="post">
                <div class="box-body">
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input name="nama_barang" class="form-control <?php echo form_error('nama_barang') ? 'is-invalid':'' ?>" placeholder="Masukkan Nama Barang" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('nama_barang') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Klasifikasi Barang</label>
                    <select name="klasifikasi_id" class="form-control <?php echo form_error('klasifikasi_id') ? 'is-invalid':'' ?>">
                      <option value="">Pilih Klasifikasi</option>
                      <?php foreach ($kategori as $kat): ?>
                        <option value="<?php echo $kat->id ?>"><?php echo $kat->nama_kategori ?></option>
                      <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                      <?php echo form_error('klasifikasi_id') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Kondisi</label>
                    <select name="kondisi" class="form-control <?php echo form_error('kondisi') ? 'is-invalid':'' ?>">
                      <option value="Berfungsi">Berfungsi</option>
                      <option value="Tidak Berfungsi">Tidak Berfungsi</option>
                    </select>
                    <div class="invalid-feedback">
                      <?php echo form_error('kondisi') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Lokasi</label>
                    <input name="lokasi" class="form-control <?php echo form_error('lokasi') ? 'is-invalid':'' ?>" placeholder="Masukkan Lokasi" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('lokasi') ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Merek</label>
                    <input name="merek" class="form-control <?php echo form_error('merek') ? 'is-invalid':'' ?>" placeholder="Masukan Merek" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('merek')?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Departemen</label>
                    <input name="departemen" class="form-control <?php echo form_error('departemen') ? 'is-invalid':'' ?>" placeholder="Masukan Departemen" type="text">
                    <div class="invalid-feedback">
                      <?php echo form_error('departemen')?>
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
        <h4 class="modal-title" id="confirmModalLabel">Konfirmasi Simpan Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Apakah Anda yakin ingin menambahkan data barang baru?</h4>
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

</body>
</html>