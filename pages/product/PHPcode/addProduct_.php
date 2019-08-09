<?php

  	$productName = "";
	$productDescription = "";
	$productType = "";
	$unitsInCase = "";
	$casesInPallet = "";
	$costPrice = "";
	$discountPrice = "";
	$sellingPrice = "";
	$measurement = "";
	$measurementUnit = "";

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
	  	$response = "databaseError";
      	echo $response;
      	die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	else
	{
		// Retrieve product details from $_POST
		$productName = mysqli_real_escape_string($DBConnect, $_POST['productName_']);
		$productDescription  = mysqli_real_escape_string($DBConnect, $_POST['productDescription_']);
		$productType  = mysqli_real_escape_string($DBConnect, $_POST['productType_']);
		$unitsInCase  = mysqli_real_escape_string($DBConnect, $_POST['unitsInCase_']);
		$casesInPallet  = mysqli_real_escape_string($DBConnect, $_POST['casesInPallet_']);
		$costPrice  = mysqli_real_escape_string($DBConnect, $_POST['costPrice_']);
		$discountPrice  = mysqli_real_escape_string($DBConnect, $_POST['discountPrice_']);
		$sellingPrice  = mysqli_real_escape_string($DBConnect, $_POST['sellingPrice_']);
		$measurement  = mysqli_real_escape_string($DBConnect, $_POST['measurement_']);
		$measurementUnit  = mysqli_real_escape_string($DBConnect, $_POST['measurementUnit_']);


      	$lastIDQuery = "SELECT PRODUCT_ID FROM PRODUCT ORDER BY PRODUCT_ID DESC LIMIT 1";        
	    $lastIDQueryResult = mysqli_query($DBConnect, $lastIDQuery);
	    $lastID = mysqli_fetch_array($lastIDQueryResult)[0];
	    $nextProductID = $lastID + 1;
;

		//Add product to database
		$queryIndividual = "INSERT INTO PRODUCT(NAME, PRODUCT_DESCR, QTY_ON_HAND, CASES_PER_PALLET, UNITS_PER_CASE, COST_PRICE, GUIDE_DISCOUNT, SELLING_PRICE, QUANTITY_AVAILABLE, PRODUCT_TYPE_ID, PRODUCT_SIZE_TYPE, PRODUCT_MEASUREMENT, PRODUCT_MEASUREMENT_UNIT, PRODUCT_GROUP_ID) 
                  VALUES( '$productName', '$productDescription',0 , '$casesInPallet', '$unitsInCase', '$costPrice', '$discountPrice', '$sellingPrice', 0, '$productType', 1, '$measurement', '$measurementUnit', $nextProductID)";
      	mysqli_query($DBConnect, $queryIndividual);

      	$queryCase = "INSERT INTO PRODUCT(NAME, PRODUCT_DESCR, QTY_ON_HAND, CASES_PER_PALLET, UNITS_PER_CASE, COST_PRICE, GUIDE_DISCOUNT, SELLING_PRICE, QUANTITY_AVAILABLE, PRODUCT_TYPE_ID, PRODUCT_SIZE_TYPE, PRODUCT_MEASUREMENT, PRODUCT_MEASUREMENT_UNIT, PRODUCT_GROUP_ID) 
                  VALUES( '$productName', '$productDescription',0 , '$casesInPallet', '$unitsInCase', '$costPrice', '$discountPrice', '$sellingPrice', 0, '$productType', 2, '$measurement', '$measurementUnit', $nextProductID)";
      	mysqli_query($DBConnect, $queryCase);

      	$queryPallet = "INSERT INTO PRODUCT(NAME, PRODUCT_DESCR, QTY_ON_HAND, CASES_PER_PALLET, UNITS_PER_CASE, COST_PRICE, GUIDE_DISCOUNT, SELLING_PRICE, QUANTITY_AVAILABLE, PRODUCT_TYPE_ID, PRODUCT_SIZE_TYPE, PRODUCT_MEASUREMENT, PRODUCT_MEASUREMENT_UNIT, PRODUCT_GROUP_ID) 
                  VALUES( '$productName', '$productDescription',0 , '$casesInPallet', '$unitsInCase', '$costPrice', '$discountPrice', '$sellingPrice', 0, '$productType', 3, '$measurement', '$measurementUnit', $nextProductID)";
      	mysqli_query($DBConnect, $queryPallet);

      	//Close database connection
		mysqli_close($DBConnect);

		//Send success response
		$response = "success";
      	echo $response;
	}
?>