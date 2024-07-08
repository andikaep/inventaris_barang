<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Pengguna_model extends CI_Model
{
	
	private $_table= "user";

	public $id;
	public $username;
	public $password;
	public $nama;

	public function rules()
	{
		return [
			['field' => 'username',
			'label' => 'username',
			'rules' => 'required'],

			['field' => 'password',
			'label' => 'password',
			'rules' => ''],

			['field' => 'nama',
			'label' => 'nama',
			'rules' => 'required']
		];
	}

	public function getALL(){
		return $this->db->get($this->_table)->result();
	}

	public function countAll() {
        // Hitung jumlah pengguna dalam tabel pengguna
        return $this->db->count_all('user');
    }
	
	public function getById($id){
		return $this->db->get_where($this->_table, ["id" => $id])->row();
	}

	public function save(){
		$post = $this->input->post();
		$this->username = $post["username"];
		$this->password = password_hash($post["password"], PASSWORD_DEFAULT);
		$this->nama = $post["nama"];
		$this->db->insert($this->_table, $this);
	}
	
	public function update($id){
		$data = array(
			"username" => $this->input->post('username'),
			"nama" => $this->input->post('nama')
		);

		$this->db->where('id', $id);
	    $this->db->update('user', $data);
	}
	
	public function delete($id){
		$this->db->where('id', $id);
    $this->db->delete('user');
	}
	
}
?>
