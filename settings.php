<?php
require("config.php");
$sql = "SELECT * FROM sku ";
$result=$conn->query($sql)->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change setting</title>
	<link rel="stylesheet" type="text/css" href="./stylesheets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./stylesheets/styles.css">


<script src="javascripts/jquery-3.1.0.min.js"></script>
<script src="javascripts/js/bootstrap.min.js"></script>



</head>
<body  class="container " id="wrapper">
<?php include('sidebar.html'); ?>
	<div class="page-container" id="page-content-wrapper" >

		<div class="panel">
			<div class="panel-heading">
				<h2 class="panel-title text-semibold text-capitlize">Change Confgration Data </h2>
					
				<div class="alert alert-success" id="alert" role="alert" style="display:none;">
				   You successfully read this important alert message.
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-2">
					</div>
					<div class="col-md-8">
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
							<div class="col-md-4" style="margin-top:27px;">
								<button type="button" id="btnInvoice" class="btn btn-primary legitRipple ">Update details </button>
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
							<div class="col-md-4" style="margin-top:27px;">
								<button type="button" id="btnTin" class="btn btn-primary legitRipple " >Update details </button>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
				<button id="sku" class="btn btn-primary legitRipple " style="margin:10px;" onclick="addnew();"> Add new Sku </button>
				 <div class="form-group field-product-codes">
                	<div class="col-lg-12" id="listitem">
                    	<table class="table table-bordered deal_table">
                        	<thead>
		                        <th > Code</th>
		                        <th >Name</th>
		                        <th >Mrp</th>
		                        <th > Action </th>
		                    </thead>
                        	<tbody>
                        	<?php foreach($result as $key=>$value){?>
                        		<tr>
                        			<td><?=$value->code?></td>
                        			<td><?=$value->name?></td>
                        			<td><?=$value->mrp?></td>
                        			<td><button class="btn btn-success legitRipple" onclick="findSku(this.id);" id="<?php echo$value->idsku;?>">Update</button></td>

                        		</tr>
                        		<?php }?>
                       		 </tbody>
                    	</table>
                	</div>
            	</div>
				</div>
			</div>
		</div>
	</div>
	<!-- model start -->
	<div class="modal fade bd-example-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Sku Update</h4>
        </div>
        <div class="modal-body">
          <form id="skuForm">
             <div class="form-group">
              <label for="name-sku" class="form-control-label">Sku Name:</label>
              <input type="text"  class="form-control" id="name-sku" name="name" value="">
            </div>
            <div class="form-group">
              <label for="code" class="form-control-label">Code:</label>
              <input type="text"  class="form-control" id="code" name="code" value="">
            </div>
            <div class="form-group">
              <label for="mrp" class="form-control-label">Mrp:</label>
              <input type="text" class="form-control" id="mrp" name="mrp" value="">
            </div>
            <input type="hidden" name="idsku" id="idsku" value="">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success " onclick="updateSku();">Submit</button>
        </div>
      </div>
  </div>
</div>

</body>
<style type="text/css">
	.vertical-center {
  min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
  min-height: 100vh; /* These two lines are counted as one :-)       */

  display: flex;
  align-items: center;
}
</style>
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
	   	function addnew(){
	   	$('#updateModal').modal('show');
	   	}
	    function findSku(e){
	    	$.ajax({
			type:'POST',
			dataType:'json',
			url:'./billController.php',
			data:{data:e,action:'findByIdSku'},
			success:function(response){ 
				if(response.error){
				$('#alert').show().empty().append(response.error);
				// $('#alert').delay(3000).fadeOut('slow');
				}
				
				else{
					$('#updateModal').modal('show');
					$('#idsku').val(response.idsku);
					$('#code').val(response.code);
					$('#name-sku').val(response.name);
					$('#mrp').val(response.mrp);
				}
				
				
			}
		});
	    }
	    function updateSku(){
	    var datastring = $("#skuForm").serialize();
    	$.ajax({
			type:'POST',
			dataType:'json',
			url:'./billController.php',
			data:{data:datastring,action:'updateSku'},
			success:function(response){
				$('#updateModal').modal('hide');
				$('#listitem').load(location.href+' #listitem');
				$('#alert').show().empty().append(response);
				 $('#alert').delay(3000).fadeOut('slow');

				
				
			}
		});
	    }


</script>
</html>
