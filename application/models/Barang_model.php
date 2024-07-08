<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Barang_model extends CI_Model
{
	
	private $_table= "barang";

	public $id;
	public $klasifikasi_id;
	public $nama_barang;
	public $kondisi;
	public $lokasi;
	public $merek;
	public $departemen;

	public function rules()
	{
		return [
			['field' => 'kondisi',
			'label' => 'kondisi',
			'rules' => 'required'],

			['field' => 'nama_barang',
			'label' => 'nama_barang',
			'rules' => 'required']
		];
	}

	public function getALL(){
		return $this->db->get($this->_table)->result();
	}

	public function get_all_barang() {
        $this->db->select('barang.*, klasifikasi_barang.nama_kategori');
        $this->db->from('barang');
        $this->db->join('klasifikasi_barang', 'barang.klasifikasi_id = klasifikasi_barang.id');
        $query = $this->db->get();
        return $query->result();
    }

	public function countAll() {
        // Menghitung jumlah barang dalam tabel barang - untuk dashboard
        return $this->db->count_all('barang');
    }
	
	public function getById($id){
		return $this->db->get_where($this->_table, ["id" => $id])->row();
	}

	public function save(){
		$post = $this->input->post();
		$this->klasifikasi_id = $post["klasifikasi_id"];
		$this->nama_barang = $post["nama_barang"];
		$this->kondisi = $post["kondisi"];
		$this->lokasi = $post["lokasi"];
		$this->merek = $post["merek"];
		$this->departemen = $post["departemen"];
		$this->db->insert($this->_table, $this);
	}
	
	public function update($id){
		$data = array(
			"nama_barang" => $this->input->post('nama_barang'),
			"klasifikasi_id" => $this->input->post('klasifikasi_id'),
			"kondisi" => $this->input->post('kondisi'),
			"lokasi" => $this->input->post('lokasi'),
			"merek" => $this->input->post('merek'),
			"departemen" => $this->input->post('departemen')
		);

		$this->db->where('id', $id);
	    $this->db->update('barang', $data);
	}

	public function get_all_klasifikasi() {
        $query = $this->db->get('klasifikasi_barang');
        return $query->result();
    }

	public function get_all_kategori() {
		return $this->db->get('klasifikasi_barang')->result();
	  }

	public function delete($id){
		$this->db->where('id', $id);
    $this->db->delete('barang');
	}

	
}
?>
