<?php
	print("<h2>Promotion</h2><br>");
	$home = "index.php";
	echo "<a href='". $home ."'>Home</a><br><br>";

	function getPromotion()
	{
		include 'DBconstants.php';
	
		$con = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASENAME);
		$query = "select * from promotion;";
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
	print("</tr>");
	
	$output = getPromotion();	
			
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
		print("</tr>");
	}
	print("</table>");
?>