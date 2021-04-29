<!-- extra javascript -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatables/media/css/jquery.dataTables.min.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assets/datatables/media/js/jquery.dataTables.min.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#mytable').DataTable();
});
</script>

<div class="container pad-t">
	<br/>
	<div class="title-content">
		Jadwal Kehadiran Dokter
	</div>
	<br/>
	<div class="box-t">
		<table class="table" id="mytable">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Dokter</th>
					<th>Profesi</th>
					<th>Status Kehadiran</th>
				</tr>
			</thead>
			<tbody>
				<?php for($i=1;$i<=25;$i++){ ?>
				<tr>
					<td><?php echo $i; ?>.</td>
					<td>Dr. Firhan</td>
					<td>Spesialis THT</td>
					<td>Ada</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>