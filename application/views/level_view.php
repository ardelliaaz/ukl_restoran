<!-- <div class="main-content">
	<div class="container-fluid"> -->

    <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">

		<h3 class="page-title">Data level</h3>
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

						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_tambah_level">Tambah level</button>
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<!-- <th>Username</th>
									<th>Level</th>
									<th>Aksi</th> -->
								</tr>
							</thead>
							<tbody>
							<?php
								$no = 1;
								foreach ($level as $b) {
									echo '
										<tr>
											<td>'.$no.'</td>
											<td>'.$b->nama_level.'</td>
											<td>
												<a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_ubah_level" onclick="prepare_ubah_level('.$b->id_level.')">Ubah</a>
												<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus_level" onclick="prepare_hapus_level('.$b->id_level.')">Hapus</a>
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
<div id="modal_tambah_level" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah level</h4>
      </div>
      <form action="<?php echo base_url('index.php/level/tambah'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="text" class="form-control" placeholder="nama_level" name="nama_level">
	        	<br>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal_ubah_level" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ubah level</h4>
      </div>
      <form action="<?php echo base_url('index.php/level/ubah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	        	<input type="hidden" name="ubah_id_level" id="ubah_id_level">
	        	<input type="text" class="form-control" placeholder="Nama" name="ubah_nama_level" id="ubah_nama_level">
	        	<br>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary" name="submit" value="SIMPAN">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<div id="modal_hapus_level" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus level</h4>
      </div>
      <form action="<?php echo base_url('index.php/level/hapus'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="hidden" name="hapus_id_level"  id="hapus_id_level">
	        	<p>Apakah anda yakin menghapus level <b><span id="hapus_nama_level"></span></b> ?</p>
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
	
	function prepare_ubah_level(id)
	{
		$("#ubah_id_level").empty();
		$("#ubah_nama_level").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/level/get_data_level_by_id/' + id,  function(data){
			$("#ubah_id_level").val(data.id_level);
			$("#ubah_nama_level").val(data.nama_level);
		});
	}

	function prepare_hapus_level(id)
	{
		$("#hapus_id_level").empty();
		$("#hapus_nama_level").empty();

		$.getJSON('<?php echo base_url(); ?>index.php/level/get_data_level_by_id/' + id,  function(data){
			$("#hapus_id_level").val(data.id_level);
			$("#hapus_nama_level").text(data.nama_level);
		});
	}
</script>
