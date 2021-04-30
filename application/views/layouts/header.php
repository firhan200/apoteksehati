<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Apotek Sehati</title>
		<link rel="shortcut icon" href="<?php echo base_url('assets/img/icon.png'); ?>">
		<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/style.css" rel="stylesheet'); ?>">

		<!-- external javascript -->
		<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>	
		<!-- lightbox -->
		<link href="<?php echo base_url('assets/lightbox/dist/ekko-lightbox.min.css'); ?>" rel="stylesheet">
		<script type="text/javascript" src="<?php echo base_url('assets/lightbox/dist/ekko-lightbox.min.js'); ?>"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$(".page-scroll").on('click', function(event) {
			    if (this.hash !== "") {
			      	event.preventDefault();
			      	var hash = this.hash;
			      	$('html, body').animate({
			        	scrollTop: $(hash).offset().top
			      	}, 800, function(){
			        	window.location.hash = hash;
			      	});
			    } 
		  	});
		});
		</script>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span> 
							</button>
							<a href="#" class="navbar-brand"><img src="<?php echo base_url('assets/img/logo.png'); ?>" style="width:85px;margin-top:-11px;"></a>
						</div>
						<div class="collapse navbar-collapse" id="myNavbar">
							<ul class="nav navbar-nav navbar-right">
								<?php if(!isset($reset_nav)){ ?>
									<li><a href="#slider" class="page-scroll">Beranda</a></li>							
									<li><a href="#pekerjaan" class="page-scroll">Pekerjaan</a></li>	
									<li><a href="#profil" class="page-scroll">Profil</a></li>						
									<li><a href="#jadwal-dokter" class="page-scroll">Dokter</a></li>							
									<li><a href="#foto" class="page-scroll">Foto</a></li>
									<li><a href="#footer" class="page-scroll">Hubungi Kami</a></li>		
								<?php }else{ ?>
									<li><a href="<?php echo site_url('/') ?>" class="page-scroll">< Kembali ke Beranda</a></li>	
								<?php } ?>
								<?php if(!$this->session->userdata('id_user')){ ?>							
								<li><a href="<?php echo site_url('/user/daftar'); ?>" class="page-scroll">Daftar</a></li>										
								<li><a href="<?php echo site_url('/user/masuk'); ?>" class="page-scroll">Masuk</a></li>	
								<?php }else{ ?>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $this->session->userdata('nama_user'); ?>
									<span class="caret"></span></a>
									<ul class="dropdown-menu">
									<li><a href="<?php echo site_url('/user/logout'); ?>" class="page-scroll">Keluar</a></li>
									</ul>
								</li>										
								<?php } ?>									
						    </ul>
						</div>
					</div>
				</div>
			</div>
		</nav>