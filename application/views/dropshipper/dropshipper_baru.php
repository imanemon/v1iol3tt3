  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dropshipper Baru
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dropshipper Baru</li>
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
              <h3 class="box-title">Dropshipper Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('admin/simpan_dropshipper_baru')?>" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="nama">Nama Dropshipper</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pemesan">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat Dropshipper</label>
                  <input type="textarea" class="form-control" id="alamat" name="alamat" placeholder="Alamat Pemesan">
                </div>
                <div class="form-group">
                  <label for="no_hp">Nomor HP Dropshipper</label>
                  <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP Pemesan">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
		</div>
	  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->