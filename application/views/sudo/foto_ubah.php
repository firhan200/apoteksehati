<div class="container-fluid pad-t" style="padding:20px;">
	<div class="row">
		<div class="col-xs-6 title">
			Ubah Foto
		</div>
		<div class="col-xs-6" align="right">
			<a href="<?php echo site_url('sudo/foto'); ?>"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-triangle-left"></span> Kembali</button></a>
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
	<form action="<?php echo site_url('sudo/foto/ubah_proses/'.$query['id']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-2">Foto Sebelumnya</label>
			<div class="col-sm-4">
				<img src="<?php echo base_url('assets/img/foto/'.$query['foto']); ?>" class="img-responsive img-thumbnail img-sm">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Foto Baru</label>
			<div class="col-sm-4">
				<input type="file" name="foto" class="form-control">
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