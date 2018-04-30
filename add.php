<?php
	if (isset($_POST['submit'])) {
		require_once("db.php");
		$sql = $conn->prepare("INSERT INTO details (order_customer, quantity_order, price_order) VALUES ( ?, ?, ?)");  
		
		
		$order=$_POST['order'];
		$quantity = $_POST['quantity'];
		$price= $_POST['price'];
		
		$sql->bind_param("sss", $order, $quantity, $price); 
		if($sql->execute()) {
			$success_message = "Added Successfully";
		} else {
			$error_message = "Problem in Adding New Record";
		}
		$sql->close();   
		$conn->close();
	} 
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
	
<style>
.tbl-qa{border-spacing:0px;border-radius:4px;border:#6ab5b9 1px solid;}
</style>
  <title>Add New Customer Order</title> 	
</head>
<body>
<?php if(!empty($success_message)) { ?>
<div class="success message"><?php echo $success_message; ?></div>
<?php } if(!empty($error_message)) { ?>
<div class="error message"><?php echo $error_message; ?></div>
<?php } ?>
<form name="frmUser" method="post" action="">
<div class="button_link"><a href="index.php"> Back to List </a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
	<thead>
		<tr>
			<th colspan="2" class="table-header">Add New Customer Order</th>
		</tr>
	</thead>
	<tbody>

		<tr class="table-row">
			<td><label>Order Name</label></td>
			<td><input type="text" name="order" class="txtField"></td>
		</tr>
		<tr class="table-row">
			<td><label>Quantity</label></td>
			<td><input type="text" name="quantity" class="txtField"></td>
		</tr>
		<tr class="table-row">
			<td><label>Price</label></td>
			<td><input type="text" name="price" class="txtField"></td>
		</tr>
		<tr class="table-row">
			<td colspan="2"><input type="submit" name="submit" value="Submit" class="demo-form-submit"></td>
		</tr>
	</tbody>
</table>
</form>
</body>
</html>