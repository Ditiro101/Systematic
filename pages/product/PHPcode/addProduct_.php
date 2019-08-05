<?php

  	$productName = "";
	$productDescription = "";
	$productType = "";
	$unitsInCase = "";
	$casesInPallet = "";
	$costPrice = "";
	$discountPrice = "";
	$sellingPrice = "";


  	$productName = mysqli_real_escape_string($DBConnect, $_POST['productName_']);
	$productDescription  = mysqli_real_escape_string($DBConnect, $_POST['productDescription_']);
	$productType  = mysqli_real_escape_string($DBConnect, $_POST['productType_']);
	$unitsInCase  = mysqli_real_escape_string($DBConnect, $_POST['unitsInCase_']);
	$casesInPallet  = mysqli_real_escape_string($DBConnect, $_POST['casesInPallet_']);
	$costPrice  = mysqli_real_escape_string($DBConnect, $_POST['costPrice_']);
	$discountPrice  = mysqli_real_escape_string($DBConnect, $_POST['discountPrice_']);
	$sellingPrice  = mysqli_real_escape_string($DBConnect, $_POST['sellingPrice_']);
?>