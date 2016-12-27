  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cetak Label PerTanggal
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Cetak Label Tanggal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pesanan Tanggal</h3>
            </div>
            <!-- /.box-header -->			
			<div class="box-header">
              <h3 class="box-title">Date picker</h3>
            </div>
            <div class="box-body">
              <!-- Date range -->
			  <form  method="POST" action="<?php echo base_url('admin/data_cetak_tgl'); ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label>Date picker:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right datepicker" name="tanggal" id="">
                </div>
                <!-- /.input group -->
				<br>
				<button class="btn btn-primary btn-cons" type="submit">Cari</button>
              </div>
			  </form>
              <!-- /.form group -->
          </div>
		<!-- /.box -->
		</div>
	  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  