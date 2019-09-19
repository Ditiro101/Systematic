<?php
	include_once("connection.php");
	include_once("functions.php");
	$currentDate=date("Y-m-d");
	$assignment=(array) json_decode($_POST["assignment"]);
	$stopCount=$_POST["num"]-1;
	for ($i=0; $i<$_POST["num"]; $i++) { 
		updateDeliveryFinalQty($con,$assignment[0]->SALE_ID,$_POST["productIDs"][$i],$_POST["productQty"][$i]);
	}
	// var_dump($_POST["productIDs"]);
	generateImage($_POST["image"],$assignment[0]->SALE_ID);
	$deliveryDifference=getDeliveryDifference($con,$assignment[0]->SALE_ID);
	if($deliveryDifference[0]["FINAL"]==0)
	{
		if(updateDeliveryStatus($con,$assignment[0]->SALE_ID,5))
		{
			if(updateDeliveredDate($con,$assignment[0]->SALE_ID,$currentDate))
			{
				if(updateDeliveryTruckStatus($con,$assignment[0]->SALE_ID,$assignment[0]->TRUCK_ID,5))
				{
					echo "done";
				}

			}
			else
			{
				echo "Date not updated";
			}
			
		}
		else
		{
			echo "Fail";
		}
		
	}
	else
	{
		if(updateDeliveryTruckStatus($con,$assignment[0]->SALE_ID,$assignment[0]->TRUCK_ID,5))
		{
			echo "done";
		}
	}
?>