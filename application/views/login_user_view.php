
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?=base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url() ?>assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
			<?php
$notif = $this->session->flashdata('notif');
if ($notif != null) {
  echo '
   <div class="alert alert-danger">'.$notif.'</div>
  ';
}
?>
		      <form class="form-login" action="<?php echo base_url('index.php/login_user/cek_login'); ?>" method="post" >
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="User ID" id="username" name="username" autofocus > 
		            <br>
		            <input type="password" class="form-control" placeholder="Password" id="password" name="password">
		            <!-- <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
		
		                </span>
		            </label> -->

					<br>
		            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN USER</button>
		            <hr>
		            
		            <div class="login-social-link centered">
		            <p>or you can sign in via your social network</p>
		                <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
		                <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
		            </div>
		            <div class="registration">
		                Don't have an account yet?<br/>
		                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_registrasi">Tambah Menu</button>
		            </div>
		
		        </div>
		
		        
		      </form>	  	
	  	  <!-- Modal -->
				<div id="modal_registrasi" class="modal fade" role="dialog">
  					<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Menu</h4>
      </div>
      <form action="<?php echo base_url('index.php/login_user/tambah'); ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
				<input type="hidden" class="form-control" placeholder="id_pelanggan" name="id_pelanggan">
	        	<br>
	      		<input type="text" class="form-control" placeholder="nama" name="nama">
	        	<br>
	        	<input type="text" class="form-control" placeholder="alamat" name="alamat">
	        	<br>
	        	<input type="text" class="form-control" placeholder="telp" name="telp">
	        	<br>
	        	<input type="text" class="form-control" placeholder="username" name="username">
	        	<br>
				<input type="password" class="form-control" placeholder="password" name="password">
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


		          <!-- modal -->
		
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url() ?>assets/js/jquery.js"></script>
    <script src="<?=base_url() ?>assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?=base_url() ?>assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?=base_url() ?>assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
