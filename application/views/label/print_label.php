<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
				<?php foreach($pesanan as $psn){?>
				<div style="width:280px;border:1px solid black;float:left;padding:10px;font-size:12px;">
					Nama :
					<?php echo $psn->nama_pemesan;?></br></br>
					Alamat :</br>
					<?php echo $psn->alamat;?></br></br>
					No Hp :
					<?php echo $psn->no_hp;?></br></br>
					Detail pesanan :<br>
						<?php
							$this->load->model('pesanan_model');
							$detail_pesanan = $this->pesanan_model->get_detail_pesanan_cetak($psn->id_trans);
							foreach($detail_pesanan as $det_psn){
								$this->db->where('id_barang', $det_psn->id_barang);
								$barang = $this->db->get('barang')->row();
								echo $det_psn->qty." - ".$barang->nama_barang."<br>";
							}?>
					<br><?php
							if($psn->id_dropshipper != 0){
								$this->db->where('id_dropshipper', $psn->id_dropshipper);
								$drop = $this->db->get('dropshipper')->row();
								echo $drop->nama_dropshipper.", ".$drop->alamat_dropshipper;
							}else{
								echo "VIOLETTE, Bandung";
							}
						?>
				</div>
				<?php }?>
          </div>
          <!-- /.box -->
		</div>
	  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->