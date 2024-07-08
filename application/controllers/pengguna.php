<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Pengguna_model");
        $this->load->model("User_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["pengguna"] = $this->Pengguna_model->getAll();
        
        $this->load->view("pengguna/lihat_pengguna", $data);
    }

    

    public function add()
    {
        $pengguna = $this->Pengguna_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengguna->rules());

        if ($validation->run()) {
            // input password dari form
            $password = $this->input->post('password');

            // Enkripsi password (hash)
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $pengguna->password = $hashed_password;
            $pengguna->save();
            $this->session->set_flashdata('success', 'Tambah Pengguna '.$pengguna->nama.' Berhasil Disimpan');
            redirect('pengguna/index');
        }

        $this->load->view("pengguna/tambah_pengguna");
    }

    public function edit($id){

    	$pengguna = $this->Pengguna_model;
        $validation = $this->form_validation;
        $validation->set_rules($pengguna->rules());

        if ($validation->run()) { // validasi form
            $pengguna->update($id); // update data
            $this->session->set_flashdata('success', '<div class="alert alert-success">Data Pengguna ' . $pengguna->getById($id)->nama . ' berhasil diubah.</div>');
            redirect('pengguna/index');
        }

        $data['pengguna'] = $this->Pengguna_model->getById($id);
		 if ($this->session->flashdata('success')) {
        $data['success_message'] = $this->session->flashdata('success');
        // Hapus pesan flash agar tidak ditampilkan lagi
        $this->session->unset_flashdata('success');
    }
        $this->load->view('pengguna/edit_pengguna', $data);
    }

    public function edit_password($id) {
        // Ambil data pengguna berdasarkan ID
        $data['pengguna'] = $this->Pengguna_model->getById($id);
    
        // Set aturan validasi
        $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*[a-zA-Z])(?=.*\d).{5,}$/]|matches[confirm_password]', array(
            'required' => '<span style="color: #ff6347;">Ulangi! </span>Password harus diisi.',
            'regex_match' => '<span style="color: #ff6347;">Ulangi! </span>Password harus terdiri dari minimal 5 karakter yang terdiri dari setidaknya satu huruf dan satu angka.',
            'matches' => '<span style="color: #ff6347;">Ulangi! </span>Konfirmasi Password tidak sama dengan password baru.'
        ));
        
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required', array(
            'required' => '<span style="color: #ff6347;">Ulangi! </span>Konfirmasi Password harus diisi.'
        ));

if ($this->form_validation->run()) {
    // Ambil password dari form
    $password = $this->input->post('password');

    // Ambil password konfirmasi dari form
    $confirm_password = $this->input->post('confirm_password');

    // Memeriksa apakah kedua password sama
    if ($password !== $confirm_password) {
        // Set pesan error jika password tidak sama
        $this->session->set_flashdata('error', '<div class="alert alert-danger">Password konfirmasi tidak sama dengan password baru.</div>');
        
        // Redirect kembali ke halaman edit password
        redirect('pengguna/edit_password/'.$id);
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Update password pengguna
    $this->Pengguna_model->update_password($id, $hashed_password);

    // Set pesan sukses
    $this->session->set_flashdata('success', '<div class="alert alert-success">Password pengguna ' . $data['pengguna']->nama . ' berhasil diubah.</div>');

    // Redirect ke halaman pengguna
    redirect('');
}

    
        // Tampilkan halaman edit password
        $this->load->view('pengguna/edit_password', $data);
    }
    

    public function reset_password($id) {
        // Reset password ke password yang sudah ditentukan
        $new_password = "1234a";
    
        // Reset password pengguna
        $this->Pengguna_model->reset_password($id, $new_password);
    
        // Ambil nama pengguna dari database
        $pengguna = $this->Pengguna_model->getById($id);
        $nama_pengguna = $pengguna->nama;
    
        $this->session->set_flashdata('success', 'Password <span style="font-weight: bold; color: black;">' . $nama_pengguna . '</span> berhasil direset.');
    
        // Redirect ke halaman pengguna
        redirect('pengguna/index');
    }
    

    public function delete($id){
	    $this->Pengguna_model->delete($id);
	    $this->session->set_flashdata('success', 'Data Pengguna Berhasil Dihapus');
	    redirect('pengguna/index');
	}

}
