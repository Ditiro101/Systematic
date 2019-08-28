<?php

	$customerID = "";
	$userID = "";
	$saleProducts = Array();

	$url ='mysql://lf7jfljy0s7gycls:qzzxe2oaj0zj8q5a@u0zbt18wwjva9e0v.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/c0t1o13yl3wxe2h3';

	$dbparts = parse_url($url);

	$hostname = $dbparts['host'];
	$username = $dbparts['user'];
	$password = $dbparts['pass'];
	$database = ltrim($dbparts['path'],'/');

	$DBConnect = mysqli_connect($hostname, $username, $password, $database);

	if($DBConnect === false)
	{
	//Send error response
	  $response = "database Error";
	  echo $response;
	}
	else
	{
		// Retrieve product details from $_POST
		$customerID = mysqli_real_escape_string($DBConnect, $_POST['customerID']);
		$userID = mysqli_real_escape_string($DBConnect, $_POST['saleUserID']);
		$saleProducts  = $_POST['saleProducts'];

		$saleTotal = 0.00;
		$arraySize = sizeof($saleProducts);
		for ($i=0; $i < $arraySize; $i++) 
		{ 
			$lineTotal = (float)$saleProducts[$i]['SELLING_PRICE'] * (int)$saleProducts[$i]['QUANTITY'];
			$saleTotal += $lineTotal;
		}

		$query = "SELECT EMPLOYEE_ID FROM USER WHERE USER_ID = '$userID'";
		$result = mysqli_query( $DBConnect, $query);
		$employeeID = mysqli_fetch_array($result)['EMPLOYEE_ID'];

		$dateTimeNow = date('Y-m-d H:i:s');

		//Add product to database
		$querySale = "INSERT INTO SALE(USER_ID, EMPLOYEE_ID, CUSTOMER_ID, SALE_DATE, SALE_AMOUNT, SALE_STATUS_ID) VALUES( '$userID', '$employeeID', '$customerID', '$dateTimeNow', '$saleTotal', 1)";
		mysqli_query($DBConnect, $querySale);

		$lastIDQuery = "SELECT LAST_INSERT_ID();";        
		$lastIDQueryResult = mysqli_query($DBConnect, $lastIDQuery);
		$lastID = mysqli_fetch_array($lastIDQueryResult)[0];

		$arraySize = sizeof($saleProducts);
		for ($i=0; $i < $arraySize; $i++) 
		{ 
			$productLineProductID = mysqli_real_escape_string($DBConnect, $saleProducts[$i]['PRODUCT_ID']);
			$productLineSellingPrice = mysqli_real_escape_string($DBConnect, $saleProducts[$i]['SELLING_PRICE']);
			$productLineQuantity = mysqli_real_escape_string($DBConnect, $saleProducts[$i]['QUANTITY']);
			$querySaleProduct = "INSERT INTO SALE_PRODUCT(SALE_ID, PRODUCT_ID, SELLING_PRICE, QUANTITY) VALUES( '$lastID','$productLineProductID', '$productLineSellingPrice', '$productLineQuantity')";
			mysqli_query($DBConnect, $querySaleProduct);
		}

		//Close database connection
		mysqli_close($DBConnect);

		//Send success response
		$response = "success";
		echo $response;
	}
?>