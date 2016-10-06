<script type="text/javascript">
		 $(".cus-nav-tabs a").click(function(event) {
	        event.preventDefault();
	        $(this).parent().addClass("active");
	        $(this).parent().siblings().removeClass("active");
	        var tab = $(this).attr("href");
	        $(".tab-content").not(tab).css("display", "none");
	        $(tab).fadeIn();
	    });
		 $(".ms-appointment-time .time :radio").hide().click(function(e){
		    e.stopPropagation();
		});
		$(".ms-appointment-time div .time").click(function(e){
		    $(this).closest(".ms-appointment-time").find(".time").removeClass("selected");
		    $(this).addClass("selected").find(":radio").click();
		});

		$('.collapse').on('shown.bs.collapse', function(){
		$(this).parent().find("fa-caret-down").removeClass("fa-caret-down").addClass("fa-caret-up");
		}).on('hidden.bs.collapse', function(){
		$(this).parent().find(".fa-caret-up").removeClass("fa-caret-up").addClass("fa-caret-down");
		});	
	</script>
	<script type="text/javascript" src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js')?>"></script>
	<script type="text/javascript">
		$('#datepicker').datepicker({
		    format: "d M yyyy",
		    todayBtn: "linked",
		    startDate: '+0d',
		    autoclose: true
		});
		$('#birthday').datepicker({
		    format: "d M yyyy",
		    endDate: '+0d',
		    autoclose: true
		});
	</script>