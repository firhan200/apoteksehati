<div class="container-fluid pad-t" style="padding:20px;">
	<div class="row">
		<div class="col-xs-6 title">
			Users
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
				<th>Nama</th>
				<th>Email</th>
				<th>Request Reset Password</th>
				<th>Aktif</th>
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
					<td><?php echo $result->full_name; ?></td>
					<td><?php echo $result->email; ?></td>
					<td><?php echo $result->request_reset_password != null ? date("H:i, d M Y", strtotime($result->request_reset_password)) : "-"; ?></td>
					<td><?php echo $result->is_active ? 'Aktif' : 'Tidak Aktif'; ?></td>
					<td>
						<a href="<?php echo site_url('sudo/user/ubah/'.$result->id); ?>"><button type="button" class="btn btn-sm btn-default">Ubah</button></a>
						<a href="<?php echo site_url('sudo/user/hapus/'.$result->id); ?>" onclick="return confirm('Hapus user?')"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a>
						<?php if($result->request_reset_password != null){ ?>
						<a href="<?php echo site_url('sudo/user/reset_password/'.$result->id); ?>"><button type="button" class="btn btn-sm btn-warning">Reset Password</button></a>
						<?php } ?>
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