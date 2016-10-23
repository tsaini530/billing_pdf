<?php
 require('config.php');	

     $tqty=0;
	$oqery="SELECT  * FROM billorder WHERE idorder ='$orderid'";
	$oitemery="SELECT  * FROM itemorder WHERE idorder ='$orderid'";
	$soqery = $conn->query($oqery); 
	$order =$soqery->fetchObject();
	$oitem=$conn->query($oitemery)->fetchAll(PDO::FETCH_OBJ);
	$tin="SELECT  * FROM invoice WHERE invoice_name ='tin' ";
	$tin_result = $conn->query($tin)->fetchObject(); 

?>

<html>
<head>
	<title> Monarch Invoice</title>
	

</head>
<body >
<div style=" font-size: 9pt; font-family: tahoma,arial;float:left;width:50% ">
	<div style="float:left" >
		<strong>Tin:<?=$tin_result->value?> </strong><br>
		<strong>Date:<?php echo date('d M,Y', strtotime($order->orderdate));?></strong><br>

		<strong>Mob:9928663963	<br>
		<label>Invoice No:<?php echo $order->invoice_no;?></label>
		</strong>
			</div>
</div>
		<div style=" font-size: 9pt; font-family: tahoma,arial ;float:right; width:50%">
		    <div class="invoicefont" style="float:left">

				<h1 class="text-center "><strong> Monarch Art and frames</strong></h1>
				<h3 class="text-center "><strong>P-2 AnandPuri M.D.Road Jaipur,302004</strong></h3>
				</div>
		</div>
<div style="padding: 15px 0px; display: block; clear: both;"></div>

<div style=" font-size: 9pt; font-family: tahoma,arial;float:left; width:50%">
	<div  style="float:left">
		<strong style="color:#002875;">Shipping Information:</strong><br />	
		<address>
			<?=$order->name?><br>
			<?=$order->address?><br>
			<?=$order->mobile?>
		</address>
	</div>
</div>
<div style=" font-size: 9pt; font-family: tahoma,arial;float:right; width:50%">

	<div  style="float:left">
		<strong style="color:#002875;">Billing Information:</strong><br />	
		<address>
			<?=$order->name?><br>
			<?=$order->address?><br>
			<?=$order->mobile?>
		</address>
	</div>
</div>
<table width="100%" cellspacing="0" cellpadding="5"  style="border-collapse:collapse;font-size: 9pt;border:1px solid #ddd;">
    <tr style="background-color: #F1F1F1;">
        <td style="border:1px solid #ddd;" align="center"><b>Sku - Product Name</b></td>
        <td style="border:1px solid #ddd;" align="center"><b>Qty</b></td>
        <td style="border:1px solid #ddd;" align="center"><b>Price</b></td>
        <td style="border:1px solid #ddd;" align="center"><b>Vat</b></td>
        <td style="border:1px solid #ddd;" align="center"><b>Sub-Total</b></td>
    </tr>
	   <?php foreach ($oitem as $key => $item) {
	   	$itemprice='';
	   	$vat='';
	   	$vat=round(($item->price*5.21)/100);
	   	$itemprice=$item->price-$vat;
	   	$pname=$conn->query("SELECT name FROM sku WHERE code ='$item->sku'")->fetchObject();
	   	?>
   
    <tr>
     <td style="border:1px solid #ddd;" ><?=$item->sku.'-'.$pname->name?>
            
        </td>
        <td  style="border:1px solid #ddd;" width="10%" align="center"><?=$item->qty?></td>
        <td style="border:1px solid #ddd;" width="20%" align="right"><?=$itemprice?> Rs</td>
         <td style="border:1px solid #ddd;" width="10%" align="right"><?=$vat?> Rs</td>

        <td style="border:1px solid #ddd;" width="10%" align="right"><?=$item->price*$item->qty ;?> Rs  </td>
    </tr>
    <?php $tqty+= $item->qty;     }?>

	<tr style="background-color: #dff0d8;">
	    <td style="border:1px solid #ddd;" colspan="2" align="left">
	        <span >Qty Total: <?=$tqty?> Pcs</span>
	    </td>
	    <td style="border:1px solid #ddd;" colspan="2" align="right">
	        <strong>Grand Total:</strong>
	    </td>
	    <td style="border:1px solid #ddd;" align="right"><strong><?=$order->total_price?> Rs</strong></td>
	</tr>
</table>



</body>
