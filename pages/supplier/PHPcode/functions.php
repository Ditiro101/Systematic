<?php
	function getSupplierAddressIDs($con,$supID)
	{
		$get_query="SELECT ADDRESS_ID FROM SUPPLIER_ADDRESS WHERE SUPPLIER_ID='$supID'";
		$get_result=mysqli_query($con,$get_query);
		if(mysqli_num_rows($get_result)>0)
		{
			while($get_row=$get_result->fetch_assoc())
			{
				$get_vals[]=$get_row;
			}
			return $get_vals;
		}
		else
		{
			return false;
		}
	}
	function getAddressInfo($con,$addID)
	{
		$get_query="SELECT * FROM ADDRESS WHERE ADDRESS_ID='$addID'";
		$get_result=mysqli_query($con,$get_query);
		if(mysqli_num_rows($get_result)>0)
		{
			$row=$get_result->fetch_assoc();
			$addressInfo=$row;
		}
		else
		{
			$addressInfo="Address does not exist";
		}
		return $addressInfo;
	}

	function getSuburbInfo($con,$subID)
	{
		$get_query="SELECT * FROM SUBURB WHERE SUBURB_ID='$subID'";
		$get_result=mysqli_query($con,$get_query);
		if(mysqli_num_rows($get_result)>0)
		{
			$row=$get_result->fetch_assoc();
			$suburbInfo=$row;
		}
		else
		{
			$suburbInfo="Address does not exist";
		}
		return $suburbInfo;
	}

	function getCityInfo($con,$cityID)
	{
		$get_query="SELECT * FROM CITY WHERE CITY_ID='$cityID'";
		$get_result=mysqli_query($con,$get_query);
		if(mysqli_num_rows($get_result)>0)
		{
			$row=$get_result->fetch_assoc();
			$cityInfo=$row;
		}
		else
		{
			$cityInfo="Address does not exist";
		}
		return $cityInfo;
	}
	//echo str_replace(" ","/",$addName);
?>