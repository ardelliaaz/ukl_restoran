<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DASHGUM - FREE Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?=base_url() ?>assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url() ?>assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url() ?>assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="<?=base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url() ?>assets/css/style-responsive.css" rel="stylesheet">

    <script src="<?=base_url() ?>assets/js/chart-master/Chart.js"></script>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url() ?>assets/js/jquery.js"></script>
    <script src="<?=base_url() ?>assets/js/jquery-1.8.3.min.js"></script>
    <script src="<?=base_url() ?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?=base_url() ?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?=base_url() ?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?=base_url() ?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?=base_url() ?>assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="<?=base_url() ?>assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="<?=base_url() ?>assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="<?=base_url() ?>assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="<?=base_url() ?>assets/js/sparkline-chart.js"></script>    
    <script src="<?=base_url() ?>assets/js/zabuto_calendar.js"></script>
    
    <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>DASHGUM FREE</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo base_url('index.php/login/logout'); ?>">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="<?=base_url() ?>assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Marcel Newman</h5>

              	  <?php
					if($this->session->userdata('username') == 'admin'){
                        ?>	
                        
                  <li class="mt">
                      <a class="active" href="<?php echo base_url('index.php/dashboard')?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub">
                      <a class="" href="<?php echo base_url('index.php/level')?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Level</span>
                      </a>
                  </li>
                  
                  <li class="sub">
                      <a class="" href="<?php echo base_url('index.php/menu')?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Menu</span>
                      </a>
                  </li>
                  
                  <li class="sub">
                      <a class="" href="<?php echo base_url('index.php/pengguna')?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Pengguna</span>
                      </a>
                  </li>
                  
                  
                  
                  <li class="sub">
                      <a class="" href="<?php echo base_url('index.php/transaksi/riwayat')?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Riwayat Transaksi</span>
                      </a>
                  </li>

                  <?php
					} else {
						?>
                              
                  <li class="sub">
                      <a class="" href="<?php echo base_url('index.php/verifikasi')?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Verifikasi Order</span>
                      </a>
                  </li>
                  
                  <li class="sub">
                      <a class="" href="<?php echo base_url('index.php/transaksi/riwayat')?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Riwayat Transaksi</span>
                      </a>
                  </li>


                  <?php
							}
						?>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->      

      <div class="main">
			<!-- MAIN CONTENT -->
			<?php
				$this->load->view($main_view);
			?>
			<!-- END MAIN CONTENT -->
		</div>

      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  
                       
                      
      </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
    
      <!--footer end-->
  </section>

    
	
	<!-- <script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to Dashgum!',
            // (string | mandatory) the text inside the notification
            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
            // (string | optional) the image to display on the left
            image: '<?=base_url() ?>assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>
	 -->
	
  

  </body>
</html>
