<script type="text/javascript">
$(document).ready(function(){
	$(".unsee").hide();
	$(".see").click(function(){
		$(".see").hide();
		$(".unsee").show();
		$('#password').get(0).type = 'text';
	});
	$(".unsee").click(function(){
		$(".unsee").hide();
		$(".see").show();
		$('#password').get(0).type = 'password';
	});
});
</script>

<div class="container-fluid pad-t" style="padding:20px;">
	<div class="row">
		<div class="col-xs-6 title">
			<span class="glyphicon glyphicon-lock"></span> Ganti Password
		</div>
		<div class="col-xs-6" align="right">
			<a href="<?php echo site_url('sudo/admin/beranda'); ?>"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-triangle-left"></span> Kembali</button></a>
		</div>
	</div>
	<hr/>
	<br/>
	<?php
	if($this->input->get('balasan')==1){
		echo '<div class="alert alert-success">Berhasil mengganti password</div>';
	}else if($this->input->get('balasan')==2){
		echo '<div class="alert alert-danger">Gagal mengganti password</div>';
	}else if($this->input->get('balasan')==3){
		echo '<div class="alert alert-warning">Password lama salah</div>';
	}
	?>
	<form action="<?php echo site_url('sudo/admin/ganti_password_proses'); ?>" method="post" class="form-horizontal">
		<input type="hidden" name="submit" value="true">
		<div class="form-group">
			<label class="control-label col-sm-2">Password Lama</label>
			<div class="col-sm-4">
				<input type="password" name="old_password" maxlength="30" placeholder="masukan password lama" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Password Baru</label>
			<div class="col-sm-4">
				<div class="input-group">
					<input type="password" name="password" id="password" class="form-control" maxlength="30" placeholder="masukan password baru" aria-describedby="basic-addon2" required>
					<span class="see input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-eye-open"></span></span>
					<span class="unsee input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-eye-close"></span></span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2"></label>
			<div class="col-sm-4" style="margin-top:5px;">
				<button type="submit" class="btn btn-primary" onclick="return confirm('Simpan Data?')">Simpan</button>
			</div>
		</div>	
	</form>
</div>