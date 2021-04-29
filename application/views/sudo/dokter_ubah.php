<div class="container-fluid pad-t" style="padding:20px;">
	<div class="row">
		<div class="col-xs-6 title">
			Ubah Dokter
		</div>
		<div class="col-xs-6" align="right">
			<a href="<?php echo site_url('sudo/dokter'); ?>"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-triangle-left"></span> Kembali</button></a>
		</div>
	</div>
	<hr/>
	<br/>
	<?php
	if($this->input->get('balasan')==1){
		echo '<div class="alert alert-success">Berhasil mengubah data</div>';
	}else if($this->input->get('balasan')==2){
		echo '<div class="alert alert-danger">Gagal mengubah data</div>';
	}
	?>
	<form action="<?php echo site_url('sudo/dokter/ubah_proses/'.$query['id']); ?>" method="post" class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-2">Nama Dokter</label>
			<div class="col-sm-4">
				<input type="text" name="nama_dokter" value="<?php echo htmlspecialchars($query['nama_dokter']) ?>" maxlength="100" placeholder="Dr. Agus Wahyono" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Profesi</label>
			<div class="col-sm-4">
				<input type="text" name="profesi" value="<?php echo htmlspecialchars($query['profesi']) ?>" maxlength="100" placeholder="Spesialis Jantung" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Status Kehadiran</label>
			<div class="col-sm-4" style="margin-top:5px;">
				<input type="radio" name="status" value="Ada" <?php if($query['status']=='Ada') echo 'checked'; ?>> Ada&nbsp;&nbsp;
				<input type="radio" name="status" value="Tidak Ada" <?php if($query['status']=='Tidak Ada') echo 'checked'; ?>> Tidak Ada
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