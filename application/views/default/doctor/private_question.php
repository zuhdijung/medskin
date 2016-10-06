<?php $this->load->view('default/template/nav_doctor'); ?>
	<div class="position-content">
	<?php for($article=0; $article<4; $article++){?>
		<div class="content-part find">
			<div class="profile">
				<div class="profile-photo">
					<img src="<?php echo base_url('assets/asset_default/image/actor.png')?>" class="img-responsive">
				</div>
				<div class="profile-name">
					<p class="name">Rani Putri Merliasari</p>
					<p class="address">Lorem Ipsum dolor sil amet Lorem Ipsum dolor sil amet Lorem Ipsum dolor sil amet Lorem Ipsum dolor sil amet</p>
					<p class="location"><span class="icon-location"></span>Jakarta</p>
				</div>
				<div class="profile-action">
					12:28 PM
				</div>
			</div>
			<div class="find-content">
				<div class="find-action">
					<a href="<?php echo base_url('member/chat')?>" type="button" class="btn btn-message">MESSAGES</a>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
</body>
</html>