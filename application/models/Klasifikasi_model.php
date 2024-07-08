<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Klasifikasi_model extends CI_Model
{
	
	private $_table= "klasifikasi_barang";

	public $id;
	public $nama_kategori;

	public function rules()
	{
		return [

			['field' => 'nama_kategori',
			'label' => 'nama_kategori',
			'rules' => 'required']
		];
	}

	public function getALL(){
		return $this->db->get($this->_table)->result();
	}
	
	public function countAll() {
        
        return $this->db->count_all('klasifikasi_barang');
    }

	public function getBarangByKlasifikasi($klasifikasi_id) {
		$this->db->select('klasifikasi_barang.nama_kategori, barang.nama_barang');
		$this->db->from('barang');
		$this->db->join('klasifikasi_barang', 'barang.klasifikasi_id = klasifikasi_barang.id');
		$this->db->where('barang.klasifikasi_id', $klasifikasi_id);
		$query = $this->db->get();
		return $query->result();	
	}

	public function getById($id){
		return $this->db->get_where($this->_table, ["id" => $id])->row();
	}

	public function save(){
		$post = $this->input->post();
		$this->nama_kategori = $post["nama_kategori"];
		$this->db->insert($this->_table, $this);
	}
	
	public function update($id){
		$data = array(
			"nama_kategori" => $this->input->post('nama_kategori')
		);

		$this->db->where('id', $id);
	    $this->db->update('klasifikasi_barang', $data);
	}

	
	public function delete($id){
		$this->db->where('id', $id);
    $this->db->delete('klasifikasi_barang');
	}

}


?>