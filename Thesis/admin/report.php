<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Thesis/system/initialize.php';
if(!is_logged_in()){
  login_error_redirect();
}
if(permission('admin')){
  permission_error_redirect('index.php');
}
include 'includes/header.php';
include 'includes/sidebar.php'; ?>
<br>
<div class="container">
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header text-center text-success">
				<i class="glyphicon glyphicon-check"></i>	Order Report
			</div>
			<div class="card-body">
        <legend>Date Range: </legend>
				<form action="getOrderReport.php" method="post" id="getOrderReportForm">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-12">
				      <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-12">
				      <input type="date" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group text-right">
				    <div class="col-sm-12">
				      <button type="submit" class="btn btn-success" id="generateReportBtn" name="range"> <i class="glyphicon glyphicon-ok-sign"></i> Generate Report</button>
				    </div>
				  </div>
				</form>

        <form action="exportexcel.php" method="post" id="getexcelForm">
          <div class="form-group">
            <label for="startDates" class="col-sm-2 control-label">Start Date</label>
            <div class="col-sm-12">
              <input type="date" class="form-control" id="startDates" name="startDates" placeholder="Start Date" />
            </div>
          </div>
          <div class="form-group">
            <label for="endDates" class="col-sm-2 control-label">End Date</label>
            <div class="col-sm-12">
              <input type="date" class="form-control" id="endDates" name="endDates" placeholder="End Date" />
            </div>
          </div>
          <div class="form-group text-right">
            <div class="col-sm-12">
                 <button type="submit" class="btn btn-success" id="excelbtn" name="excel"> <i class="glyphicon glyphicon-download"></i> Export Excel</button>
            </div>
          </div>
        </form>
			</div>
		</div>
    <br>
	</div>


</div>

</div>



<script>
$(document).ready(function() {
	$("#getOrderReportForm").unbind('submit').bind('submit', function() {
		var startDate = $("#startDate").val();
		var endDate = $("#endDate").val();
		if(startDate == "" || endDate == "") {
			if(startDate == "") {
        $(".form-group").removeClass('has-error');
        $(".text-danger").remove();
				$("#startDate").closest('.form-group').addClass('has-error');
				$("#startDate").after('<p class="text-danger">The Start Date is required</p>');
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();
			}

			if(endDate == "") {
				$("#endDate").closest('.form-group').addClass('has-error');
				$("#endDate").after('<p class="text-danger">The End Date is required</p>');
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();
			}
		} else {
			$(".form-group").removeClass('has-error');
			$(".text-danger").remove();
			var form = $(this);
			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				success:function(response) {
					var mywindow = window.open('', 'Report Output', 'height=400,width=600');
	        mywindow.document.write('<html><head><title>Palengk-E Order Report</title></head><body>');
          mywindow.document.write('From ' + startDate + ' to ' + endDate);
          mywindow.document.write('<br><br>');
	        mywindow.document.write(response);
	        mywindow.document.write('</body></html>');
	        mywindow.document.close(); // necessary for IE >= 10
	        mywindow.focus(); // necessary for IE >= 10
	        mywindow.print();
				}
			});
		}
		return false;
	});

});

$(document).ready(function() {
	$("#getexcelForm").unbind('submit').bind('submit', function() {
		var startDate = $("#startDates").val();
		var endDate = $("#endDates").val();
		if(startDate == "" || endDate == "") {
			if(startDate == "") {
        $(".form-group").removeClass('has-error');
        $(".text-danger").remove();
				$("#startDates").closest('.form-group').addClass('has-error');
				$("#startDates").after('<p class="text-danger">The Start Date is required</p>');
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();
			}

			if(endDate == "") {
				$("#endDates").closest('.form-group').addClass('has-error');
				$("#endDates").after('<p class="text-danger">The End Date is required</p>');
			} else {
				$(".form-group").removeClass('has-error');
				$(".text-danger").remove();
			}
		} else {
			$(".form-group").removeClass('has-error');
			$(".text-danger").remove();
			var form = $(this);
			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: data,
				success: function(data) {
            jQuery('body').append(data);
				}
			});
		}
		return false;
	});

});

</script>

<?php include 'includes/footer.php'; ?>
