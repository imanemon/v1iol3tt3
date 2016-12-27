  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hapus Barang
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Hapus Barang</li>
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
              <h3 class="box-title">Data Barang</h3>
            </div>		
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id Barang</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>harga</th>
                  <th>tindakan</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($barang as $brg){?>
                    <tr>
                        <td>
							<?php echo $brg->id_barang;?>
						</td>
                        <td>
							<?php echo $brg->kode_barang;?>
						</td>
                        <td>
							<?php echo $brg->nama_barang;?>
						</td>
                        <td>
							<?php echo $brg->harga;?>
						</td>
						<td class="center">
							<form name="tindakan" id="tindakan" method="POST" action="<?php echo base_url('admin/simpan_hapus_barang')?>">
							<input type="hidden" name="id_barang" value="<?php echo $brg->id_barang; ?>">
							<input type="hidden" name="nama_barang" value="<?php echo $brg->nama_barang; ?>">
							<input type="submit" value="Hapus" class="btn btn-danger"/>
							</form>
						</td>
                    </tr>
					<?php }?>
                </tfoot>
              </table>
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