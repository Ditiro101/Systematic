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
	function updateQtyReceived($con,$orderid,$id,$qty)
	{
		$update_query="UPDATE ORDER_PRODUCT SET QUANTITY_RECEIVED=QUANTITY_RECEIVED+'$qty' WHERE ORDER_ID='$orderid' AND PRODUCT_ID='$id'";
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

	function updateQtyToReceive($con,$orderid,$id,$qty)
	{
		$update_query="UPDATE ORDER_PRODUCT SET QUANTITY_TO_RECEIVE='$qty' WHERE ORDER_ID='$orderid' AND PRODUCT_ID='$id'";
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

	function updateProductQty($con,$id,$qty)
	{
		$update_query="UPDATE PRODUCT SET QTY_ON_HAND=QTY_ON_HAND +'$qty',QUANTITY_AVAILABLE=QUANTITY_AVAILABLE+'$qty' WHERE PRODUCT_ID='$id'";
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

	function countReceivedQuantity($con,$orderid)
	{
		$get_query="SELECT SUM(QUANTITY_TO_RECEIVE) AS FINAL
			FROM ORDER_PRODUCT
			WHERE ORDER_ID='$orderid'";
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

	function updateOrderReceived($con,$orderid,$dte)
	{
		$update_query="UPDATE ORDER_ SET DATE_RECEIVED='$dte',ORDER_STATUS_ID=2 WHERE ORDER_ID='$orderid'";
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

?>