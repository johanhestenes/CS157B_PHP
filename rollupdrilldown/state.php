<?php
	print("<h2>Store</h2><br>");
	$home = "../index.php";
	$drilldown = "county.php";
	$rollup = "region.php";
	
	echo "<a href='". $home ."'>Home</a><br><br>";
	echo "<a href='". $drilldown ."'>Drill Down</a>&nbsp&nbsp&nbsp&nbsp&nbsp<a href='". $rollup ."'>Roll Up</a><br><br>";

	function getStore()
	{
		include '../DBconstants.php';
	
		$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);
		$query = 
		"SELECT 
			store.store_state, SUM(salesfact.unit_sales), ROUND(SUM(salesfact.dollar_sales), 2), ROUND(SUM(salesfact.dollar_cost), 2), SUM(salesfact.customer_count)
		FROM 
			store, salesfact 
		WHERE 
			store.store_key = salesfact.store_key 
		GROUP BY 
			store.store_state;";
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
	print("<th>State</th>");
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
		print("</tr>");
	}
	print("</table>");
?>