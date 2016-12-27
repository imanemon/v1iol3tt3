  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pesanan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pesanan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
	  <?php if($this->session->flashdata('sukses')){
		echo $this->session->flashdata('sukses');
	  }?>
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pesanan Pertanggal <?= $tanggal?></h3>
            </div>		
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="width:200px">Nama Pemesan</th>
                        <th style="width:400px">Alamat</th>	
                        <th style="width:100px">No Hp</th>	
                        <th>Detail Barang</th>	
                        <th style="width:200px">Dropshipper</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach($pesanan as $psn){?>
                    <tr>
                        <td>
							<?php echo $psn->nama_pemesan;?>
						</td>
                        <td>
							<?php echo $psn->alamat;?>
						</td>
                        <td>
							<?php echo $psn->no_hp;?>
						</td> 
                        <td>
							<?php
							$this->load->model('pesanan_model');
							$detail_pesanan = $this->pesanan_model->get_detail_pesanan_cetak($psn->id_trans);
							foreach($detail_pesanan as $det_psn){
								$this->db->where('id_barang', $det_psn->id_barang);
								$barang = $this->db->get('barang')->row();
								echo $det_psn->qty." - ".$barang->nama_barang."<br>";
							}?>
						</td>
                        <td>
							<?php 
							if($psn->id_dropshipper != 0){
								$this->db->where('id_dropshipper', $psn->id_dropshipper);
								$drop = $this->db->get('dropshipper')->row();
								echo $drop->nama_dropshipper;
							}?>
						</td>
                    </tr>
					<?php }?>
                    </tbody>
                </table>
				<div class="box-footer">
					<a href="<?php echo base_url('admin/print_label_tgl')?>" target="_blank" class="tambah_baru btn btn-primary" style="float:right;padding-button:0px;margin-right:10px"><i class="fa fa-print"></i> Cetak Menjadi Label</a>
				  </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</div>
	  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --><script>
  $(function () {
    $("#example1").DataTable();
  });
</script>