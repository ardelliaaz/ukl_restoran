<!--main content start-->
<section id="main-content">
          <section class="wrapper">
              <h3><i class="fa fa-angle-right"></i> Data masakan </h3>
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
	                  	  <div class="content-panel">
                       
	                  	  	  <hr>
		                      <table class="table">
		                          <thead>
		                          <tr>
                                    <th>No</th>
									<th>Kode Masakan</th>
                                    <th>Nama Masakan</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                  </tr>
                                  
		                          </thead>
		                          <tbody>
		                          <?php
								$no = 1;
								foreach ($masakan as $b) {
									echo '
										<tr>
										<td>'.$no.'</td>
										<td>'.$b->kode_masakan.'</td>
                                        <td>'.$b->nama_masakan.'</td>
                                         <td>'.$b->harga.'</td>
                                         <td>'.$b->status_masakan.'</td>
                                         <td>
                                         <button type="button" class="btn btn-success btn-sm" >Beli</button>
	                  	 
                                         </td>
                                        
										</tr>
									';
									$no++;
								}
							?>
		                      </table>
	                  	  </div><! --/content-panel -->
	                  </div><!-- /col-md-12 -->
                  
	                 
              </div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->



  