<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $this->config->item('nama_program');?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Administrator PORTAL UIN Sgd Bandung">
    <meta name="keywords" content="portal uin, portal uin bandung">
	<meta name="author" content="Rifa Mardiana Sofa">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>asset/favicon.ico" />
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>asset/css/bootstrap.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap-responsive.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/custom.css" />
    <link type="text/css" href="<?php echo base_url();?>asset/css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asset/css/docs.css" rel="stylesheet">
	<link href="<?php echo base_url();?>asset/js/google-code-prettify/prettify.css" rel="stylesheet">
            
    <script src="<?php echo base_url();?>asset/js/jquery.js"></script>
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>asset/js/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>asset/js/google-code-prettify/prettify.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>asset/js/docs.js" type="text/javascript"></script>
    <script>
		$(document).ready(function(){
			$('.carousel').carousel({
				interval: 5000
			});
		});
	</script>
  </head>
  <body>
   <div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a href="index.html" class="brand">Login - <?php echo $this->config->item('nama_aplikasi');?></a>
				
			</div>
		</div>
	</div> <!-- end navbar -->
    <section>
    <div class="container">
	<div class="modal-body">
    	<div class="row">
			<div class="offset4 span4">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="login">
                  <form class="form-horizontal" action="<?php echo base_url();?>index.php/administrator/login/masuk" method="POST">
                    <fieldset>
                      <div id="legend">
                        <legend class="">
                        <?php echo $this->config->item('nama_instansi');?></legend>
                      </div>
                      <?php
					  if(validation_errors() || $this->session->flashdata('result_login')) { 
					  ?>
                      <div class="alert alert-error">
                      	<button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Warning!</strong>
						<?php echo validation_errors(); ?>
                        <?php echo $this->session->flashdata('result_login'); ?>
                        </div>    
                        <?php } ?>
                      <div class="control-group">
                        <!-- Username -->
                        <label  for="username">Username</label>
                        <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                          <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                         </div>
                      </div>
 
                      <div class="control-group">
                        <!-- Password-->
                        <label for="password">Password</label>
                        <div class="input-prepend"><span class="add-on"><i class="icon-lock"></i></span>
                          <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                        </div>
                      </div>
                      <div class="pull-left">
                        <!-- Button -->
                          <button type="submit" class="btn btn-success"><i class="icon-ok-sign"></i> Login</button>
                          <a href="<?php echo base_url();?>index.php" class="btn btn-success"><i class="icon-chevron-left"></i> Kembali</a>
                      </div>
                    </fieldset>
                  </form>                
                </div>
              </div>
             </div>
          </div>
		</div> 
        </div>        
		</section>
		<!-- FOOTER -->
		<section>
			<p class="text-center muted">&copy; Copyright 2015 - <?php echo $this->config->item('nama_instansi');?><br>Rifa Mardiana Sofa | 1137050185</a><br></p>
		</section>
	</div> <!-- end container -->
    
  </body>
</html>