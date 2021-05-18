<div class="container" style="margin-top:100px;">
	<?php
	if($this->input->get('report')!=null){
		if($this->input->get('report')==1){
			echo '<div class="alert alert-danger">Akun tidak di temukan</div>';
		}
		else if($this->input->get('report')==2){
			echo '<div class="alert alert-danger">Kata sandi salah</div>';
		}
		else if($this->input->get('report')==3){
			echo '<div class="alert alert-danger">Akun belum di aktivasi</div>';
		}
	}
	?>
	<h1>Masuk</h1>
	<br/>
	<form action="<?php echo site_url('/user/loginProcess'); ?>" method="post">
		<div class="form-group">
			<label for="exampleInputEmail1">Alamat Email</label>
			<input type="email" name="email_address" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Kata Sandi</label>
			<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Sandi" required>
		</div>
		<button type="submit" class="btn btn-primary">Login</button>
		<a href="<?php echo site_url('/user/forgot_password'); ?>">Lupa Password?!</a>
	</form>
</div>