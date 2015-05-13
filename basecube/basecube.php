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
			product.*, promotion.*, store.*, time.*, SUM(salesfact.unit_sales), ROUND(SUM(salesfact.dollar_sales), 2), ROUND(SUM(salesfact.dollar_cost), 2), SUM(salesfact.customer_count)
		FROM 
			product, promotion, store, time, salesfact 
		WHERE 
			product.product_key = salesfact.product_key AND promotion.promotion_key = salesfact.promotion_key AND store.store_key = salesfact.store_key AND time.time_key = salesfact.time_key 
		GROUP BY 
			product.description, promotion.promotion_name, store.name, time.date;";
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
	print("<th>Store Key</th>");
	print("<th>Name</th>");
	print("<th>Store Number</th>");
	print("<th>Store Street Address</th>");
	print("<th>City</th>");
	print("<th>Store County</th>");
	print("<th>Store State</th>");
	print("<th>Store Zip</th>");
	print("<th>Sales District</th>");
	print("<th>Sales Region</th>");
	print("<th>Store Manager</th>");
	print("<th>Store Phone</th>");
	print("<th>Store Fax</th>");
	print("<th>Floor Plan Type</th>");
	print("<th>Photo Processing Type</th>");
	print("<th>Finance Services Type</th>");
	print("<th>First Opened Date</th>");
	print("<th>Last Remodel Date</th>");
	print("<th>Store SQFT</th>");
	print("<th>Grocery SQFT</th>");
	print("<th>Frozen SQFT</th>");
	print("<th>Meat SQFT</th>");
	print("<th>Time Key</th>");
	print("<th>Date</th>");
	print("<th>Day of Week</th>");
	print("<th>Day Number in Month</th>");
	print("<th>Day Number Overall</th>");
	print("<th>Week Number in Year</th>");
	print("<th>Week Number Overall</th>");
	print("<th>Month</th>");
	print("<th>Quarter</th>");
	print("<th>Fiscal Period</th>");
	print("<th>Year</th>");
	print("<th>Holiday Flag</th>");
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
		print("<td>{$output[$x][34]}</td>");
		print("<td>{$output[$x][35]}</td>");
		print("<td>{$output[$x][36]}</td>");
		print("<td>{$output[$x][37]}</td>");
		print("<td>{$output[$x][38]}</td>");
		print("<td>{$output[$x][39]}</td>");
		print("<td>{$output[$x][40]}</td>");
		print("<td>{$output[$x][41]}</td>");
		print("<td>{$output[$x][42]}</td>");
		print("<td>{$output[$x][43]}</td>");
		print("<td>{$output[$x][44]}</td>");
		print("<td>{$output[$x][45]}</td>");
		print("<td>{$output[$x][46]}</td>");
		print("<td>{$output[$x][47]}</td>");
		print("<td>{$output[$x][48]}</td>");
		print("<td>{$output[$x][49]}</td>");
		print("<td>{$output[$x][50]}</td>");
		print("<td>{$output[$x][51]}</td>");
		print("<td>{$output[$x][52]}</td>");
		print("<td>{$output[$x][53]}</td>");
		print("<td>{$output[$x][54]}</td>");
		print("<td>{$output[$x][55]}</td>");
		print("<td>{$output[$x][56]}</td>");
		print("<td>{$output[$x][57]}</td>");
		print("<td>{$output[$x][58]}</td>");
		print("<td>{$output[$x][59]}</td>");
		print("<td>{$output[$x][60]}</td>");
		print("<td>{$output[$x][61]}</td>");
		print("<td>{$output[$x][62]}</td>");
		print("<td>{$output[$x][63]}</td>");
		print("<td>{$output[$x][64]}</td>");
		print("<td>{$output[$x][65]}</td>");
		print("<td>{$output[$x][66]}</td>");
		print("<td>{$output[$x][67]}</td>");
		print("</tr>");
	}
	print("</table>");
?>