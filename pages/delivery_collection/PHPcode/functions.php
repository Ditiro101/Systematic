<?php
	function getCustomerAddressIDs($con,$id)
	{
		$get_query="SELECT ADDRESS_ID FROM CUSTOMER_ADDRESS WHERE CUSTOMER_ID='$id'";
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

	function getAllAddresses($con)
	{
		$get_query="SELECT * FROM ADDRESS";
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

	function getAllSuburbs($con)
	{
		$get_query="SELECT * FROM SUBURB";
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

	function getAllCity($con)
	{
		$get_query="SELECT * FROM CITY";
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

	function addDelivery($con,$saleID,$date,$addressID,$dct,$lat,$long)
	{
		$add_query="INSERT INTO DELIVERY (SALE_ID,EXPECTED_DATE,ADDRESS_ID,LATITUDE,LONGITUDE,DCT_STATUS_ID) VALUES ('$saleID','$date','$addressID','$lat','$long','$dct')";
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

	function getAllDelivery($con)
	{
		$get_query="SELECT * FROM DELIVERY";
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

	function getAllCustomer($con)
	{
		$get_query="SELECT * FROM CUSTOMER";
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

	function getAllSales($con)
	{
		$get_query="SELECT * FROM SALE";
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


	function getAllSaleProducts($con)
	{
		$get_query="SELECT * FROM SALE_PRODUCT";
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

	function getSaleProductDetails($con,$id)
	{
		$get_query="SELECT * FROM SALE_PRODUCT WHERE SALE_ID='$id'";
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
	/////////////////////////////////////////////////////
	function getProductDetails($con)
	{
		$get_query="SELECT * FROM PRODUCT";
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

	function getAllEmployees($con)
	{
		$get_query="SELECT * FROM EMPLOYEE";
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

	function deleteDelivery($con,$id)
	{
		$delete_query="DELETE FROM DELIVERY WHERE DELIVERY_ID='$id'";
		$delete_result=mysqli_query($con,$delete_query);
		if($delete_result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function getAllTrucks($con)
	{
		$get_query="SELECT * FROM TRUCK";
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

	function getUnassignedDeliveries($con,$dct)
	{
		$get_query="SELECT * FROM DELIVERY WHERE DCT_STATUS_ID='$dct'";
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
	////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////
	function updateSaleProductAssignedQty($con,$saleid,$pID,$qty)
	{
		$update_query="UPDATE SALE_PRODUCT SET QUANTITY_ASSIGNED=QUANTITY_ASSIGNED-'$qty' WHERE SALE_ID='$saleid' AND PRODUCT_ID='$pID'";
		$update_result=mysqli_query($con,$update_query);
		if($update_result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/////////////////////////////////////////////////////////
	function countAssignment($con,$sID)
	{
		$count_query="SELECT SUM(`QUANTITY_ASSIGNED`) AS ASSIGNMENT FROM `SALE_PRODUCT` WHERE SALE_ID='$sID'";
		$count_result=mysqli_query($con,$count_query);
		// if(mysqli_num_rows($count_result)>0)
		// {
		// 	$row=$count_result->fetch_assoc();
		// 	$assignCount=$row["ASSIGNMENT"];
		// }
		// else
		// {
		// 	$assignCount=-1;
		// }
		// return $assignCount;
		$row=mysqli_fetch_object($count_result);
		return $row->ASSIGNMENT;
	}

	function updateDeliveryStatus($con,$sID,$dct)
	{
		$update_query="UPDATE DELIVERY SET DCT_STATUS_ID='$dct' WHERE SALE_ID='$sID'";
		$update_result=mysqli_query($con,$update_query);
		if($update_result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function checkAssignment($con,$truckid,$saleid)
	{
		$address_query="SELECT * FROM DELIVERY_TRUCK WHERE TRUCK_ID='$truckid' AND SALE_ID='$saleid'";
		$address_result=mysqli_query($con,$address_query);
		if(mysqli_num_rows($address_result)>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function getDeliveryTruckID($con,$truckid,$saleid)
	{
		$get_query="SELECT * FROM DELIVERY_TRUCK WHERE TRUCK_ID='$truckid' AND SALE_ID='$saleid'";
		$get_result=mysqli_query($con,$get_query);
		if(mysqli_num_rows($get_result)>0)
		{
			$row=$get_result->fetch_assoc();
			$cityID=$row["DELIVERY_TRUCK_ID"];
		}
		else
		{
			$cityID="City ID does not exist";
		}
		return $cityID;
	}

	function checkProductAssignment($con,$deliverytruckid,$saleid,$productid)
	{
		$address_query="SELECT * FROM TRUCK_PRODUCT WHERE DELIVERY_TRUCK_ID='$deliverytruckid' AND SALE_ID='$saleid' AND PRODUCT_ID='$productid'";
		$address_result=mysqli_query($con,$address_query);
		if(mysqli_num_rows($address_result)>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function insertAssignment($con,$deliveryid,$saleid,$truckid,$dct)
	{
		$add_query="INSERT INTO DELIVERY_TRUCK (DELIVERY_ID,SALE_ID,TRUCK_ID,DCT_STATUS_ID) VALUES ('$deliveryid','$saleid','$truckid','$dct')";
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

	function insertProductAssignment($con,$deliverytruckid,$saleid,$productid,$qty)
	{
		$add_query="INSERT INTO TRUCK_PRODUCT (DELIVERY_TRUCK_ID,SALE_ID,PRODUCT_ID,QUANTITY) VALUES ('$deliverytruckid','$saleid','$productid','$qty')";
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

	function updateProductAssignment($con,$deliverytruckid,$saleid,$productid,$qty)
	{
		$update_query="UPDATE TRUCK_PRODUCT SET QUANTITY=QUANTITY+'$qty' WHERE SALE_ID='$saleid' AND PRODUCT_ID='$productid' AND DELIVERY_TRUCK_ID='$deliverytruckid'";
		$update_result=mysqli_query($con,$update_query);
		if($update_result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function getTruckProductData($con)
	{
		$get_query="SELECT * FROM TRUCK_PRODUCT";
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

	function getDeliveryTruckData($con)
	{
		$get_query="SELECT * FROM DELIVERY_TRUCK";
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

	function getCompleteAddress($con)
	{
		$get_query="SELECT A.ADDRESS_ID,B.ADDRESS_LINE_1,C.NAME,C.ZIPCODE,D.CITY_NAME
			FROM DELIVERY A
			JOIN ADDRESS B ON A.ADDRESS_ID=B.ADDRESS_ID
			JOIN SUBURB C ON B.SUBURB_ID=C.SUBURB_ID
			JOIN CITY D ON C.CITY_ID=D.CITY_ID
			WHERE DCT_STATUS_ID=1";
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

	function getSalesCustomer($con)
	{
		$get_query="SELECT A.SALE_ID,B.CUSTOMER_ID,C.NAME,C.SURNAME
			FROM DELIVERY A
			JOIN SALE B ON A.SALE_ID=B.SALE_ID
			JOIN CUSTOMER C ON B.CUSTOMER_ID=C.CUSTOMER_ID
			WHERE DCT_STATUS_ID=1";
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

	function getCompleteCustomerAddresses($con,$id)
	{
		$get_query="SELECT A.ADDRESS_ID,B.ADDRESS_LINE_1,C.NAME,C.ZIPCODE,D.CITY_NAME
			FROM CUSTOMER_ADDRESS A
			JOIN ADDRESS B ON A.ADDRESS_ID=B.ADDRESS_ID
			JOIN SUBURB C ON B.SUBURB_ID=C.SUBURB_ID
			JOIN CITY D ON C.CITY_ID=D.CITY_ID
			WHERE CUSTOMER_ID='$id'";
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

?>