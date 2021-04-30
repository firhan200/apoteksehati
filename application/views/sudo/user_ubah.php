<div class="container-fluid pad-t" style="padding:20px;">
	<div class="row">
		<div class="col-xs-6 title">
			Ubah User
		</div>
		<div class="col-xs-6" align="right">
			<a href="<?php echo site_url('sudo/user'); ?>"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-triangle-left"></span> Kembali</button></a>
		</div>
	</div>
	<hr/>
	<br/>
	<?php
	if($this->input->get('balasan')==1){
		echo '<div class="alert alert-success">Berhasil mengubah data</div>';
	}else if($this->input->get('balasan')==2){
		echo '<div class="alert alert-danger">Gagal mengubah data</div>';
	}else if($this->input->get('balasan')==3){
		echo '<div class="alert alert-warning">Format foto tidak sesuai</div>';
	}
	?>
	<form action="<?php echo site_url('sudo/user/ubah_proses/'.$query['id']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-2">Nama</label>
			<div class="col-sm-4" style="margin-top:5px;">
				<input type="text" name="full_name" maxlength="100" value="<?php echo htmlspecialchars($query['full_name']) ?>" class="form-control" placeholder="Nama" readonly required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Email</label>
			<div class="col-sm-4" style="margin-top:5px;">
				<input type="text" name="email" maxlength="100" value="<?php echo htmlspecialchars($query['email']) ?>" class="form-control" placeholder="Email" readonly required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Aktif</label>
			<div class="col-sm-4" style="margin-top:5px;">
				<input type="checkbox" name="is_active" maxlength="100" placeholder="Is Aktif" <?php if($query['is_active']){ echo 'checked'; } ?>>
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