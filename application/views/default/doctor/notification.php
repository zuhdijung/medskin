<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('default/common/header');?>
</head>
<body>
	<header>
		<nav class="navbar navbar-default cus-nav">
		  <div class="head">
		  	<div class="back">
		  		<a onclick="goBack()" href="" type="button" class="icon-back"></a>
		  	</div>
		  	<div class="ms-title-page">Notification</div>
		  </div>
		</nav>
	</header>
	<div class="clearfix"></div>
	<div class="position-content">
		<div class="ms-notification">
			<?php
				if($results!=FALSE){
					foreach ($results as $rows) {
						?>
						<a href="<?php echo base_url($this->uri->segment(1).$rows->link_notification)?>">
						<div class="row">
							<div class="col-xs-12">
								<div class="col-xs-2">
									<?php
										if($rows->notification_type == 1){
											?>
											<img src="<?php echo base_url('assets/asset_default/image/calendar.png')?>" class="img-responsive" alt="img">
											<?php
										}
										else if($rows->notification_type == 2){
											?>
											<img src="<?php echo base_url('assets/asset_default/image/idea.png')?>" class="img-responsive" alt="img">
											<?php
										}
										else if($rows->notification_type == 3){
											?>
											<img src="<?php echo base_url('assets/asset_default/image/chat.png')?>" class="img-responsive" alt="img">
											<?php
										}
									?>
								</div>
								<div class="col-xs-10">
									<?php echo $rows->notification?>
									<div class="ms-notification-time">
										<?php
											echo date('D, d M Y',strtotime($rows->date_notification));
										?>
									</div>
								</div>
							</div>
						</div>
						</a>
						<?php
						
					}
				}
			?>
		</div>
	</div>
</body>
</html>