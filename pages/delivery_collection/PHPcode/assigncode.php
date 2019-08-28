<?php
	include_once("connection.php");
	include_once("functions.php");
	if($_POST["choice"]==1)
	{
		$stopCount=$_POST["num"]-1;
		for ($i=0; $i <$_POST["num"] ; $i++) { 
			if(updateSaleProductAssignedQty($con,$_POST["SALE_ID"],$_POST["PRODUCT_ID"][$i],$_POST["QTY"][$i]))
			{
				if($i==$stopCount)
				{
					
					$assignCount=countAssignment($con,$_POST["SALE_ID"]);
					if($assignCount==0)
					{
						if(updateDeliveryStatus($con,$_POST["SALE_ID"],2))
						{
							echo "TT";
						}
						else
						{
							echo "TF";
						}
					}
					else
					{
						echo "T";
					}
				}
			}
			else
			{
				echo "F".$i;
			}
		}
		
	}
	elseif($_POST["choice"]==2)
	{
		if(checkAssignment($con,$_POST["TRUCK_ID"],$_POST["SALE_ID"]))
		{
				$stopProductCount=$_POST["num"]-1;
				$delivery_truck_id=getDeliveryTruckID($con,$_POST["TRUCK_ID"],$_POST["SALE_ID"]);
				for ($i=0; $i <$_POST["num"] ; $i++) 
				{ 
					if(checkProductAssignment($con,$delivery_truck_id,$_POST["SALE_ID"],$_POST["PRODUCT_ID"][$i]))
					{
						if(updateProductAssignment($con,$delivery_truck_id,$_POST["SALE_ID"],$_POST["PRODUCT_ID"][$i],$_POST["QTY"][$i]))
						{
							if($i==$stopProductCount)
							{
								echo "True";
							}
						}
						else
						{
							echo "Failed to update assignment".$i;
						}
					}
					else
					{
						if(insertProductAssignment($con,$delivery_truck_id,$_POST["SALE_ID"],$_POST["PRODUCT_ID"][$i],$_POST["QTY"][$i]))
						{
							if($i==$stopProductCount)
							{
								echo "True";
							}
							else
							{
								echo "F".$i;
							}
						}
						else
						{
							echo "Failed to insert".$i;
						}
					}
				}
		}
		else
		{
			if(insertAssignment($con,$_POST["DELIVERY_ID"],$_POST["SALE_ID"],$_POST["TRUCK_ID"],2))
			{
				$stopProductCount=$_POST["num"]-1;
				$delivery_truck_id=getDeliveryTruckID($con,$_POST["TRUCK_ID"],$_POST["SALE_ID"]);
				for ($i=0; $i <$_POST["num"] ; $i++) 
				{ 
					if(checkProductAssignment($con,$delivery_truck_id,$_POST["SALE_ID"],$_POST["PRODUCT_ID"][$i]))
					{
						if(updateProductAssignment($con,$delivery_truck_id,$_POST["SALE_ID"],$_POST["PRODUCT_ID"][$i],$_POST["QTY"][$i]))
						{
							if($i==$stopProductCount)
							{
								echo "True";
							}
						}
						else
						{
							echo "Failed to update assignment".$i;
						}
					}
					else
					{
						if(insertProductAssignment($con,$delivery_truck_id,$_POST["SALE_ID"],$_POST["PRODUCT_ID"][$i],$_POST["QTY"][$i]))
						{
							if($i==$stopProductCount)
							{
								echo "True";
							}
						}
						else
						{
							echo "Failed to insert".$i;
						}
					}
				}
			}
			else
			{
				echo "Failed to insert in del_truck";
			}
		}
	}
	mysqli_close($con);
?>