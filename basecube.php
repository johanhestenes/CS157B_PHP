<?php
	print("<h2>Base Cube</h2><br>");
	$home = "index.php";
	echo "<a href='". $home ."'>Home</a><br><br>";

	function getCube()
	{
		include 'DBconstants.php';
	
		$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);
		$query = "SELECT product.description, promotion.promotion_name, store.name, time.date, SUM(salesfact.unit_sales), ROUND(SUM(salesfact.dollar_sales), 2) FROM product, promotion, store, time, salesfact WHERE product.product_key = salesfact.product_key AND promotion.promotion_key = salesfact.promotion_key AND store.store_key = salesfact.store_key AND time.time_key = salesfact.time_key GROUP BY product.description;";
		if ($con->connect_error) 
		{
			die("Connection failed: " . $con->connect_error);
		} 
		$result = mysqli_query($con, $query);
		$resultArray = array();
		while ($row = mysqli_fetch_array($result,MYSQLI_NUM)) 
		{
			array_push($resultArray, $row);
		}
		
		return $resultArray;
	}
	
	print("<table border=1>");
	print("<tr>");
	print("<th>Product Description</th>");
	print("<th>Promotion Name</th>");
	print("<th>Store Name</th>");
	print("<th>Date</th>");
	print("<th>Units Sold</th>");
	print("<th>Dollar Sales</th>");
	print("</tr>");
	
	$output = getCube();	
			
	for ($x = 0; $x < sizeof($output); $x++)
	{
		print("<tr>");
		print("<td>{$output[$x][0]}</td>");
		print("<td>{$output[$x][1]}</td>");
		print("<td>{$output[$x][2]}</td>");
		print("<td>{$output[$x][3]}</td>");
		print("<td>{$output[$x][4]}</td>");
		print("<td>{$output[$x][5]}</td>");
		print("</tr>");
	}
	print("</table>");
?>