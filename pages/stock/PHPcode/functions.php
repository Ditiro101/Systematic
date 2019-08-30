<?php
	function getWarehouseDetails($con)
	{
		$get_query="SELECT * FROM WAREHOUSE";
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
	////////////////////////////////////
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
	////////////////////////////////////////////
	function getWarehouseProductDetails($con)
	{
		$get_query="SELECT * FROM WAREHOUSE_PRODUCT";
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
	////////////////////////////////////////////////////
	function updateWarehouseProductQty($con,$wID,$pID,$qty)
	{
		$update_query="UPDATE WAREHOUSE_PRODUCT SET QUANTITY=QUANTITY+'$qty' WHERE WAREHOUSE_ID='$wID' AND PRODUCT_ID='$pID'";
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
	//////////////////////////////////////////////////
	function reduceWarehouseProductQty($con,$wID,$pID,$qty)
	{
		$update_query="UPDATE WAREHOUSE_PRODUCT SET QUANTITY=QUANTITY-'$qty' WHERE WAREHOUSE_ID='$wID' AND PRODUCT_ID='$pID'";
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
	///////////////////////////////////////////////////
	function checkWarehouseProduct($con,$wID,$pID)
	{
		$check_query="SELECT * FROM WAREHOUSE_PRODUCT WHERE WAREHOUSE_ID='$wID' AND PRODUCT_ID='$pID'";
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
	//////////////////////////////////////////////////
	function addWarehouseProduct($con,$wID,$pID,$qty)
	{
		$add_query="INSERT INTO WAREHOUSE_PRODUCT (WAREHOUSE_ID,PRODUCT_ID,QUANTITY) VALUES('$wID','$pID','$qty')";
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
	//////////////////////////////////////////////////////

?>