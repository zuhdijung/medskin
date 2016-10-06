<?php $this->load->view('default/template/nav'); ?>
	<div class="position-content">

	<?php 
		if($results != FALSE){
			foreach ($results as $rows) {
	?>
		<div class="content-part find">
			<div class="profile">
				<div class="profile-photo">
					<?php
						if($rows->avatar != ""){
							?>
							<img src="<?php echo base_url($rows->avatar)?>" class="img-responsive">
							<?php
						}
						else{
							?>
							<i class="fa fa-user fa-3x"></i>
							<?php
						}
					?>
					<p>Online</p>
				</div>
				<div class="profile-name">
					<p class="name"><?php echo $rows->full_name;?></p>
					<?php
						if($rows->address!=""){
							?>
							<p class="address"><?php echo $rows->address;?></p>
							<?php
						}
						else{
							?>
							<p class="address">Address Not Filled</p>
							<?php
						}
					?>
					<?php
						if($rows->city!=""){
							?>
							<p class="location"><span class="icon-location"></span><?php echo $rows->city;?></p>
							<?php
						}
						else{
							?>
							<p class="address">City Not Filled</p>
							<?php
						}
					?>
				</div>
				<div class="profile-action">
					<a href="<?php echo base_url('member/chat/'.$rows->id_user)?>" class="icon-chat"></a><br />
					IDR <?php echo number_format($rows->consultation_fare)?>
				</div>
			</div>
			<div class="find-content">
				<div class="desc-doc">
					<p><span class="icon-love"></span> <?php echo $rows->love;?> People loved</p>
					<p><span class="icon-baggage"></span> <?php echo $this->muser->countExperience($rows->id_user);?> Experiences</p>
				</div>
				<div class="find-action">
					IDR <?php echo number_format($rows->appointment_fare)?>
					<a href="<?php echo base_url('member/book-appointment/'.$rows->id_user)?>" type="button" class="btn btn-message">BOOK</a>
				</div>
			</div>
		</div>
	<?php } 
	}
	?>
	</div>
</body>
</html>