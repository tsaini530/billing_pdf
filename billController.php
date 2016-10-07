<?php
	
 $action = $_POST['action'];

 class billController{
 	protected $conn;

	function execute($action) {
		require('config.php');
		$this->conn=$conn;
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
            case 'getSettingData':
            	$this->getSettingData();
            	break;
        	case 'updateInvoice':
	        	$this->updateInvoice();
	        	break;
	       	case 'updateTin':
	       		$this->updateTin();
	       		break;
        }
    }


	function index(){
		if(!empty($_POST)){
		 	$total_price=0;
			$new_date=date('Y-m-d',strtotime($_POST['date']));
			$invoice_value=$_POST['invoice_no']+1;
		    $sql = "INSERT INTO billorder (name,mobile,address,orderdate,invoice_no) VALUES (:name,:mobile,:address,:orderdate,:invoice_no)";
			$query = $this->conn->prepare($sql);
			$order=$query->execute(array(
				':name'=>$_POST['name'],
				':mobile'=>$_POST['mobile'],
				':address'=>$_POST['address'],
				':orderdate'=>$new_date,
				':invoice_no'=>$_POST['invoice_no']
				));
			if($order){
				$orderid = $this->conn->lastInsertId();
				foreach ($_POST['orderitem'] as $key => $value) {
					$orderitem="INSERT INTO itemorder (idorder,sku,qty,price) VALUES (:orderid,:sku,:qty,:price)";
					$items=$this->conn->prepare($orderitem);
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
				$dataUpdate=$this->conn->prepare($orderUpdate)->execute();
				$invoiceUpdate="UPDATE invoice SET value='$invoice_value' WHERE invoice_name='invoice_no' ";
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


	function makePdf($id){
	require(__DIR__ . '/vendor/autoload.php');
    ob_start();
    $orderid=$id;
    include('invoice.php');
    $html=ob_get_contents(); 
    ob_end_clean();
 
   	$mpdf=new \mPDF();
   
   	 $mpdf->SetHeader('original');
   
    $mpdf->writeHtml($html);
    $filename='order-'.$orderid.'pdf';
    $mpdf->output($filename,'D');
 	header("location: index.php");
    
    

	}
	function getprice(){
		$code=$_POST['code'];
	 	$sql = "SELECT mrp FROM sku  WHERE code='$code'";
	  	$query=$this->conn->prepare($sql);
	  	if($query->execute()){
	  		$result=$query->fetch(PDO::FETCH_OBJ);
	  		echo json_encode($result->mrp);exit();
	  	}
	}
	function getSettingData(){
		$invoice=[];
		$sql="SELECT  * FROM invoice ";
		$result=$this->conn->query($sql)->fetchAll(PDO::FETCH_OBJ);
		foreach ($result as $key => $value) {
			$invoice[$value->invoice_name]=$value->value;
		}

			 echo  json_encode($invoice);exit();
	}
	function updateInvoice(){
		$data=$_POST['data'];
		parse_str($data,$output);
		$invoice=$output['invoice'];
		$sql="UPDATE invoice SET value='$invoice' WHERE invoice_name='invoice_no' ";
		$result=$this->conn->query($sql);
		echo json_encode($invoice);exit();
	}
	function updateTin(){
		$data=$_POST['data'];
		parse_str($data,$output);
		$invoice=$output['tin'];
		$sql="UPDATE invoice SET value='$invoice' WHERE invoice_name='tin' ";
		$result=$this->conn->query($sql);
		echo json_encode($invoice);exit();
	}
}


$bill = new billController();
$bill->execute($action);
?>