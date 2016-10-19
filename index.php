<?php
 require('config.php');	
$codelist=[];
$sql= "SELECT  * FROM invoice WHERE invoice_name ='invoice_no' ";
$row = $conn->query($sql)->fetchObject(); 
$tin="SELECT  * FROM invoice WHERE invoice_name ='tin' ";
$tin_result = $conn->query($tin)->fetchObject(); 

$codeName=	 "SELECT code FROM sku ";
 foreach ($conn->query($codeName) as $rows){
 	$codelist[]=$rows['code'];
 }
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
<div class="page-container">
<form novalidate="false" method="post" action="billController.php" id="invoice-form">
<input type="hidden" name="action" value="index">
	<div class="panel">
	 <div class="panel-heading">
	 	<div id="error" class="alert alert-danger row" style="display:none; padding: 6px;">
                <p class="col-sm-6" style="margin-top: 5px;"> At least one product add for invoice  </p>
       	</div>
		<span class="pull-left">Tin:<?=$tin_result->value;?></span>	
		<span class="pull-right">Mob:9928663963	</br>
		<span>Invoice No:<?php echo $row->value;?></span></span>
		<div class="clear" ></div>
		<div class="form-inline pull-right form-group ">
				<label  class="control-label" for="date">Date: </label>
				<input type="text" name="date" id="date" class="form-control" value="<?php echo date('d M,Y') ;?>">
				<input type="hidden" name="invoice_no"  value="<?php echo $row->value ;?>">

		</div>
		<div class="panel-title">
		<h1 class="text-center "><strong> Monarch Art and frames</strong></h1>
		<h3 class="text-center "><strong>P-2 AnandPuri M.D.Road Jaipur,302004</strong></h3>
		</div>
	</div>
	
	<div class="panel-body">
	<div class="row ">
	<div class="col-md-6">
		<div class="form-group  " >
			<label class="control-label "  for="name">Name: </label>
			<input type="text" name="name" id="name" class="form-control " value="">
		</div>
		</div>
		<div class="col-md-6">

		<div class="form-group " >
			<label class="control-label "  for="mobile">Mob: </label>
			<input type="number" name="mobile" id="mobile" class="form-control " value="">
		</div>
		</div>
	</div>
	<div class="clear"></div>

	<div class="row ">
	<div class="col-md-12">
		<div class="form-group  " >
			<label class="control-label "  for="address">Address: </label>
			<textarea class="form-control" name="address" id="address" cols="3" rows="3"></textarea> 
		</div>
		</div>
	</div>
		<div class="clear"></div>
<hr>
	<div class="row">
	<div class="col-md-3">
	<div class="form-group " >
			<label class="control-label "  for="code">Code: </label>
			<select class="form-control" id="code" >
			<option value="">select a code</option>
			<?php 
			foreach ($codelist as $key => $value) {
				echo "<option value='".$value."'>".$value."</option>";
			}
			?>
				
			</select>
		</div>
		</div>
			<div class="col-md-3">

		<div class="form-group  " >
			<label class="control-label "  for="qty">Qty: </label>
			<input type="number" name="qty" id="qty" class="form-control " value="1">
		</div>
		</div>
			<div class="col-md-3">

		<div class="form-group " >
			<label class="control-label "  for="price">Price: </label>
			<input type="text" name="price" id="price" class="form-control " value="">
		</div>
		</div>
		<div class=" col-md-3 text-right " style="margin-top:27px;">
		<button type="button" class="btn btn-primary legitRipple adddetails">add details  <i class="icon-arrow-right14 position-right"></i></button></div>
	</div>
	<div class="clear"></div>
	 <div class="form-group field-product-codes">
                <div class="col-lg-12" id="listitem">
                    <table class="table table-bordered deal_table">


                        <thead>
                        <th >Product</th>
                        <th >Price</th>
                        <th >Qty</th>
                        <th > Total Price </th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>

	<div class="text-right">
		<button type="button"  id="action" class="btn btn-primary legitRipple">Submit form </button>
		<a href="settings.php" type="btton" class="btn btn-primary legitRipple pull-left" id="invoice">change Config</a></div>
</div>
</div>

</form>
</div>
</body>
<script type="text/javascript">


       $('.adddetails').on('click', function(){
            var code = $('#code').val();
            var price=$('#price').val();
            var qty=$('#qty').val();
            if(code != ''){
            $('#'+code).remove();
                var total_count = $('.deal_table tbody tr').length;

                var tr = '<tr class=\"add_code\" id=\"'+code+'\"><td>' +  '<input type=\"text\" name=\"orderitem['+total_count+'][sku]\" value= \"'+code+'\"></td><td><input type=\"text\" name=\"orderitem['+total_count+'][price]\" value= \"'+price+'\"></td><td><input type=\"text\" name=\"orderitem['+total_count+'][qty]\" value= \"'+qty+'\"></td><td><input type=\"text\" name=\"orderitem['+total_count+'][tprice]\" value= \"'+(qty*price)+'\"  ></td>' 
                    + '<td><div class=\"box-tools\"><button aria-hidden=\"true\" onclick=\"removeSkurow(this)\" class=\"close remRow\" type=\"button\">X</button></div></td>';
                                 html = $(tr);
                    html.find('input').each(function(){
                  $(this).attr('name',$(this).attr('name').replace('count',total_count));
               });
             
               $('.deal_table tbody').append(html);
               $('#qty').val('1');
                $('#price').val('');
                $('#code').val('');

            }
		

		});
          
      
        $('#action').on('click',function(){
          var table = $('.deal_table');
        if(table.find('tbody').children().length > 0){
        $( '#invoice-form' ).submit();
        }else{
        $('#error').find('p').empty().append('At least one product add for invoice ! ');
        $('#error').show();
        $('#error').delay(3000).fadeOut('slow');

        }
        });
      
      $('#invoice').on('click',function(){
      	$.ajax({
			type:'POST',
			dataType:'json',
			url:'./billController.php',
			data:{action:'makePdf'},
			success:function(response){
				alert(response);
			}
		});
      })

      $("#code").on('change',function(){
      	var code = $('#code').val();
      	$.ajax({
			type:'POST',
			dataType:'json',
			url:'./billController.php',
			data:{code:code,action:'getprice'},
			success:function(response){
				$('#price').val(response);
			}
		});
      });
       
function removeSkurow(e){
	 $(e).closest('tr').remove();
}
	
</script>
</html>