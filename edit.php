<?php
	require_once("db.php");
	

	if (isset($_POST['submit'])) {		
		$sql = $conn->prepare("UPDATE details SET order_customer=? , quantity_order=? , price_order=?  WHERE id=?");
		$order=$_POST['order'];
		$quantity = $_POST['quantity'];
		$price= $_POST['price'];
		$sql->bind_param("sssi",$order, $quantity, $price,$_GET["id"]);	
		if($sql->execute()) {
			$success_message = "Edited Successfully";
			header("location: success.php");
			
		} else {
			$error_message = "Problem in Editing Record";
		}

	}


	$sql = $conn->prepare("SELECT * FROM details WHERE id=?");
	$sql->bind_param("i",$_GET["id"]);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {		
		$row = $result->fetch_assoc();
	}
	
	
	$conn->close();
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<style>
.tbl-qa{border-spacing:0px;border-radius:4px;border:#6ab5b9 1px solid;}
</style>
<title>Customer order edit </title>
</head>
<body>
<?php if(!empty($success_message)) { ?>
<div class="success message"><?php echo $success_message; ?></div>
<?php } if(!empty($error_message)) { ?>
<div class="error message"><?php echo $error_message; ?></div>
<?php } ?>
<form name="frmUser" method="post" action="">
<div class="button_link"><a href="index.php" >Back to List </a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
	<thead>
		<tr>
			<th colspan="2" class="table-header">Customer Order Edit</th>
		</tr>
	</thead>
	<tbody>
	<tr class="table-row">
			<td><label>Order Name</label></td>
			<td><input type="text" name="order" class="txtField"required/></td>
		</tr>
		<tr class="table-row">
			<td><label>Quantity</label></td>
			<td><input type="text" name="quantity" class="txtField"required/></td>
		</tr>
		<tr class="table-row">
			<td><label>Price</label></td>
			<td><input type="text" name="price" class="txtField"required/></td>
		</tr>
		<tr class="table-row">
			<td colspan="2"><input type="submit" name="submit" value="Submit" class="demo-form-submit"></td>
		</tr>
	</tbody>	
</table>
</form>
</body>
</html>