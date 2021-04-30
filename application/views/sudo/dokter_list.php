<div class="container-fluid pad-t" style="padding:20px;">
	<div class="row">
		<div class="col-xs-6 title">
			Dokter
		</div>
		<div class="col-xs-6" align="right">
			<a href="<?php echo site_url('sudo/dokter/tambah'); ?>"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Dokter</button></a>
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
				<th>No</th>
				<th>Nama Dokter</th>
				<th>Profesi</th>
				<th>Status</th>
				<th>Komentar</th>
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
					<td><?php echo htmlspecialchars($result->nama_dokter); ?></td>
					<td><?php echo htmlspecialchars($result->profesi); ?></td>
					<td><?php echo htmlspecialchars($result->status); ?></td>
					<td><?php echo $result->total_comment; ?></td>
					<td>
						<a href="<?php echo site_url('sudo/dokter/ubah/'.$result->id); ?>"><button type="button" class="btn btn-sm btn-default">Ubah</button></a>
						<a href="<?php echo site_url('sudo/dokter/hapus/'.$result->id); ?>" onclick="return confirm('Hapus <?php echo htmlspecialchars($result->nama_dokter); ?>?')"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a>
						<a href="<?php echo site_url('sudo/dokter/detil/'.$result->id); ?>"><button type="button" class="btn btn-sm btn-warning">Detil</button></a>
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