<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Barang_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["barang"] = $this->Barang_model->get_all_barang();
        $this->load->view("barang/lihat_barang", $data);
    }

    public function add()
    {
        $barang = $this->Barang_model;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());
		$data['kategori'] = $this->Barang_model->get_all_kategori();

        if ($validation->run()) {
            $barang->save();
            $this->session->set_flashdata('success', 'Tambah Berhasil Disimpan');
            redirect('barang/index');
        }

        $this->load->view("barang/tambah_barang", $data);
    }

    public function edit($id){

    	$barang = $this->Barang_model;
        $validation = $this->form_validation;
        $validation->set_rules($barang->rules());

        if ($validation->run()) {
            $barang->update($id);
            $this->session->set_flashdata('success', 'Data Barang Berhasil Diubah');
            redirect('barang/index');
        }

        $data['barang'] = $this->Barang_model->getById($id);
		$data['kategori'] = $this->Barang_model->get_all_klasifikasi();
		 if ($this->session->flashdata('success')) {
        $data['success_message'] = $this->session->flashdata('success');
        // Hapus pesan flash agar tidak ditampilkan lagi
        $this->session->unset_flashdata('success');
    }
        $this->load->view('barang/edit_barang', $data);
    }

    public function delete($id){
	    $this->Barang_model->delete($id);
	    $this->session->set_flashdata('success', 'Data Barang Berhasil Dihapus');
	    redirect('barang/index');
	}

	
}
