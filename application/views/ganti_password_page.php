<div class="container" style="margin-top:100px;">
	<?php
	if($this->input->get('report')!=null){
		if($this->input->get('report')==1){
			echo '<div class="alert alert-danger">kata sandi tidak sama</div>';
		}else if($this->input->get('report')==2){
			echo '<div class="alert alert-danger">kata sandi lama salah</div>';
		}else if($this->input->get('report')==3){
			echo '<div class="alert alert-danger">User tidak ditemukan.</div>';
		}else if($this->input->get('report')==0){
			echo '<div class="alert alert-success">Password berhasil diubah.</div>';
		}
	}
	?>
	<h1>Ganti Password</h1>
	<br/>
	<form action="<?php echo site_url('/user/changePasswordProcess'); ?>" method="post">
		<div class="form-group">
			<label for="exampleInputPassword1">Kata Sandi Lama</label>
			<input type="password" name="old_password" class="form-control" id="exampleInputPassword1" placeholder="Sandi" required>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Kata Sandi Baru</label>
			<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Sandi" required>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword2">Ulangi Kata Sandi Baru</label>
			<input type="password" name="confirm_password" class="form-control" id="exampleInputPassword2" placeholder="Ulangi Sandi" required>
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>