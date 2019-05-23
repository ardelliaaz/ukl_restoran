<section id="main-content">
  <section class="wrapper">
		<div class="row">
		 <div class="col-lg-12 main-chart">
		<h3 class="page-title">Data Masakan</h3>
		<?php
			$notif = $this->session->flashdata('notif');
			if($notif != NULL){
				echo '
					<div class="alert alert-danger">'.$notif.'</div>
				';
			}
		?>
		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-body">

						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_tambah_menu">Tambah Menu</button>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Masakan</th>
									<th>Nama Masakan</th>
									<th>Harga</th>
									<th>Status Masakan</th>
									<th>Stok</th
								</tr>
							</thead>
							<tbody>
							<?php
								$no = 1;
								foreach ($makanan as $b) {
									echo '
										<tr>
											<td>'.$no.'</td>
											<td>'.$b->kode_masakan.'</td>
											<td>'.$b->nama_masakan.'</td>
											<td>Rp '.$b->harga.',-</td>
											<td>'.$b->status_masakan.'</td>
											<td>'.$b->stok.'</td>
											<td>
												<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah_menu" onclick="prepare_ubah_menu('.$b->id_masakan.')">Ubah</a>
												<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus_menu" onclick="prepare_hapus_masakan('.$b->id_masakan.')">hapus</a>
											</td>
										</tr>
									';
									$no++;
								}
							?>
								
							</tbody>
						</table>

					</div>
				</div>
				<!-- END TABLE STRIPED -->
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="modal_tambah_menu" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Menu</h4>
      </div>
      <form action="<?php echo base_url('index.php/menu/tambah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
						<!-- <input type="text" class="form-control" placeholder="id_makanan" name="id_makanan"> -->
	        	<br>
	      		<input type="text" class="form-control" placeholder="Kode_makanan" name="kode_masakan">
	        	<br>
	        	<input type="text" class="form-control" placeholder="nama_makanan" name="nama_masakan">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Stok" name="stok">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Harga" name="harga">
	        	<br>
						<input type="text" class="form-control" placeholder="Status Masakan" name="status_masakan">
	        	<br>
	        	
	        	<br>
	        	<!-- <input type="file" class="form-control" placeholder="Foto" name="foto"> -->

	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>

  </div>
</div>

<div id="modal_ubah_menu" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah Menu</h4>
      </div>
      <form action="<?php echo base_url('index.php/menu/ubah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	        	<input type="hidden" name="ubah_id_masakan"  id="ubah_id_masakan">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Kode Masakan" name="ubah_kode_masakan"  id="ubah_kode_masakan">
	        	<br>
	        	<input type="text" class="form-control" placeholder="nama masakan" name="ubah_nama_masakan"  id="ubah_nama_masakan">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Stok" name="ubah_stok" id="ubah_stok">
	        	<br>
	        	<input type="text" class="form-control" placeholder="Harga" name="ubah_harga" id="ubah_harga">
	        	<br>
						<input type="text" class="form-control" placeholder="Status" name="ubah_status_masakan" id="ubah_status_masakan">
	        	<br>
	        	<!-- <div id="data_foto"></div> -->
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal_hapus_menu" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus menu</h4>
      </div>
      <form action="<?php echo base_url('index.php/menu/hapus'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="hidden" name="hapus_id_masakan"  id="hapus_id_masakan">
	        	<p>Apakah anda yakin menghapus Menu <b><span id="hapus_nama_masakan"></span></b> ?</p>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-danger" name="submit" value="YA">
	        <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
	      </div>
      </form>
    </div>

  </div>
</div>

</section>
</section>
<script type="text/javascript">
	
	function prepare_ubah_menu(id)
	{ 
		$("#ubah_id_masakan").empty();
		$("#ubah_kode_masakan").empty();
		$("#ubah_nama_masakan").empty();
		$("#ubah_harga").empty();
		$("#ubah_status_masakan").empty();
		// $("#ubah_kategori").val();
		$("#ubah_stok").empty();
		// $("#data_foto").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/menu/get_data_menu_by_id/' + id,  function(data){
			$("#ubah_id_masakan").val(data.id_masakan);
			$("#ubah_kode_masakan").val(data.kode_masakan);
			$("#ubah_nama_masakan").val(data.nama_masakan);
			$("#ubah_harga").val(data.harga);
			$("#ubah_status_masakan").val(data.status_masakan);
			// $("#ubah_kategori").val(data.id_kat);
			$("#ubah_stok").val(data.stok);
			// $("#data_foto").html('<img src="<?php echo base_url(); ?>assets/gbr_menu/' + data.foto + '" width="50px" >');
		});
	}

	function prepare_hapus_masakan(id)
	{
		$("#hapus_id_masakan").empty();
		$("#hapus_nama_masakan").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/menu/get_data_menu_by_id/' + id,  function(data){
			$("#hapus_id_masakan").val(data.id_masakan);
			$("#hapus_nama_masakan").text(data.nama_masakan);
		});
	}
</script>
