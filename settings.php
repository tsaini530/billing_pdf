<!DOCTYPE html>
<html>
<head>
	<title>Change setting</title>
	<link rel="stylesheet" type="text/css" href="./stylesheets/css/bootstrap.min.css">
<script src="javascripts/jquery-3.1.0.min.js"></script>


</head>
<body>
<div class="panel panel-white">
<div class="panel-heading ">
	<h5 class="title">Change Confgration Data</h5>
</div>

	<div class="panel-body">
		<h1 class="text-captilize text-bold text-center">setting data comming soon...	</h1>
		<form class="row" id="form1">
			<div class="col-md-4">
				<div class="form-group " >
					<label class="control-label "  for="name">Name: </label>
					<input type="text" name="name" id="name" class="form-control " value="Invoices No" readonly="true">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group " >
					<label class="control-label "  for="vale">Value: </label>
					<input type="text" name="invoice" id="value" class="form-control " value="">
				</div>
			</div>
			<div class="col-md-4">
				<button type="button" class="btn btn-teal legitRipple ">Update details  <i class="icon-arrow-right14 position-right"></i></button>
			</div>
		</form>
		<form class="row" id="form2">
			<div class="col-md-4">
				<div class="form-group " >
					<label class="control-label "  for="name">Name: </label>
					<input type="text" name="name" id="name" class="form-control " value="Tin No" readonly="true">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group " >
					<label class="control-label "  for="vale">Value: </label>
					<input type="text" name="tin" id="value" class="form-control " value="">
				</div>
			</div>
			<div class="col-md-4">
				<button type="button" class="btn btn-primary legitRipple ">Update details  <i class="icon-arrow-right14 position-right"></i></button>
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
				alert();
				console.log( 'data',response);
				
			}
		});

	});
</script>
</html>
