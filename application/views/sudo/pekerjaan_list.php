<div class="container-fluid pad-t" style="padding:20px;">
	<div class="row">
		<div class="col-xs-6 title">
			Pekerjaan
		</div>
		<div class="col-xs-6" align="right">
			<a href="<?php echo site_url('sudo/pekerjaan/tambah'); ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Pekerjaan</button></a>
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
				<th>ikon</th>
				<th>ikon 2</th>
				<th>judul</th>
				<th width="30%">konten</th>
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
					<td><?php echo $no; ?></td>
					<td><img src="<?php echo base_url('assets/img/ikon/'.$result->foto); ?>" class="img-responsive img-thumbnail img-sm"></td>
					<td><img src="<?php echo base_url('assets/img/ikon2/'.$result->foto2); ?>" class="img-responsive img-thumbnail img-sm"></td>
					<td><?php echo htmlspecialchars($result->judul); ?></td>
					<td><?php echo htmlspecialchars($result->isi); ?></td>
					<td>
						<a href="<?php echo site_url('sudo/pekerjaan/ubah/'.$result->id); ?>"><button type="button" class="btn btn-sm btn-default">Ubah</button></a>
						<a href="<?php echo site_url('sudo/pekerjaan/hapus/'.$result->id); ?>" onclick="return confirm('Hapus <?php echo htmlspecialchars($result->judul); ?>?')"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a>
					</td>
				</tr>
				<?php
				$no++;
				}
			}else{
				echo '<tr><td colspan="5" align="center">Tidak ada data</td></tr>';
			}
			?>
		</tbody>
	</table>
</div>