<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		if ($this->session->userdata('authenticated'))
			$this->load->view('admin/dashboard');
		$this->load->view('admin/login');
	}

	public function add()
	{
		$register = $this->Register_model;
		$validation = $this->form_validation;
		$validation->set_rules($register->rules());
		$username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
		$password = ($this->input->post('password'));
		$user = $this->User_model->get($username); // Panggil fungsi get yang ada di UserModel.php

		if ($validation->run()) {
			$register->save();
			$username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
			$password = ($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
			$user = $this->User_model->get($username); // Panggil fungsi get yang ada di UserModel.php
			if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
				$this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata
				redirect('Auth'); // Redirect ke halaman login
			}else{
				if($password == $user->password){ // Jika password yang diinput sama dengan password yang didatabase
					$session = array(
						'authenticated'=>true, // Buat session authenticated dengan value true
						'username'=>$user->username,  // Buat session username
						'nama'=>$user->nama, // Buat session authenticated
						'id'=>$user->id
					);
					$this->session->set_userdata($session); // Buat session sesuai $session
					$this->session->set_flashdata('success', 'Nama Anda : '.$register->nama.' Berhahasil Di Registerasi Di Sistem Kami');
					redirect('Dashboard', $user);

				}else{
					$this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
					redirect('Auth'); // Redirect ke halaman login
				}
			}
//			redirect('Auth');
		}
		$this->load->view("admin/register");
	}

	public function login(){
		$username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
		$password = ($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
		$user = $this->User_model->get($username); // Panggil fungsi get yang ada di UserModel.php
		if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
			$this->session->set_flashdata('message', 'Username tidak ditemukan');
			 // Buat session flashdata
			redirect('Auth'); // Redirect ke halaman login
		}else{
			if (password_verify($password, $user->password)) { // Jika password yang diinput sama dengan password yang didatabase
				$session = array(
					'authenticated'=>true, // Buat session authenticated dengan value true
					'username'=>$user->username,  // Buat session username
					'nama'=>$user->nama, // Buat session authenticated
					'id'=>$user->id
				);
			
				$this->session->set_userdata($session); // Buat session sesuai $session
				redirect('Dashboard', $user);

			}else{
				$this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
				redirect('Auth'); // Redirect ke halaman login
			}
		}
	}

	public  function  logout(){
		$this->session->sess_destroy();
		redirect('Auth');
	}

}
