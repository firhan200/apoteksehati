<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Apotek Sehati</title>
		<link rel="shortcut icon" href="<?php echo base_url('assets/img/icon.png'); ?>">
		<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/admin-style.css" rel="stylesheet'); ?>">

		<!-- external javascript -->
		<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>	
	</head>
	<body class="body-log">
		<div class="container">
			<div class="col-sm-4 col-sm-offset-4 log-box">
				<center><img src="<?php echo base_url('assets/img/logo.png'); ?>" style="width:150px;"></center>
				<br/>
				<?php
				if($this->input->get('report')!=null){
					echo '<div class="alert alert-danger">username/password salah</div>';
				}
				?>
				<form action="<?php echo site_url('sudo/admin/loginProcess'); ?>" method="post">
					<div class="form-group has-feedback">
						<input autofocus name="username" type="username" class="form-control" maxlength="30" placeholder="username" required>
						<i class="form-control-feedback glyphicon glyphicon-user"></i>
					</div>
					<div class="form-group has-feedback">
						<input name="password" type="password" class="form-control" maxlength="30" placeholder="password" required>
						<i class="form-control-feedback glyphicon glyphicon-lock"></i>
					</div>
					<button type="submit" style="width:100%;" class="btn btn-default">Login</button>
				</form>
				<div class="version">
					Apotek Sehati &copy; 2016
				</div>
			</div>
		</div>
	</body>
</html>