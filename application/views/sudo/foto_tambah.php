<div class="container-fluid pad-t" style="padding:20px;">
	<div class="row">
		<div class="col-xs-6 title">
			Tambah Foto
			<div class="help">
				Maksimal mengunggah 4 foto
			</div>
		</div>
		<div class="col-xs-6" align="right">
			<a href="<?php echo site_url('sudo/foto'); ?>"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-triangle-left"></span> Kembali</button></a>
		</div>
	</div>
	<hr/>
	<br/>
	<?php
	if($this->input->get('balasan')==1){
		echo '<div class="alert alert-success">Berhasil memasukan data</div>';
	}else if($this->input->get('balasan')==2){
		echo '<div class="alert alert-danger">Gagal memasukan data</div>';
	}else if($this->input->get('balasan')==3){
		echo '<div class="alert alert-warning">Format foto tidak sesuai</div>';
	}
	?>
	<form action="<?php echo site_url('sudo/foto/tambah_proses'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-2">Foto</label>
			<div class="col-sm-4">
				<input type="file" name="foto" class="form-control" required>
				<div class="help">
					Ukuran maksimal 2MB bertipe .jpg atau .png
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