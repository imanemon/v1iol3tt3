  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pesanan Baru Dropshipper
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pesanan Baru Dropshipper</li>
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
              <h3 class="box-title">Form Pesanan Baru Dropshipper</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('admin/simpan_pesanan_baru_dropshipper')?>" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="nama">Nama Dropshipper</label>
					<select class="form-control select2" style="width: 100%;" name="dropshipper" data-placeholder="Pilih Dropshipper">
						  <option value="">Nama Dropshipper</option>
						  <?php
							foreach($dropshipper as $drop){
								echo "<option value=".$drop->id_dropshipper.">".$drop->nama_dropshipper."</option>";
							}
						  ?>
					</select>
                </div>
                <div class="form-group">
                  <label for="nama">Nama Pemesan</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pemesan">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat Pemesan</label>
                  <input type="textarea" class="form-control" id="alamat" name="alamat" placeholder="Alamat Pemesan">
                </div>
                <div class="form-group">
                  <label for="no_hp">Nomor HP Pemesan</label>
                  <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP Pemesan">
                </div>
              </div>
              <!-- /.box-body -->
			  
			  <!-- tombol untuk menambah field form pakai Javascript -->
			<button class="tambah_baru btn btn-primary" style="float:right;padding-button:0px;margin-right:10px"><i class="fa fa-plus"></i> Tambah Barang</button>
			
			<table class="table table-bordered table-striped table-condensed" id="input_fields_wrap">
                    <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Qty</th>	
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
							<select class="form-control select2" style="width: 100%;" name="id_barang[]" data-placeholder="Pilih Barang">
								  <option value="">Nama Barang</option>
								  <?php
									foreach($barang as $brg){
										echo "<option value=".$brg->id_barang.">".$brg->nama_barang."</option>";
									}
								  ?>
							</select>
						</td> 
                        <td>
							<input type="text" name="qty[] " id ="" class="form-control"/>
						</td>
                    </tr>
                    </tbody>
                </table>
					</br>
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
<!-- Javascript untuk menambah field form -->
<script>
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $("#input_fields_wrap"); //Fields wrapper
    var add_button      = $(".tambah_baru"); //Add button ID
	
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<tr>'+
								'<td>'+
										'<select class="form-control select2" style="width: 100%;" name="id_barang[]" data-placeholder="Pilih Barang">'+
											  '<option value="">Nama Barang</option>'+
											  '<?php foreach($barang as $brg){?>'+
												'<option value="<?php echo $brg->id_barang; ?>">'+
													'<?php echo $brg->nama_barang; ?>'+
												'</option><?php }?>'+
										'</select>'+
								'</td>'+
									'<td><input type="text" name="qty[] " id ="" class="form-control"/></td>'+
							'</tr>'); //add input box
			$(".select2").select2();
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('tbody').remove(); x--;
    })
});
</script>