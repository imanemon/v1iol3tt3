<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	/*
		Keterangan Status Pesanan/Transaksi
		0 = pesanan baru di simpan
		1 = print label pesanan
		2 = pesanan telah memiliki resi
		3 = resi telah dikirim pada pelanggan
	*/
	public function index()
	{
		$this->load->view('header');
		$this->load->view('dashboard/content');
		$this->load->view('footer');
	}
	public function dashboard()
	{
		$this->load->view('header');
		$this->load->view('dashboard/content');
		$this->load->view('footer');
	}
	
	/*-----------------------------
		PESANAN BARANG BARU VIOLETTE
	-------------------------------*/
	public function pesanan_baru()
	{
		$this->load->model('barang_model');
		$data['barang'] = $this->barang_model->getAll_barang();
		$this->load->view('header');
		$this->load->view('pesanan/pesanan_baru',$data);
		$this->load->view('footer');
		// $this->load->view('pesanan_baru_js');
	}
	
	public function simpan_pesanan_baru(){
		$this->load->model('pesanan_model');
		$this->load->model('barang_model');
		
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		
		$data = array(
			'id_dropshipper' => '0', // jika 0 maka itu violette
			'nama_pemesan' => $nama,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'tgl_trans' => date('Y-m-d'),
			'status' => '0'//status 0 untuk menerima pesanan baru
		);
		
		$id_trans = $this->pesanan_model->simpan_pesanan($data);
		
		echo $id_trans;
		
		$counter = 0;
		$total_harga = 0;
		foreach($_POST['id_barang'] as $data){
			$barang = $this->barang_model->getData_barang($_POST['id_barang'][$counter]);
			$detail_harga = $barang->harga*$_POST['qty'][$counter];
			
			$data = array(
				'id_trans' => $id_trans,
				'id_barang' => $_POST['id_barang'][$counter],
				'qty' => $_POST['qty'][$counter],
				'harga_detail_trans' => $detail_harga,
			);
			
			$total_harga = $total_harga + $detail_harga;
			$this->pesanan_model->simpan_detail_pesanan($data);
			
			$counter++;
		}
		
		$data = array(
			'nama_pemesan' => strtoupper($nama."#".$id_trans),
			'total_harga' => $total_harga,
		);
		
		$this->pesanan_model->update_pesanan($data,$id_trans);
		
		$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                Data Pemesan Atas Nama : '.$nama.' telah disimpan.
              </div>');
		
		redirect('admin/pesanan_baru');
		
	}
	
	/*-----------------------------
		PESANAN BARANG BARU DROPSHIPPER
	-------------------------------*/
	public function pesanan_baru_dropshipper()
	{
		$this->load->model('barang_model');
		$this->load->model('dropshipper_model');
		$data['barang'] = $this->barang_model->getAll_barang();
		$data['dropshipper'] = $this->dropshipper_model->getAll_dropshipper();
		$this->load->view('header');
		$this->load->view('pesanan/pesanan_baru_dropshipper',$data);
		$this->load->view('footer');
		// $this->load->view('pesanan_baru_js');
	}
	
	public function simpan_pesanan_baru_dropshipper(){
		$this->load->model('pesanan_model');
		$this->load->model('barang_model');
		// $this->load->model('dropshipper_model');
		
		$id_dropshipper = $this->input->post('dropshipper');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		
		$data = array(
			'id_dropshipper' => $id_dropshipper,
			'nama_pemesan' => $nama,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			'tgl_trans' => date('Y-m-d'),
			'status' => '0'//status 0 untuk menerima pesanan baru
		);
		
		$id_trans = $this->pesanan_model->simpan_pesanan($data);
		
		echo $id_trans;
		
		$counter = 0;
		$total_harga = 0;
		$detail_harga = 0;
		foreach($_POST['id_barang'] as $data){
			$barang = $this->barang_model->getData_barang($_POST['id_barang'][$counter]);
			$detail_harga = $barang->harga*$_POST['qty'][$counter];
			
			$data = array(
				'id_trans' => $id_trans,
				'id_barang' => $_POST['id_barang'][$counter],
				'qty' => $_POST['qty'][$counter],
				'harga_detail_trans' => $detail_harga,
			);
			
			$total_harga = $total_harga + $detail_harga;
			$this->pesanan_model->simpan_detail_pesanan($data);
			
			$counter++;
		}
		
		$data = array(
			'nama_pemesan' => strtoupper($nama."#".$id_trans),
			'total_harga' => $total_harga,
		);
		
		$this->pesanan_model->update_pesanan($data,$id_trans);
		
		$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                Data Pemesan Atas Nama : '.$nama.' telah disimpan.
              </div>');
		
		redirect('admin/pesanan_baru_dropshipper');
		
	}
	
	/*-----------------------------
		MENCETAK LABEL PESANAN BARU
	-------------------------------*/
	
	public function cetak_label()
	{
		$this->load->model('pesanan_model');
		//ambil data dengan status 0
		$data['pesanan'] = $this->pesanan_model->get_pesanan_cetak();
		$this->load->view('header');
		$this->load->view('label/cetak_label',$data);
		$this->load->view('footer');
	}
	
	public function print_label()
	{
		$this->load->model('pesanan_model');
		$data['pesanan'] = $this->pesanan_model->get_pesanan_cetak();
		$this->load->view('label/print_label',$data);
		//ambil data dengan status 0 ubah menjadi 1 tanda sudah di cetak label
		$this->pesanan_model->update_print();
	}
	
	/*-----------------------------
		MENCETAK LABEL Tanggal Tertentu
	-------------------------------*/
	
	public function cetak_label_tgl()
	{
		$this->load->view('header');
		$this->load->view('label/cetak_label_tgl');
		$this->load->view('footer');
	}
	
	public function data_cetak_tgl()
	{
		$tanggal = $_POST['tanggal'];
		$originalDate = $tanggal;
		$tgl = date("Y-m-d", strtotime($originalDate));
		$this->load->model('pesanan_model');
		$data["tanggal"] = $tanggal;
		$data["pesanan"] = $this->pesanan_model->get_pesanan_cetak_tgl($tgl);
		$data_session = array(
			'tgl' => $tgl,
		);
		$this->session->set_userdata($data_session);
		
		$this->load->view('header');
		$this->load->view('label/data_cetak_tgl',$data);
		$this->load->view('footer');
	}
	
	public function print_label_tgl()
	{
		$tgl = $this->session->userdata('tgl');
		$this->load->model('pesanan_model');
		$data['pesanan'] = $this->pesanan_model->get_pesanan_cetak_tgl($tgl);
		$this->load->view('label/print_label',$data);
		//ambil data dengan status 0 ubah menjadi 1 tanda sudah di cetak label
		$this->pesanan_model->update_print();
	}

	/*-----------------------------
		MENYIMPAN RESI BARU
	-------------------------------*/
	
	public function resi_baru()
	{
		$this->load->view('header');
		$this->load->view('resi/resi_baru');
		$this->load->view('footer');
	}
	
	public function simpan_resi_baru()
	{
		$this->load->model('pesanan_model');
		
		$counter = 0;
		foreach($_POST['nama'] as $data){
			
			$data = array(
				'no_resi' => $_POST['resi'][$counter],
				'status' => '2',//2 untuk menunjukan telah memiliki nomor resi
			);
			
			$this->pesanan_model->update_resi($data,strtoupper($_POST['nama'][$counter]));
			
			$counter++;
		}
		
		$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                Data Resi telah disimpan.
              </div>');
		redirect('admin/resi_baru');
	}
	
	/*-----------------------------
		KIRIM RESI MELALUI SMS
	-------------------------------*/
	
	public function kirim_resi()
	{
		$this->load->model('pesanan_model');
		//ambil data dengan status 0
		$data['pesanan'] = $this->pesanan_model->get_pesanan_resi();
		$this->load->view('header');
		$this->load->view('resi/kirim_resi',$data);
		$this->load->view('footer');
	}
	
	public function kirim_sms()
	{
		$this->load->model('pesanan_model');
		//ambil data dengan status 0
		$data_sms = $this->pesanan_model->get_pesanan_resi();
		
		foreach($data_sms as $data){
			$id_dropshipper = $data->id_dropshipper;
			$nama = $data->nama_pemesan;
			$no_hp = $data->no_hp;
			$no_resi = $data->no_resi;
			echo $nama."<br>";
			echo $no_hp."<br>";
			echo $no_resi."<br>";
			echo "<br>";
			$this->sms_api($id_dropshipper,$nama,$no_hp,$no_resi);
		}
		$this->pesanan_model->update_sms();
		
		$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                Nomor Resi telah dikirim kepada Pembeli.
              </div>');
		
		redirect('admin/kirim_resi');
	}
	
	private function sms_api($id_dropshipper,$nama,$nohp,$no_resi){
		// Script Kirim SMS Api Zenziva
		$userkey="cbzai3"; // userkey lihat di zenziva
		//username = ade_galih
		$passkey="dafiq1234"; // set passkey di zenziva
		if($id_dropshipper == 0){
			$message="Violette, Halo ".$nama.", No. Resi kamu : ".$no_resi." , Terimakasih sudah bertransaksi";
		}else{
			$this->load->model('dropshipper_model');
			$drop = $this->dropshipper_model->getData_dropshipper($id_dropshipper);
			$message=$drop->nama_dropshipper.", Halo ".$nama.", No. Resi kamu : ".$no_resi." , Terimakasih sudah bertransaksi";
		}

		$url = "https://reguler.zenziva.net/apps/smsapi.php";

		$curlHandle = curl_init();

		curl_setopt($curlHandle, CURLOPT_URL, $url);

		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$nohp.'&pesan='.urlencode($message));

		curl_setopt($curlHandle, CURLOPT_HEADER, 0);

		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);

		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);

		curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);

		curl_setopt($curlHandle, CURLOPT_POST, 1);

		$results = curl_exec($curlHandle);

		curl_close($curlHandle);
		
	}
	
	/*-----------------------------
		DATA DROPSHIPPER BARU
	-------------------------------*/
	public function dropshipper_baru()
	{
		$this->load->view('header');
		$this->load->view('dropshipper/dropshipper_baru');
		$this->load->view('footer');
		// $this->load->view('pesanan_baru_js');
	}
	
	public function simpan_dropshipper_baru(){
		$this->load->model('dropshipper_model');
		
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		
		$data = array(
			'nama_dropshipper' => $nama,
			'alamat_dropshipper' => $alamat,
			'no_hp_dropshipper' => $no_hp,
			'status' => '1'//status 0 untuk menerima pesanan baru
		);
		
		$this->dropshipper_model->simpan_dropshipper($data);
				
		$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                Data Pemesan Atas Nama : '.$nama.' telah disimpan.
              </div>');
		
		redirect('admin/dropshipper_baru');
		
	}
	
	/*-----------------------------
		MENGHAPUS DROPSHIPPER
	-------------------------------*/
	
	public function hapus_dropshipper()
	{
		$this->load->model('dropshipper_model');
		//ambil data dengan status 1
		$data['dropshipper'] = $this->dropshipper_model->getAll_dropshipper();
		$this->load->view('header');
		$this->load->view('dropshipper/hapus_dropshipper',$data);
		$this->load->view('footer');
	}
	
	public function simpan_hapus_dropshipper()
	{
		$this->load->model('dropshipper_model');
		
		$id_dropshipper = $_POST['id_dropshipper'];
		$nama_dropshipper = $_POST['nama_dropshipper'];
		
		$data = array(
			'status' => '0',
		);
		
		$this->dropshipper_model->update_dropshipper_hapus($data,$id_dropshipper);
		
		$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                Data Barang '.$nama_dropshipper.' telah dihapus.
              </div>');
		redirect('admin/hapus_dropshipper');
	}
		
	/*-----------------------------
		SIMPAN BARANG BARU
	-------------------------------*/
	
	public function barang_baru()
	{
		$this->load->view('header');
		$this->load->view('barang/barang_baru');
		$this->load->view('footer');
	}
	
	public function simpan_barang_baru()
	{
		$this->load->model('barang_model');
		
		$counter = 0;
		foreach($_POST['nama_barang'] as $data){
			
			$data = array(
				'kode_barang' => $_POST['kode_barang'][$counter],
				'nama_barang' => $_POST['nama_barang'][$counter],
				'harga' => $_POST['harga'][$counter],
				'status' => '1', //tandanya barang ada 
			);
			$this->barang_model->simpan_barang($data);
			
			$counter++;
		}
		
		$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                Data Barang Baru telah disimpan.
              </div>');
		redirect('admin/barang_baru');
	}
		
	/*-----------------------------
		MENGHAPUS BARANG
	-------------------------------*/
	
	public function hapus_barang()
	{
		$this->load->model('barang_model');
		//ambil data dengan status 1
		$data['barang'] = $this->barang_model->getAll_barang();
		$this->load->view('header');
		$this->load->view('barang/hapus_barang',$data);
		$this->load->view('footer');
	}
	
	public function simpan_hapus_barang()
	{
		$this->load->model('barang_model');
		
		$id_barang = $_POST['id_barang'];
		$nama_barang = $_POST['nama_barang'];
		
		$data = array(
			'status' => '0',
		);
		
		$this->barang_model->update_barang_hapus($data,$id_barang);
		
		$this->session->set_flashdata('sukses','<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                Data Barang '.$nama_barang.' telah dihapus.
              </div>');
		redirect('admin/hapus_barang');
	}
	
}
