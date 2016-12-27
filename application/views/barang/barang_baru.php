  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Barang Baru
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Barang Baru</li>
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
              <h3 class="box-title">Form Input Barang Baru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url('admin/simpan_barang_baru')?>" method="POST">
			  <!-- tombol untuk menambah field form pakai Javascript -->
			<button class="tambah_baru btn btn-primary" style="float:right;padding-button:0px;margin-right:10px"><i class="fa fa-plus"></i> Tambah Barang</button>
			
			<table class="table table-bordered table-striped table-condensed" id="input_fields_wrap">
                    <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>	
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
							<input type="text" name="kode_barang[] " id ="" class="form-control"/>
						</td> 
                        <td>
							<input type="text" name="nama_barang[] " id ="" class="form-control"/>
						</td> 
                        <td>
							<input type="text" name="harga[] " id ="" class="form-control"/>
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
								'<td><input type="text" name="kode_barang[] " id ="" class="form-control"/></td>'+
								'<td><input type="text" name="nama_barang[] " id ="" class="form-control"/></td>'+
								'<td><input type="text" name="harga[] " id ="" class="form-control"/></td>'+
							'</tr>'); //add input box
			$(".select2").select2();
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('tbody').remove(); x--;
    })
});
</script>