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

<div class="container" style="margin-top:100px;">
	<div class="row">
		<div class="col-sm-12 col-md-6">
			<div class="box">
				<h3>Jadwal Dokter</h3>
				<hr/>
				<div class="pre_label">
					<label>Nama Dokter</label>
					<div class="value">
						<?php echo $dokter['nama_dokter']; ?>
					</div>
				</div>
				<div class="pre_label">
					<label>Profesi</label>
					<div class="value">
						<?php echo $dokter['profesi']; ?>
					</div>
				</div>
				<div class="pre_label">
					<label>Status</label>
					<div class="value">
						<?php echo $dokter['status']; ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-6">
			<div class="box">
				<b>Tulis Komentar</b>
				<?php if($this->session->has_userdata('id_user')){ ?>
				<form action="<?php echo site_url('/main/post_comment/'.$dokter['id']); ?>" method="post">
					<textarea name="comment" class="form-control" maxlength="200" placeholder="Tuliskan Komentar Anda.." required></textarea>
					<button type="submit" class="btn btn-sm btn-primary" style="margin-top:10px;">Post</button>
				</form>
				<?php }else{ ?>
				<br/>
				Login untuk memberikan komentar
				<?php } ?>
				<hr/>
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
		</div>
	</div>
</div>