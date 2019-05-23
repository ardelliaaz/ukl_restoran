<!-- <div class="main-content">
	<div class="container-fluid"> -->

    <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-cart">
                  
		<h3 class="page-title">Transaksi</h3>
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
					<div class="panel-heading">CARI MENU</div>
					<div class="panel-body">
						<form action="<?php echo base_url('index.php/transaksi/cari_menu') ?>" method="post">
							<div class="row">
								<div class="col-md-9">
									<input type="text" class="form-control input-lg" placeholder="KODE MENU" name="kode_masakan" required>
								</div>
								<div class="col-md-3">
									<input type="submit" class="btn btn-success btn-lg btn-block" name="submit" value="TAMBAH">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-12">
				<!-- TABLE STRIPED -->
				<div class="panel">
					<div class="panel-heading">KERANJANG BELANJA</div>
					<div class="panel-body">

						<form action="<?php echo base_url('index.php/transaksi/bayar'); ?>" method="post">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Makanan</th>
                    <th>Nama Makanan</th>
										<th>Jumlah</th>
										<th>Sub Total</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								
								<?php
									$no = 1;
									if($cart_transaksi != NULL){
										foreach ($cart_transaksi as $cart) {
											$no++;
											echo '
												<tr>
													<input type="hidden" name="id_masakan[]" value="'.$cart->id_masakan.'">
                                                    <td>'.$no.'</td>
                                                    <td>'.$cart->kode_masakan.'</td>
													<td>'.$cart->nama_masakan.'</td>
													<td>
														<input type="number" name="jumlah[]" class="form-control" onchange="hitung_subtotal('.$cart->id_cart.','.$cart->harga.',this.value,'.$cart->id_masakan.')" value="'.$cart->jumlah.'">
													</td>
													<td><span id="subtot_'.$cart->id_cart.'">'.$cart->harga*$cart->jumlah.'</span></td>
													<td>
														<a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus_cart" onclick="prepare_hapus_cart('.$cart->id_cart.')">Hapus</a>
													</td>
												</tr>
											';
											
										}
									} else {
										echo '
											<tr>
												<td colspan="8">
													Keranjang belanja kosong.
												</td>
											</tr>
										';
									}
								?>
								</tbody>
							</table>
							<?php
								if($cart_transaksi != NULL)
								{
									echo '
										<div class="row">
											<div class="col-md-3">
												<h1 style="margin:0">Rp <span id="total_belanja">0</span>,-</h1>
											</div>	
											<div class="col-md-3">
												<input type="text" name="id_pelanggan" placeholder="NAMA PEMBELI" class="form-control input-lg" required>
											</div>
											<div class="col-md-3">
												<input type="text" name="no_meja" placeholder="NO Meja" class="form-control input-lg" required>
											</div>
											<div class="col-md-3">
												<input type="text" name="status_detail_order" placeholder="KETERANGAN" class="form-control input-lg" required>
											</div>
											<div class="col-md-3">
												<input type="text" name="keterangan" placeholder="STATUS" class="form-control input-lg" required>
											</div>
											<div class="col-md-3">
												<input type="submit" name="submit" value="BAYAR" class="btn btn-lg btn-block btn-primary">
											</div>

										';
								}
							?>
						</form>

					</div>
				</div>
				<!-- END TABLE STRIPED -->
			</div>
		</div>
	</div>
</div>

<div id="modal_hapus_cart" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi Hapus Item cart</h4>
      </div>
      <form action="<?php echo base_url('index.php/transaksi/hapus_item_cart'); ?>" method="post">
	      <div class="modal-body">
	        	<input type="hidden" name="hapus_id_cart"  id="hapus_id_cart">
	        	<p>Apakah anda yakin menghapus produk ini di cart ?</p>
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
	$.getJSON("<?php echo base_url('index.php/transaksi/get_total_belanja') ?>", function(data){
        $("#total_belanja").text(data.total);
    });

	function prepare_hapus_cart(id_cart)
	{
		$("#hapus_id_cart").val(id_cart);
	}

	function hitung_subtotal(id_cart,harga,qty,id_masakan)
	{
		var price;
		price = harga*qty;
		$("#subtot_"+id_cart).text(price);
		//update qty ke tabel cart
		$.post("<?php echo base_url('index.php/transaksi/ubah_jumlah_cart') ?>",
	    {
	    	id_cart: id_cart,
	    	id_masakan: id_masakan,
	        jumlah: qty
	    }, function(data, status){
	    	console.log(data);
	    	if(data == '0'){
	    		alert("Stok buku tidak mencukupi!");
	    	}
	    });
		//mengganti total belanja di cart
	    $.getJSON("<?php echo base_url('index.php/transaksi/get_total_belanja') ?>", function(data){
	        $("#total_belanja").text(data.total);
	    });
	}
</script>
