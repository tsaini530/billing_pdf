<?php
 /**
 * 
 */
 require('config.php');	
 
 
if(!empty($_POST))
{ 	$total_price=0;
	$new_date=date('Y-m-d',strtotime($_POST['date']));
    $sql = "INSERT INTO billorder (name,mobile,address,orderdate) VALUES (:name,:mobile,:address,:orderdate)";
		$query = $conn->prepare($sql);
		$order=$query->execute(array(
			':name'=>$_POST['name'],
			':mobile'=>$_POST['mobile'],
			':address'=>$_POST['address'],
			':orderdate'=>$new_date
			));
		if($order){
			$orderid = $conn->lastInsertId();
			foreach ($_POST['orderitem'] as $key => $value) {
				$orderitem="INSERT INTO itemorder (idorder,sku,qty,price) VALUES (:orderid,:sku,:qty,:price)";
				$items=$conn->prepare($orderitem);
				$oitem=$items->execute([
					':orderid'=>$orderid,
					':sku'=>$value['sku'],
					':qty'=>$value['qty'],
					':price'=>$value['price']
					]);
				if($oitem){
					$total_price +=$value['tprice'];
				}
			}
			$orderUpdate="UPDATE billorder SET total_price='$total_price' WHERE idorder='$orderid' ";
			$dataUpdate=$conn->prepare($orderUpdate)->execute();
			header("location: index.php");
		}
			else{
				 print_r($query->errorInfo());die();
			}
		
}


	
?>