<?php $this->load->view('default/template/nav');?>
<div class="position-content">
	<ul class="nav nav-tabs cus-nav-tabs">
	  <li role="presentation" class="active"><a href="#feature-tab" class="feature">UPCOMING</a></li>
	  <li role="presentation"><a href="#popular-tab" class="popular">PAST</a></li>
	</ul>
	<div class="container">
		<div id="feature-tab" class="tab-content">
		<?php
			if($results!=FALSE){
				foreach ($results as $rows) {
					?>
					<!-- Start Appointment -->
					<div class="row">
						<div class="ms-top-appointment">
							<div class="col-xs-6 text-left">
								Appointment for <span class="self"><?php 
									if($rows->relation == 1)
										echo "Self";
									if($rows->relation == 2)
										echo "Other";
									?></span>
							</div>
							<div class="col-xs-6 text-right">
								<a href="#" type="button" class="btn btn-green"><?php 
									if($rows->status_appointment == 0)
										echo "Pending";
									if($rows->status_appointment == 1)
										echo "<i class='fa fa-check fa-fw'></i> Approved";
									?></a>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="ms-appointment">
							<div class="col-xs-3">
								<?php
									if($rows->avatar != ""){
										?>
										<img src="<?php echo base_url($rows->avatar)?>" class="img-responsive">
										<?php
									}
									else{
										?>
										<i class="fa fa-user fa-5x"></i>
										<?php
									}
								?>
							</div>
							<div class="col-xs-6">
								<b><?php echo $rows->full_name; ?></b>
								<p class="grey">
								<?php 
								if($rows->address == "")
									echo "Address Not Filled";
								else echo $rows->address
								?><br />
								</p>
							</div>
							<div class="col-xs-3 text-right">
								<p class="time">
									<?php echo date('H:i',strtotime($rows->hour_appointment))?><br />
									<?php
										echo date('D, d M Y', strtotime($rows->date_appointment));
									?>
								</p>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="row row-footer-appointment">
							<div class="col-xs-1"></div>
							<div class="col-xs-11">
								<div class="ms-footer-appointment">
									<div class="col-xs-4">
											<a href="<?php echo base_url($this->uri->segment(1).'/chat/'.$rows->id_doctor)?>">
												<i class="fa fa-comment fa-fw"></i> Chat
											</a>
										</div>
										<div class="col-xs-4">
											<a href="<?php echo base_url($this->uri->segment(1).'/detail-appointment/'.$rows->id_appointment)?>">
												<i class="fa fa-info fa-fw"></i> Detail
											</a>
										</div>
										<div class="col-xs-4">
											<a href="<?php echo base_url($this->uri->segment(1).'/status-canceled/'.$rows->id_appointment)?>">
												<i class="fa fa-close fa-fw"></i> Cancel
											</a>
										</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End of Appointment -->
					<?php
				}
			}
			else{
				?>
				<div class="row">
					<h2>No Data Found</h2>
				</div>
				<?php		
			}
		?>
		
		</div>
		<div class="celarfix"></div>	
		</div>
		<div id="popular-tab" class="tab-content" style="display:none">
			<div class="container">
				<?php
					if($results2!=FALSE){
						foreach ($results2 as $rows) {
							?>
							<!-- Start Appointment -->
							<div class="row">
								<div class="ms-top-appointment">
									<div class="col-xs-6 text-left">
										Appointment for <span class="self"><?php 
											if($rows->relation == 1)
												echo "Self";
											if($rows->relation == 2)
												echo "Other";
											?></span>
									</div>
									<div class="col-xs-6 text-right">
										<a href="#" type="button" class="btn btn-green"><?php 
											if($rows->status_appointment == 2)
												echo "<i class='fa fa-close fa-fw'></i> Canceled";
											if($rows->status_appointment == 3)
												echo "<i class='fa fa-check fa-fw'></i> Done";
											?></a>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="ms-appointment">
									<div class="col-xs-3">
										<?php
											if($rows->avatar != ""){
												?>
												<img src="<?php echo base_url($rows->avatar)?>" class="img-responsive">
												<?php
											}
											else{
												?>
												<i class="fa fa-user fa-5x"></i>
												<?php
											}
										?>
									</div>
									<div class="col-xs-6">
										<b><?php echo $rows->full_name; ?></b>
										<p class="grey">
										<?php echo $rows->address?><br />
										</p>
									</div>
									<div class="col-xs-3 text-right">
										<p class="time">
											<?php echo date('H:i',strtotime($rows->hour_appointment))?><br />
											<?php
												echo date('D, d M Y', strtotime($rows->date_appointment));
											?>
										</p>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="row row-footer-appointment">
									<div class="col-xs-1"></div>
									<div class="col-xs-11">
										<div class="ms-footer-appointment">
											<div class="col-xs-4">
											<a href="<?php echo base_url($this->uri->segment(1).'/chat/'.$rows->id_member)?>">
												<i class="fa fa-comment fa-fw"></i> Chat
											</a>
										</div>
										<div class="col-xs-4">
											<a href="<?php echo base_url($this->uri->segment(1).'/detail-appointment/'.$rows->id_appointment)?>">
												<i class="fa fa-info fa-fw"></i> Detail
											</a>
										</div>
										<div class="col-xs-4">
											<?php
												if($rows->status_appointment == 3 && $rows->love_it == 0){
											?>
											<a href="<?php echo base_url($this->uri->segment(1).'/love-it/'.$rows->id_appointment)?>">
												<i class="fa fa-heart-o fa-fw"></i> Love it
											</a>
											<?php
												}
												else if($rows->status_appointment == 3 && $rows->love_it == 1){
													?>
													<i class="fa fa-heart fa-fw"></i> Loved
													<?php	
												}
											?>
										</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End of Appointment -->
							<?php
						}
					}
					else{
						?>
						<div class="row">
							<h2>No Data Found</h2>
						</div>
						<?php		
					}
				?>
				</div>
				<div class="celarfix"></div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		 $(".cus-nav-tabs a").click(function(event) {
	        event.preventDefault();
	        $(this).parent().addClass("active");
	        $(this).parent().siblings().removeClass("active");
	        var tab = $(this).attr("href");
	        $(".tab-content").not(tab).css("display", "none");
	        $(tab).fadeIn();
	    });
	</script>
</body>
</html>
