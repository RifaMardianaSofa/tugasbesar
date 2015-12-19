<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />      
    <title><?php echo $this->config->item('nama_aplikasi');?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="product" content="<?php echo $this->config->item('nama_aplikasi');?>">
    <meta name="description" content="<?php echo $this->config->item('nama_aplikasi');?>">
    <meta name="author" content="Rifa Mardiana Sofa">
    <meta name="keywords" content="ebook informatika uin sgd bandung, uin sgd bandung, materi kuliah">

    <link href="<?php echo base_url();?>assets/css/metro-bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/docs.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/js/prettify/prettify.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery/jquery.widget.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/prettify/prettify.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/load-metro.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/metro/metro-loader.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/metro.min.js"></script>

    <!-- Local JavaScript -->
    
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/docs.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/github.info.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/hitua.js"></script>
	<script src="<?php echo base_url();?>assets/js/jquery/jquery.dataTables.js"></script>
    
	<script type="text/javascript">
	$(function(){
		$("component_id").calendar();
	});
	$(document).ready(function(){
		
	});
    </script>
	<script>
        METRO_LOCALE = 'en';
        METRO_WEEK_START = 1;
    </script>
</head>
<body class="metro" style="background-color: #efeae3">
		
		<header class="bg-dark" >
		<?php echo $this->load->view('menu');?>
		</header>
		
        <div class="container">
            <?php echo $this->load->view('sidebar');?>
        </div>

        <div class="container">
            <div class="grid no-margin">
                <div class="row">
                    <?php echo $this->load->view($isi);?>
                </div>
            </div>
        </div>

        <div class="bg-dark">
            <div class="container tertiary-text bg-dark fg-white" style="padding: 10px">
                <center>Copyright &copy; <?php echo $this->config->item('nama_instansi');?> 2015 
				| <i class="icon-user-3 on-left"></i> Rifa Mardiana Sofa
				| 1137050185 </a> 
				</center> 
            </div>
        </div>

</body>
</html>