<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Barang_model extends CI_Model {
	public function __construct()
		{
			$this->load->database();
			$this->load->library('session');
			// $this->load->helper("back_handler");
		}
    
	function getAll_barang() {
		$query = $this->db->where('status', '1');
		$query = $this->db->get('barang');
        return $query->result();
    }
	
	function getData_barang($id_barang) {
        $this->db->where('id_barang', $id_barang);
        return $this->db->get('barang')->row();
    }
	
	function simpan_barang($data){
		$this->db->insert('barang',$data);
	}
	
	function update_barang_hapus($data,$id_barang){
		$this->db->where('id_barang', $id_barang);
		$this->db->update('barang', $data); 
	}
	
}
 
/* End of file Aktivasi_model.php */
/* Location: ./application/models/aktivasi_model.php */