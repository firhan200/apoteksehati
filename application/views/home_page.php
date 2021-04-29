<script type="text/javascript">
$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();  
}); 
</script>

<div class="container-fluid" style="padding:0;" id="slider">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<div class="carousel-container">
		  	<!-- Wrapper for slides -->
		  	<div class="carousel-inner" role="listbox"> 
		  		<?php $i=1;foreach($query_slider->result() as $result){ ?>	  		
		    	<div class="item <?php if($i==1) echo 'active'; ?>">
		     		<img src="assets/img/slider/<?php echo $result->foto; ?>" alt="..." style="height:350px;width:100%;">
		    	</div>
		    	<?php $i++; } ?> 	
		  	</div>
		  	<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
		  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    	<span class="sr-only">Next</span>
		  	</a>
		</div>
	</div>
</div>
<div class="container" style="padding-top:90px;" id="pekerjaan">
	<div class="title">
		Apa Yang Kami Kerjakan?
		<div class="sep">
		</div>
	</div>
	<?php $i=1;foreach($query_pekerjaan->result() as $result){ ?>	
	<div class="col-sm-4 brand-t" align="center">
		<img src="<?php echo base_url('assets/img/ikon/'.$result->foto); ?>" class="flip-t">
		<div class="title-t">
			<?php echo htmlspecialchars($result->judul); ?>
		</div>
		<p><?php echo htmlspecialchars($result->isi); ?></p>
	</div>
	<?php } ?>
</div>
<div class="section-t pad-t" id="profil">
	<div class="container">
		<div class="title">
			Profil Kami
			<div class="sep" style="background-color:#D7EED1 !important">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<img src="<?php echo base_url('assets/img/'.$foto); ?>" class="img-responsive img-thumbnail">
			</div>
			<div class="col-sm-8">
				<p align="justify"><?php echo htmlspecialchars($teks_profil); ?></p>
			</div>
		</div>
	</div>
</div>
<div class="container" align="center" id="jadwal-dokter" style="padding-top:70px;">
	<div class="title">
		Dokter
		<div class="sep">
		</div>
	</div>
	<table class="table mytable">
		<thead>
			<tr>
				<th>Nama Dokter</th>
				<th>Profesi</th>
				<th width="30%"><center>Status Kehadiran</center></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($query_dokter->result() as $result){ ?>
			<tr>
				<td><?php echo htmlspecialchars($result->nama_dokter) ?></td>
				<td><?php echo htmlspecialchars($result->profesi) ?></td>
				<td align="center">
					<?php if($result->status=='Ada'){
						echo '<div class="badge1">Ada</div>';
					}else{
						echo '<div class="badge2">Tidak Ada</div>';
					} ?>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<div class="strip-t">
</div>
<div class="container pad-t" align="center" id="foto">
	<div class="title">
		Foto
		<div class="sep">
		</div>
	</div>
	<div class="row">
		<?php foreach($query_foto->result() as $result){ ?>
			<div class="col-sm-3">
				<a href="<?php echo base_url('assets/img/foto/'.$result->foto); ?>" data-title="Apotek Sehati" data-toggle="lightbox">
					<img src="<?php echo base_url('assets/img/foto/'.$result->foto); ?>" class="img-responsive img-thumbnail">
				</a>
			</div>
		<?php } ?>
	</div>
</div>