<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/

class Klasifikasi extends MY_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model("Klasifikasi_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["klasifikasi"] = $this->Klasifikasi_model->getAll();
        $this->load->view("klasifikasi/lihat_klasifikasi", $data);
    }

    public function detail($id){
        $this->load->model('Klasifikasi_model'); 
        $data['klasifikasi'] = $this->Klasifikasi_model->getBarangByKlasifikasi($id);
        
        if (empty($data['klasifikasi'])) {
            $data['nama_kategori'] = 'Data tidak ditemukan';
        } else {
            $data['nama_kategori'] = $data['klasifikasi'][0]->nama_kategori;
        }
        
        $this->load->view("klasifikasi/detail_klasifikasi", $data);
    }
    
	
    public function add()
    {
        $klasifikasi = $this->Klasifikasi_model;
        $validation = $this->form_validation;
        $validation->set_rules($klasifikasi->rules());

        if ($validation->run()) {
            $klasifikasi->save();
            $this->session->set_flashdata('success', 'Tambah Klasifikasi Barang Berhasil Disimpan');
            redirect('klasifikasi/index');
        }

        $this->load->view("klasifikasi/tambah_klasifikasi");
    }

    public function edit($id){

    	$klasifikasi = $this->Klasifikasi_model;
        $validation = $this->form_validation;
        $validation->set_rules($klasifikasi->rules());

        if ($validation->run()) {
            $klasifikasi->update($id);
            $this->session->set_flashdata('success', 'Data Klasifikasi Berhasil Diubah');
            redirect('klasifikasi/index');

        }
        $data['klasifikasi'] = $this->Klasifikasi_model->getById($id);
		if ($this->session->flashdata('success')) {
			$data['success_message'] = $this->session->flashdata('success');
			
			$this->session->unset_userdata('success');
		}
        $this->load->view('klasifikasi/edit_klasifikasi', $data);
    }

    public function delete($id){
	    $this->Klasifikasi_model->delete($id);
	    $this->session->set_flashdata('success', 'Data Klasifikasi Berhasil Dihapus');
	    redirect('klasifikasi/index');
	}

	
}
