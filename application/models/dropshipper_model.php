<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Dropshipper_model extends CI_Model {
	public function __construct()
		{
			$this->load->database();
			$this->load->library('session');
			// $this->load->helper("back_handler");
		}
    
	function getAll_dropshipper() {
		$query = $this->db->where('status', '1');
		$query = $this->db->get('dropshipper');
        return $query->result();
    }
	
	function getData_dropshipper($id_dropshipper) {
        $this->db->where('id_dropshipper', $id_dropshipper);
        return $this->db->get('dropshipper')->row();
    }
	
	function simpan_dropshipper($data){
		$this->db->insert('dropshipper',$data);
	}
	
	function update_dropshipper_hapus($data,$id_dropshipper){
		$this->db->where('id_dropshipper', $id_dropshipper);
		$this->db->update('dropshipper', $data); 
	}
	
}
 
/* End of file Aktivasi_model.php */
/* Location: ./application/models/aktivasi_model.php */