<div class="container" style="margin-top:100px;">
	<?php
	if($this->input->get('report')!=null){
		if($this->input->get('report')==3){
			echo '<div class="alert alert-danger">Alamat email tidak ditemukan.</div>';
		}else if($this->input->get('report')==0){
			echo '<div class="alert alert-success">Harap kontak admin untuk mengkonfirmasi reset password</div>';
		}
	}
	?>
	<h1>Lupa Password</h1>
	<br/>
	<form action="<?php echo site_url('/user/forgotPasswordProcess'); ?>" method="post">
	<div class="form-group">
			<label for="exampleInputEmail1">Alamat Email</label>
			<input type="email" name="email_address" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>