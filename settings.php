<!DOCTYPE html>
<html>
<head>
	<title>Change setting</title>
	<link rel="stylesheet" type="text/css" href="./stylesheets/css/bootstrap.min.css">
<script src="javascripts/jquery-3.1.0.min.js"></script>


</head>
<body>
<div class="panel panel-white">
<div class="alert alert-success" id="alert" role="alert" style="display:none;">
   You successfully read this important alert message.
</div>
<div class="panel-heading ">
	<h5 class="title">Change Confgration Data</h5>
</div>

	<div class="panel-body">
		<h1 class="text-captilize text-bold text-center">setting data comming soon...	</h1>
		<form class="row" id="invoiceForm">
			<div class="col-md-4">
				<div class="form-group " >
					<label class="control-label "  for="name">Name: </label>
					<input type="text" name="name" id="name" class="form-control " value="Invoices No" readonly="true">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group " >
					<label class="control-label "  for="vale">Value: </label>
					<input type="text" name="invoice" id="invoice" class="form-control " value="">
				</div>
			</div>
			<div class="col-md-4">
				<button type="button" id="btnInvoice" class="btn btn-primary legitRipple ">Update details  <i class="icon-arrow-right14 position-right"></i></button>
			</div>
		</form>
		<form class="row" id="tinForm">
			<div class="col-md-4">
				<div class="form-group " >
					<label class="control-label "  for="name">Name: </label>
					<input type="text" name="name" id="name" class="form-control " value="Tin No" readonly="true">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group " >
					<label class="control-label "  for="vale">Value: </label>
					<input type="text" name="tin" id="tin" class="form-control " value="">
				</div>
			</div>
			<div class="col-md-4">
				<button type="button" id="btnTin" class="btn btn-primary legitRipple ">Update details  <i class="icon-arrow-right14 position-right"></i></button>
			</div>
		</form>
	</div>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
			$.ajax({
			type:'POST',
			dataType:'json',
			url:'./billController.php',
			data:{action:'getSettingData'},
			success:function(response){
				$('#invoice').val(response.invoice_no);
				$('#tin').val(response.tin);
				
				
			}
		});

	});
	   $('#btnInvoice').on('click',function(){
    	var datastring = $("#invoiceForm").serialize();
    	$.ajax({
			type:'POST',
			dataType:'json',
			url:'./billController.php',
			data:{ data:datastring,action:'updateInvoice'},
			success:function(response){
				$('#alert').show().empty().append('Invoice number successfully update');
				$('#invoice').val(response);
				 $('#alert').delay(3000).fadeOut('slow');
				
				
			}
		});
	   });
	   	   $('#btnTin').on('click',function(){
    	var datastring = $("#tinForm").serialize();
    	$.ajax({
			type:'POST',
			dataType:'json',
			url:'./billController.php',
			data:{data:datastring,action:'updateTin'},
			success:function(response){
				$('#alert').show().empty().append('Tin number successfully update');
				$('#tin').val(response);
				 $('#alert').delay(3000).fadeOut('slow');

				
				
			}
		});
	   });

</script>
</html>
