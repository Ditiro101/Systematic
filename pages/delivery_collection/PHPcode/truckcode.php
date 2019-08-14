<?php
	include_once("connection.php");
	///////////////////////////////////
	function checkTruck($con,$reg)
	{
		$check_query="SELECT * FROM TRUCK WHERE REGISTRATION_NUMBER='$reg'";
		$check_result=mysqli_query($con,$check_query);
		if(mysqli_num_rows($check_result)>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/////////////////////////////////////////
	function getTruckID($con,$reg)
	{
		$get_query="SELECT * FROM TRUCK WHERE REGISTRATION_NUMBER='$reg'";
		$get_result=mysqli_query($con,$get_query);
		if(mysqli_num_rows($get_result)>0)
		{
			$row=$get_result->fetch_assoc();
			$truckID=$row["TRUCK_ID"];
		}
		else
		{
			$truckID="Truck ID does not exist";
		}
		return $truckID;
	}
	/////////////////////////////////////////////
	function addTruck($con,$reg,$tname,$tcap,$active)
	{
		$add_query="INSERT INTO TRUCK (REGISTRATION_NUMBER,TRUCK_NAME,CAPACITY,ACTIVE) VALUES('$reg','$tname','$tcap','$active')";
		$add_result=mysqli_query($con,$add_query);
		if($add_result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	///////////////////////////////////////////
	/////////////////////////////////////////////
	if($_POST["choice"]==1)
	{
		if(checkTruck($con,$_POST["registration"]))
		{
			echo "F,Truck Exists.";
		}
		else
		{
			if(addTruck($con,$_POST["registration"],$_POST["name"],$_POST["capacity"],1))
			{
				echo "T,Truck Added Successfully";
			}
			else
			{
				echo "F,Truck Not Added Successfully";
			}
		}
	}
	elseif($_POST["choice"]==2)
	{

	}
	elseif($_POST["choice"]==3)
	{

	}
	mysqli_close($con);
?>