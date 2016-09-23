<?php
 require('config.php');	

if(!empty($_GET)){
	$orderid=$_GET['orderid'];
	$oqery="SELECT  * FROM billorder WHERE idorder ='$orderid'";
	$$oitemery="SELECT  * FROM itemorder WHERE idorder ='$orderid'";
	$soqery = $conn->query($oqery); 
	$order =$soqery->fetchObject();
	
}
?>

<html>
<head>
	<title> Monarch Invoice</title>
	<link rel="stylesheet" type="text/css" href="./stylesheets/css/bootstrap.min.css">
</head>
<body class="container">
<div class="panel">
	 <div class="panel-heading">
		<label class="pull-left">Tin:1234567890</br>
		<label> Date:<?php echo date('d M,Y', strtotime($order->orderdate));?></label>
		</label>	
		<label class="pull-right">Mob:9928663963	</br>
		<label>Invoice No:<?php echo $order->invoice_no;?></label></label>
		<div class="clear" ></div>
		<div class="panel-title">
		<h1 class="text-center "><strong> Monarch Art and frames</strong></h1>
		<h3 class="text-center "><strong>P-2 AnandPuri M.D.Road Jaipur,302004</strong></h3>
		</div>
	</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6">
					<p>Billto</p>
				</div>
				<div class="col-md-6"></div>

			</div>
		</div>
</div>


</body>
<?php
die();?>