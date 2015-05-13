<?php
	print("<h2>Store</h2><br>");
	$home = "../index.php";
	echo "<a href='". $home ."'>Home</a><br><br>";

	function getStore()
	{
		include '../DBconstants.php';
	
		$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);
		$query = 
		"SELECT 
			store.*, SUM(salesfact.unit_sales), ROUND(SUM(salesfact.dollar_sales), 2), ROUND(SUM(salesfact.dollar_cost), 2), SUM(salesfact.customer_count)
		FROM 
			store, salesfact 
		WHERE 
			store.store_key = salesfact.store_key 
		GROUP BY 
			store.name;";
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
	print("<th>Units Sold</th>");
	print("<th>Dollar Sales</th>");
	print("<th>Dollar Cost</th>");
	print("<th>Customer Count</th>");
	print("</tr>");
	
	$output = getStore();	
			
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
		print("</tr>");
	}
	print("</table>");
?>