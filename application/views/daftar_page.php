<div class="container" style="margin-top:100px;">
	<?php
	if($this->input->get('report')!=null){
		if($this->input->get('report')==1){
			echo '<div class="alert alert-danger">kata sandi tidak sama</div>';
		}else if($this->input->get('report')==2){
			echo '<div class="alert alert-danger">email telah terpakai</div>';
		}
	}
	?>
	<h1>Daftar</h1>
	<br/>
	<form action="<?php echo site_url('/user/daftarProcess'); ?>" method="post">
		<div class="form-group">
			<label for="exampleInputEmail12">Nama Lengkap</label>
			<input type="text" name="full_name" class="form-control" id="exampleInputEmail2" placeholder="Nama Lengkap" required>
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Alamat Email</label>
			<input type="email" name="email_address" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Kata Sandi</label>
			<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Sandi" required>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword2">Ulangi Kata Sandi</label>
			<input type="password" name="confirm_password" class="form-control" id="exampleInputPassword2" placeholder="Ulangi Sandi" required>
		</div>
		<button type="submit" class="btn btn-primary">Daftar</button>
	</form>
</div>