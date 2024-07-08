<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends MY_Controller {

	public function index()
	{
		$this->load->model('Barang_model');
		$this->load->model('Klasifikasi_model');
		$this->load->model('Pengguna_model');
		

        // Panggil metode countAll() dari model Pegawai_model
        $data['jumlah_barang'] = $this->Barang_model->countAll();

        // Panggil metode countAll() dari model Pegawai_model
        $data['jumlah_klasifikasi'] = $this->Klasifikasi_model->countAll();

		// Panggil metode countAll() dari model Pegawai_model
		$data['jumlah_pengguna'] = $this->Pengguna_model->countAll();



		
		$this->load->view('admin/dashboard', $data);
	}

	public function petunjuk() {
		$this->load->view('admin/petunjuk');
	}

}

/* End of file Controllername.php */
