<?php
	include_once("connection.php");
	include_once("functions.php");
	if(reduceWarehouseProductQty($con,$_POST["WAREHOUSE_ID"],$_POST["PRODUCT_ID"],$_POST["QUANTITY"]))
	{
		if(updateProductQtyWriteoff($con,$_POST["PRODUCT_ID"],$_POST["QUANTITY"]))
		{
			if(checkWarehouseProduct($con,$_POST["WAREHOUSE_ID"],$_POST["CPRODUCT_ID"]))
			{
				if(updateWarehouseProductQty($con,$_POST["WAREHOUSE_ID"],$_POST["CPRODUCT_ID"],$_POST["CONVERTQTY"]))
				{
					if(updateProductQty($con,$_POST["CPRODUCT_ID"],$_POST["CONVERTQTY"]))
					{
						echo "T,Stock Converted Successfully!";
					}
					else
					{
						echo "F,Convert Prouct not updated";
					}
					
				}
				else
				{
					echo "F,Did not update convert product quantity";
				}
			}
			else
			{
				if(addWarehouseProduct($con,$_POST["WAREHOUSE_ID"],$_POST["CPRODUCT_ID"],$_POST["CONVERTQTY"]))
				{
					if(updateProductQty($con,$_POST["CPRODUCT_ID"],$_POST["CONVERTQTY"]))
					{
						echo "T,Stock Converted Successfully!";
					}
					else
					{
						echo "F,Add Convert Prouct not updated";
					}
				}
				else
				{
					echo "F,Convert product not added";
				}
			}
		}
		else
		{
			echo "F, Product Not Updated";
		}
	}
	else
	{
		echo "F,Warehouse Product Not Updated";
	}
	mysqli_close($con);
?>