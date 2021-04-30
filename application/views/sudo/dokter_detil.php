<style>
.box{
	background-color:#fff;
	padding:10px;
	border:1px solid #f2f2f2;
	box-shadow:1px 2px 1px #bdbdbd;
}

.pre_label{
	margin-bottom:10px;
}

.comment_container{
	border:1px solid #f2f2f2;
	padding:10px;
}

.comment_container > .comment_info{
	font-size:9pt;
}

.comment_container > .comment_info > .name{
	font-weight:bold;
}

.comment_text{
	color:#696969;
}
</style>

<div class="container-fluid pad-t" style="padding:20px;">
	<div class="row">
		<div class="col-xs-6 title">
			Dokter Detil
		</div>
		<div class="col-xs-6" align="right">
			<a href="<?php echo site_url('sudo/dokter'); ?>"><button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-triangle-left"></span> Kembali</button></a>
		</div>
	</div>
	<hr/>
	<br/>
	<?php
	if($this->input->get('balasan')==1){
		echo '<div class="alert alert-success">Berhasil memasukan data</div>';
	}else if($this->input->get('balasan')==2){
		echo '<div class="alert alert-danger">Gagal memasukan data</div>';
	}
	?>
	<form action="#" class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-2">Nama Dokter</label>
			<div class="col-sm-4">
				<input type="text" name="nama_dokter" maxlength="100" value="<?php echo $query['nama_dokter'] ?>" placeholder="Dr. Agus Wahyono" class="form-control" readonly>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Profesi</label>
			<div class="col-sm-4">
				<input type="text" name="profesi" maxlength="100" value="<?php echo $query['profesi'] ?>" placeholder="Spesialis Jantung" class="form-control" readonly>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2">Status Kehadiran</label>
			<div class="col-sm-4" style="margin-top:5px;">
				<?php echo $query['status'] ?>
			</div>
		</div>
	</form>

	<hr/>
	<form action="<?php echo site_url('/sudo/dokter/post_comment/'.$query['id']); ?>" method="post">
		<textarea name="comment" class="form-control" maxlength="200" placeholder="Tuliskan Komentar Anda.." required></textarea>
		<button type="submit" class="btn btn-sm btn-primary" style="margin-top:10px;">Post</button>
	</form>
	<?php
	if(count($comments) > 0){
		foreach($comments as $comment){
			?>
			<div class="comment_container">
				<div class="comment_info">
					<div class="name">
						<?php echo $comment['is_admin'] ? 'Administrator' : $comment['full_name']; ?>
					</div>
					<div class="date">
						<?php echo date("H:i, d M Y", strtotime($comment['comment_date'])); ?>
					</div>
				</div>
				<div class="comment_text">
					<?php echo $comment['text']; ?>
				</div>
			</div>
			<?php
		}
	}else{
		echo '<center style="color:#bdbdbd">Tidak ada komentar</center>';
	}
	?>
</div>