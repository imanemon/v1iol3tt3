  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cetak Label
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Cetak Label</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	  <?php if($this->session->flashdata('sukses')){
		echo $this->session->flashdata('sukses');
	  }?>
      <!-- Info boxes -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pesanan Baru</h3>
            </div>
            <!-- /.box-header -->			
			<table class="table table-bordered table-striped table-condensed" id="input_fields_wrap">
                    <thead>
                    <tr>
                        <th>Nama Pemesan</th>
                        <th>No Hp</th>	
                        <th>No. Resi</th>
                        <th>Drop Shipper</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach($pesanan as $psn){?>
                    <tr>
                        <td>
							<?php echo $psn->nama_pemesan;?>
						</td>
                        <td>
							<?php echo $psn->no_hp;?>
						</td>
                        <td>
							<?php echo $psn->no_resi;?>
						</td>
                        <td>
							<?php
								if($psn->id_dropshipper!=0){
									$this->db->where('id_dropshipper', $psn->id_dropshipper);
									$drop = $this->db->get('dropshipper')->row();
									echo $drop->nama_dropshipper;
								}else{
									echo "-";
								}
							?>
						</td>
                    </tr>
					<?php }?>
                    </tbody>
                </table>
				<div class="box-footer">
                <a href="<?php echo base_url('admin/kirim_sms')?>" class="tambah_baru btn btn-primary" style="float:right;padding-button:0px;margin-right:10px"><i class="fa fa-mail-forward"></i> Kirim SMS</a>
              </div>
          </div>
          <!-- /.box -->
		</div>
	  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->