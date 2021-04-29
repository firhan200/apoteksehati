<div class="container-fluid pad-t" style="padding:20px;">
	<div class="row">
		<div class="col-xs-6 title">
			Foto
			<div class="help">
				Maksimal mengunggah 4 foto
			</div>
		</div>
		<div class="col-xs-6" align="right">
			<?php if($query->num_rows() < 4){ ?>
			<a href="<?php echo site_url('sudo/foto/tambah'); ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Foto</button></a>
			<?php } ?>
		</div>
	</div>
	<hr/>
	<br/>
	<?php
	if($this->input->get('balasan')==1){
		echo '<div class="alert alert-success">Berhasil menghapus data</div>';
	}else if($this->input->get('balasan')==2){
		echo '<div class="alert alert-danger">Gagal menghapus data</div>';
	}
	?>
	<table class="table table-striped mytable">
		<thead>
			<tr>
				<th width="5%">No</th>
				<th>Foto</th>
				<th width="20%">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if($query->num_rows() > 0){
				$no=1;
				foreach($query->result() as $result){
				?>
				<tr>
					<td><?php echo $no; ?>.</td>
					<td><img src="<?php echo base_url('assets/img/foto/'.$result->foto); ?>" class="img-responsive img-thumbnail img-sm"></td>
					<td>
						<a href="<?php echo site_url('sudo/foto/ubah/'.$result->id); ?>"><button type="button" class="btn btn-sm btn-default">Ubah</button></a>
						<a href="<?php echo site_url('sudo/foto/hapus/'.$result->id); ?>" onclick="return confirm('Hapus Foto?')"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a>
					</td>
				</tr>
				<?php
				$no++;
				}
			}else{
				echo '<tr><td colspan="3" align="center">Tidak ada data</td></tr>';
			}
			?>
		</tbody>
	</table>
</div>