<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pesanan_model extends CI_Model {
	public function __construct()
		{
			$this->load->database();
			$this->load->library('session');
			// $this->load->helper("back_handler");
		}
    
	function simpan_pesanan($data){
		$query = $this->db->insert('transaksi',$data);
		return $this->db->insert_id();
	}
	
	function update_pesanan($data,$id_trans){
		$this->db->where('id_trans', $id_trans);
		$this->db->update('transaksi', $data); 
	}
	
	function update_print(){
		$data = array(
			'status' => '1',
		);
		$this->db->where('status', '0');
		$this->db->update('transaksi', $data); 
	}
	
	function update_sms(){
		$data = array(
			'status' => '3',
		);
		$this->db->where('status', '2');
		$this->db->update('transaksi', $data); 
	}
	
	function update_resi($data,$nama){
		$this->db->where('nama_pemesan', $nama);
		$this->db->update('transaksi', $data); 
	}
	
	function simpan_detail_pesanan($data){
		$query = $this->db->insert('detail_transaksi',$data);
		return $this->db->insert_id();
	}
	
	function get_pesanan_cetak(){
        $this->db->where('status', '0');
        return $this->db->get('transaksi')->result();
	}
	
	function get_pesanan_cetak_tgl($tgl_trans){
        $where = "status='0' OR status='1'";
        $this->db->where($where);
        $this->db->where('tgl_trans', $tgl_trans);
        return $this->db->get('transaksi')->result();
	}
	
	function get_detail_pesanan_cetak($id_trans){
        $this->db->where('id_trans', $id_trans);
        return $this->db->get('detail_transaksi')->result();
	}
	
	function get_pesanan_resi(){
        $this->db->where('status', '2');
        return $this->db->get('transaksi')->result();
	}
	
	
}
 
/* End of file Pesanan_model.php */
/* Location: ./application/models/Pesanan_model.php */