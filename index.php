<?php
$codelist=['MAF-01','MAF-02','MAF-03','MAF-04'];
?>
<!DOCTYPE html>
<html lang="en-IN">
<head><title>Monarch</title>
<link rel="stylesheet" type="text/css" href="./stylesheets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./stylesheets/styles.css">
<script src="javascripts/jquery-3.1.0.min.js"></script>
<script src="javascripts/js/bootstrap.min.js"></script>
<script src="javascripts/main.js"></script>




</head>
<body  class="container">

<form novalidate="false" >
	<div class="panel">
	<div class="panel-heading">
		<span class="pull-left">Tin:1234567890</span>	<span class="pull-right">Mob:9928663963	</span>
		<div class="clear" ></div>
		<div class="form-inline pull-right form-group ">
				<label  class="control-label" for="customer">Date: </label>
				<input type="text" name="customer" id="customer" class="form-control" value="<?php echo date('d M,Y') ;?>">
		</div>
		<div class="panel-title">
		<h1 class="text-center "><strong> Monarch Art and frames</strong></h1>
		<h3 class="text-center "><strong>P-2 AnandPuri M.D.Road Jaipur,302004</strong></h3>
		</div>
	</div>
	
	<div class="panel-body">
	<div class="form-inline ">
		<div class="form-group col-xs-6 " >
			<label class="control-label "  for="customer">Name: </label>
			<input type="text" name="customer" id="customer" class="form-control " value="">
		</div>
		<div class="form-group col-xs-6" >
			<label class="control-label "  for="mobile">Mob: </label>
			<input type="text" name="mobile" id="mobile" class="form-control " value="">
		</div>
	</div>
	<div class="clear"></div>

	<div class="form-inline ">
		<div class="form-group col-xs-6 " >
			<label class="control-label "  for="address">Address: </label>
			<textarea class="form-control" name="address" id="address"></textarea> 
		</div>
		
	</div>
		<div class="clear"></div>

	<div class=" form-inline ">
	<div class="form-group col-xs-3" >
			<label class="control-label "  for="code">code: </label>
			<select class="form-control" id="code" >
			<?php 
			foreach ($codelist as $key => $value) {
				echo "<option value='".$key."'>".$value."</option>";
			}
			?>
				
			</select>
		</div>
		<div class="form-group col-xs-3 " >
			<label class="control-label "  for="qty">Qty: </label>
			<input type="number" name="qty" id="qty" class="form-control " value="1">
		</div>
		<div class="form-group col-xs-3" >
			<label class="control-label "  for="price">Price: </label>
			<input type="text" name="price" id="price" class="form-control " value="">
		</div>
		
		<div class="text-right col-xs-3">
		<button type="button" class="btn btn-primary legitRipple adddetails">add details  <i class="icon-arrow-right14 position-right"></i></button></div>
	</div>
	<div class="clear"></div>

	<div class="text-right">
		<button type="submit" class="btn btn-primary legitRipple">Submit form <i class="icon-arrow-right14 position-right"></i></button></div>
</div>
</div>

</form>

</body>
<script type="text/javascript">
$('.adddetails').on('click',function(){
  var code= $('#code').val();
  var qty= $('#qty').val();
  var price= $('#price').val();


  alert(code);

});
	 $(document).ready(function(){
	 	alert('hihh');
	 });
</script>
</html>