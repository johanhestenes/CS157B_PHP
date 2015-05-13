<?php
	print("<h2>Base Cube</h2><br>");
	$home = "../index.php";
	echo "<a href='". $home ."'>Home</a><br><br>";

	function getCube()
	{
		include '../DBconstants.php';
	
		$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);
		$query = 
		"SELECT 
			product.*, promotion.*, SUM(salesfact.unit_sales), ROUND(SUM(salesfact.dollar_sales), 2), ROUND(SUM(salesfact.dollar_cost), 2), SUM(salesfact.customer_count)
		FROM 
			product, promotion, salesfact 
		WHERE 
			product.product_key = salesfact.product_key AND promotion.promotion_key = salesfact.promotion_key
		GROUP BY 
			product.description, promotion.promotion_name;";
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
	print("<th>Product Key</th>");
	print("<th>Description</th>");
	print("<th>Full Description</th>");
	print("<th>SKU Number</th>");
	print("<th>Package Size</th>");
	print("<th>Brand</th>");
	print("<th>Subcategory</th>");
	print("<th>Category</th>");
	print("<th>Department</th>");
	print("<th>Package Type</th>");
	print("<th>Diet Type</th>");
	print("<th>Weight</th>");
	print("<th>Weight Unit of Measure</th>");
	print("<th>Units Per Retail Case</th>");
	print("<th>Units Per Shipping Case</th>");
	print("<th>Cases Per Pallet</th>");
	print("<th>Shelf Width CM</th>");
	print("<th>Shelf Height CM</th>");
	print("<th>Shelf Depth CM</th>");
	print("<th>Promotion Key</th>");
	print("<th>Promotion Name</th>");
	print("<th>Price Reduction Type</th>");
	print("<th>Ad Type</th>");
	print("<th>Display Type</th>");
	print("<th>Coupon Type</th>");
	print("<th>Ad Media Type</th>");
	print("<th>Display Provider</th>");
	print("<th>Promo Cost</th>");
	print("<th>Promo Begin Date</th>");
	print("<th>Promo End Date</th>");
	print("<th>Units Sold</th>");
	print("<th>Dollar Sales</th>");
	print("<th>Dollar Cost</th>");
	print("<th>Customer Count</th>");
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
		print("<td>{$output[$x][6]}</td>");
		print("<td>{$output[$x][7]}</td>");
		print("<td>{$output[$x][8]}</td>");
		print("<td>{$output[$x][9]}</td>");
		print("<td>{$output[$x][10]}</td>");
		print("<td>{$output[$x][11]}</td>");
		print("<td>{$output[$x][12]}</td>");
		print("<td>{$output[$x][13]}</td>");
		print("<td>{$output[$x][14]}</td>");
		print("<td>{$output[$x][15]}</td>");
		print("<td>{$output[$x][16]}</td>");
		print("<td>{$output[$x][17]}</td>");
		print("<td>{$output[$x][18]}</td>");
		print("<td>{$output[$x][19]}</td>");
		print("<td>{$output[$x][20]}</td>");
		print("<td>{$output[$x][21]}</td>");
		print("<td>{$output[$x][22]}</td>");
		print("<td>{$output[$x][23]}</td>");
		print("<td>{$output[$x][24]}</td>");
		print("<td>{$output[$x][25]}</td>");
		print("<td>{$output[$x][26]}</td>");
		print("<td>{$output[$x][27]}</td>");
		print("<td>{$output[$x][28]}</td>");
		print("<td>{$output[$x][29]}</td>");
		print("<td>{$output[$x][30]}</td>");
		print("<td>{$output[$x][31]}</td>");
		print("<td>{$output[$x][32]}</td>");
		print("<td>{$output[$x][33]}</td>");
		print("</tr>");
	}
	print("</table>");
?>