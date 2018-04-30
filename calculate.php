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
				<th class="table-header" width="20%"> Order Name </th>
				<th class="table-header" width="20%"> Quantity </th>
				<th class="table-header" width="20%"> Price </th>
				<th class="table-header" width="20%" colspan="2">Action</th>
			  </tr>
		</thead>
		<tbody>		
			<?php
				if ($result->num_rows > 0) {		
					while($row = $result->fetch_assoc()) {
			?>
			<tr class="table-row" id="row-<?php echo $row["id"]; ?>"> 
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
    <?php

$hostname='localhost';
$username='root';
$password='';
$db='dbcustomer';

$con = mysqli_connect($hostname, $username, $password);
mysqli_select_db($con, $db);

$sql = "SELECT sum(price_order) AS price_sum FROM details";
$sql2 = "SELECT sum(quantity_order) AS quantity_sum FROM details";

$q = mysqli_query($con, $sql);
$q2 = mysqli_query($con, $sql2 );
$row = mysqli_fetch_array($q);   
$row2 = mysqli_fetch_array($q2);
                    

mysqli_close($con);

?>
			</br></br></br>
			<div class="button_link">
			<p align="left"><a href="calculate.php">Calculate Total :</a></p>
			<hr>
			<h1>Total : <?php echo $row[0]*$row2[0];?></h1>
            </div>
            <div class="button_link">
			<p><a href="index.php">Back :</a></p>
			</div>
			
			
	</form>
		
</body>
</html>
