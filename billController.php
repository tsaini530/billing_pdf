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
	       	case 'findByIdSku':
	       		$this->findByIdSku();
	       		break;
	       	case 'updateSku':
	       		$this->updateSku();
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
				$dataUpdate=$this->conn->prepare($orderUpdate)->execute() or die();
				$invoiceUpdate="UPDATE invoice SET value='$invoice_value' WHERE invoice_name='invoice_no' ";
				if($this->conn->prepare($invoiceUpdate)->execute()){
					$this->makePdf($orderid);
				}
				else{
					 print_r($this->conn->prepare($invoiceUpdate)->errorInfo());die();
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
	   	$mpdf->SetHeader('Original');
	   	$mpdf->writeHtml($html);
	   	$mpdf->SetHeader('Duplicate');
		$mpdf->AddPage();
		$mpdf->writeHtml($html);
	   	$filename='order-'.$orderid.'.pdf';
	   	$mpdf->output($filename,'D');
	   	$URL="index.php";
	   	echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
	   echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";

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
	function findByIdSku(){
		$id=$_POST['data'];
		$sql = "SELECT * FROM sku  WHERE idsku='$id'";
		$result=$this->conn->query($sql)->fetch(PDO::FETCH_OBJ);
		if(!empty($result)){
			echo json_encode($result);exit();

		}
		else{
			$result=[];
			$result=["error"=>"can not find data"];
			echo json_encode($result);exit();
		}
	}
	function updateSku(){
		$data=$_POST['data'];
		parse_str($data,$output);
		$id=$output['idsku'];
		$code=$output['code'];
		$name=$output['name'];
		$mrp=$output['mrp'];
		if(!empty($output['idsku'])){
			$sql="UPDATE sku SET 
				code='$code',
				name='$name',
				mrp='$mrp'
				WHERE idsku='$id' ";
			$result=$this->conn->prepare($sql)->execute();
			echo json_encode("Update Sku  successfully");exit();

		}
		else{
			$sql="INSERT INTO sku (name,code,mrp) VALUES (:name,:code,:mrp)";
			$result=$this->conn->prepare($sql)->execute([':name'=>$name,':code'=>$code,':mrp'=>$mrp]);
			echo json_encode("Insert  New Sku  successfully");exit();
		}
	}
}


$bill = new billController();
$bill->execute($action);
?>