<?php
 /**
 * 
 */
 $action = $_POST['action'];
 
 class billController{

	function execute($action) {

        switch($action) {
            case "index":
                $this->index();
                break;
            case "getprice":
                $this->getprice();
                break;
            case "makePdf":
            $this->makePdf();
            break;
        }
    }


	function index(){
		require('config.php');
		if(!empty($_POST)){
		 	$total_price=0;
			$new_date=date('Y-m-d',strtotime($_POST['date']));
			$invoice_value=$_POST['invoice_no']+1;
		    $sql = "INSERT INTO billorder (name,mobile,address,orderdate,invoice_no) VALUES (:name,:mobile,:address,:orderdate,:invoice_no)";
			$query = $conn->prepare($sql);
			$order=$query->execute(array(
				':name'=>$_POST['name'],
				':mobile'=>$_POST['mobile'],
				':address'=>$_POST['address'],
				':orderdate'=>$new_date,
				':invoice_no'=>$_POST['invoice_no']
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
				$invoiceUpdate="UPDATE invoice SET value='$invoice_value' WHERE invoice_name='monarch' ";
				if($conn->prepare($invoiceUpdate)->execute()){
					$this->makePdf($orderid);
				}
				//header("location: index.php");
			}
				else{
					 print_r($query->errorInfo());die();
				}
			
		}
	}


	function makePdf(){
    header('Location: invoice.php?orderid=1');

	}
	function getprice(){
		require('config.php');	

		$code=$_POST['code'];
	 	$sql = "SELECT mrp FROM sku  WHERE code='$code'";
	  	$query=$conn->prepare($sql);
	  	if($query->execute()){
	  		$result=$query->fetch(PDO::FETCH_OBJ);
	  		echo json_encode($result->mrp);exit();
	  	}
	}
}


$bill = new billController();
$bill->execute($action);
?>