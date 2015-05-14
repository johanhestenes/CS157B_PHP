<?php
	print("<h2>Product</h2><br>");
	$home = "../index.php";
	$drilldown = "subcategory.php";
	$rollup = "department.php";
	
	echo "<a href='". $home ."'>Home</a><br><br>";
	echo "<a href='". $drilldown ."'>Drill Down</a>&nbsp&nbsp&nbsp&nbsp&nbsp<a href='". $rollup ."'>Roll Up</a><br><br>";

	function getProduct()
	{
		include '../DBconstants.php';
	
		$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);
		$query = 
		"SELECT 
			product.category, SUM(salesfact.unit_sales), ROUND(SUM(salesfact.dollar_sales), 2), ROUND(SUM(salesfact.dollar_cost), 2), SUM(salesfact.customer_count)
		FROM 
			product, salesfact 
		WHERE 
			product.product_key = salesfact.product_key 
		GROUP BY 
			product.category;";
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
	print("<th>Category</th>");
	print("<th>Units Sold</th>");
	print("<th>Dollar Sales</th>");
	print("<th>Dollar Cost</th>");
	print("<th>Customer Count</th>");
	print("</tr>");
	
	$output = getProduct();	
			
	for ($x = 0; $x < sizeof($output); $x++)
	{
		print("<tr>");
		print("<td>{$output[$x][0]}</td>");
		print("<td>{$output[$x][1]}</td>");
		print("<td>{$output[$x][2]}</td>");
		print("<td>{$output[$x][3]}</td>");
		print("<td>{$output[$x][4]}</td>");
		print("</tr>");
	}
	print("</table>");
?>