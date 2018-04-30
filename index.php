<?php 
require_once("db.php");

$sql = "SELECT * FROM details";
$result = $conn->query($sql);	
$conn->close();		
?>
<html>
<head>
	<link href="style.css" rel="stylesheet" type="text/css" />
	<title>Customer Order Details</title>
</head>
<body>
	
	<form name="homefrm" id="homefrm">
	<div class="button_link">
		<h2>Customer Order Details</h2>
		<a href="add.php">Add New Customer Order</a>
	</div>
	<table class="tbl-qa">	
		<thead>
			 <tr>
			    <th class="table-header" width="20%"> Order Number </th>		
				<th class="table-header" width="20%"> Order Name </th>
				<th class="table-header" width="20%"> Quantity </th>
				<th class="table-header" width="20%"> Price </th>
				<th class="table-header" width="20%"> Amount </th>
				<th class="table-header" width="20%" colspan="2">Action</th>
			  </tr>
		</thead>
		<tbody>		
			<?php
				if ($result->num_rows > 0) {		
					while($row = $result->fetch_assoc()) {
			?>
			<tr class="table-row" id="row-<?php echo $row["id"]; ?>"> 
			    <td class="table-row"><?php echo $row["id"]; ?></td>
				<td class="table-row"><?php echo $row["order_customer"]; ?></td>
				<td class="table-row"><?php echo $row["quantity_order"]; ?></td>
				<td class="table-row"><?php echo $row["price_order"]; ?></td>
				<!-- action -->
				<td class="table-row" colspan="2"><a href="edit.php?id=<?php echo $row["id"]; ?>" class="link"><img title="Edit" src="icon/edit.png"/></a> <a href="delete.php?id=<?php echo $row["id"]; ?>" class="link"><img name="delete" id="delete" title="Delete" onclick="return confirm('Are you sure you want to delete?')" src="icon/delete.png"/></a></td>
			</tr>
			<?php
					}
				}
			?>
		</tbody>
	</table>
			</br></br></br>
			<div class="button_link">
			<p align="left"><a href="calculate.php">Calculate Total :</a></p>
			<hr>
			
			</div>
			
	</form>
	
		
</body>
</html>