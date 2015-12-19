<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $this->config->item('nama_aplikasi');?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Administrator PORTAL UIN Sgd Bandung">
    <meta name="keywords" content="portal uin, portal uin bandung">
	<meta name="author" content="Rifa Mardiana Sofa">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>asset/favicon.ico" /> -->
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>asset/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url();?>asset/css/bootstrap-box.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap-responsive.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/custom.css" />
    <link type="text/css" href="<?php echo base_url();?>asset/css/custom-theme/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/bootstrap-notify.css" />
    <link type="text/css" href="<?php echo base_url();?>asset/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asset/css/docs.css" rel="stylesheet">
	<link href="<?php echo base_url();?>asset/js/google-code-prettify/prettify.css" rel="stylesheet">
            
    <script src="<?php echo base_url();?>asset/js/jquery.js"></script>
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>asset/js/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>asset/js/google-code-prettify/prettify.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>asset/js/docs.js" type="text/javascript"></script>
    
    <script src="<?php echo base_url();?>asset/js/ajaxfileupload.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>asset/js/bootstrap-notify.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="<?php echo base_url();?>asset/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
       theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor"
    ],
    // toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    // toolbar2: "print preview media | forecolor backcolor emoticons",
    // image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
    });
    </script>
  </head>
  <body>
    <div class='notifications bottom-right'></div>
    <div class='notifications top-right'></div>
   <div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a href="<?php echo base_url();?>index.php/administrator/home" class="brand">Admin - <?php echo $this->config->item('nama_aplikasi');?></a>
				
				<a data-toggle="collapse" data-target=".nav-collapse" class="btn btn-navbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				
				<div class="collapse nav-collapse">
					<ul class="nav pull-right">
						<li class="#"><a href="<?php echo base_url();?>index.php/administrator/home"><i class=""></i> Home</a></li>
                       	<li class="dropdown" id="preview-menu"><a href="<?php echo base_url();?>index.php/administrator/artikel" ><i class=""></i> Buku</a></li>
						<li><a href="<?php echo base_url();?>index.php/administrator/hubungi"><i class=""></i> <span class="notifikasi"></span> Hubungi Kami</a></li>
                        <li><a href="<?php echo base_url();?>index.php" target="_blank"><i class=""></i> <span class="notifikasi"></span> Webiste</a></li>
                        <li class="dropdown" id="preview-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class=""></i><?php echo $this->session->userdata('nama_lengkap');?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
								<li><a href="<?php echo base_url();?>index.php/administrator/profil/index"><i class=""></i>Profil</a></li>	
                               	<li><a href="<?php echo base_url();?>index.php/administrator/login/logout"><i class=""></i>Logout</a></li>	
                        </ul>
                        </li>
					</ul>
				</div>
			</div>
		</div>
	</div> <!-- end navbar -->

	<!-- FEATURED PRODUCT -->
	<section>
		<div class="container">
        <div class="bootstrap-widget">
				<?php echo $content;?>
		</div>                
		</div> <!-- end container -->
	</section>

	
	<div class="container">		
		<!-- FOOTER -->
		<section>
			<p class="text-center muted">&copy; Copyright 2015 - <?php echo $this->config->item('nama_instansi');?><br>Rifa Mardiana Sofa| 1137050185
        </section>
	</div> <!-- end container -->
    
  </body>
</html>