<div class="container-fluid pad-t" style="padding:20px;">
	<div class="row">
		<div class="col-xs-6 title">
			Ubah Profil
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
	<?php if($id!=null){ ?>
		<form action="<?php echo site_url('sudo/profil/ubah_proses/'.$id); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
	<?php }else{ ?>
		<form action="<?php echo site_url('sudo/profil/tambah_proses/'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
	<?php } ?>
		<?php if($foto!=null){ ?>
			<div class="form-group">
				<label class="control-label col-sm-2">Foto Sebelumnya</label>
				<div class="col-sm-4">
					<img src="<?php echo base_url('assets/img/'.$foto); ?>" class="img-responsive img-thumbnail img-sm">
				</div>
			</div>
		<?php } ?>
		<div class="form-group">
			<label class="control-label col-sm-2">Foto</label>
			<div class="col-sm-4">
				<input type="file" name="foto" class="form-control" <?php if($foto==null){ echo 'required'; } ?>>
				<div class="help">
					<?php if($foto!=null){ ?>
					<b>*Kosongkan field ikon apabila tidak ingin merubah ikon</b><br/>
					<?php } ?>
					Ukuran maksimal 2MB bertipe .jpg atau .png
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Teks Profil</label>
			<div class="col-sm-8" style="margin-top:5px;">
				<textarea name="teks_profil" maxlength="1000" class="form-control" rows="10" required><?php echo htmlspecialchars($teks_profil) ?></textarea>
			</div>
		</div>		
		<div class="form-group">
			<label class="control-label col-sm-2"></label>
			<div class="col-sm-4" style="margin-top:5px;">
				<button type="submit" class="btn btn-primary" onclick="return confirm('Simpan Profil?')">Simpan</button>
			</div>
		</div>	
	</form>
</div>