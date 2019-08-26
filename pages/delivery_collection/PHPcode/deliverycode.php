<?php
	include_once("connection.php");
	include_once("functions.php");
	if($_POST["choice"]==1)
	{
		// $saleID=$_POST["SALE_ID"];
		// $date=$_POST["dDate"];
		// $dct=1;
		// $addressID=$_POST["ADDRESS_ID"];
		// $add_query="INSERT INTO DELIVERY (SALE_ID,EXPECTED_DATE,ADDRESS_ID,DCT_STATUS_ID) VALUES ('$saleID','$date','$addressID','$dct')";
		// $add_result=mysqli_query($con,$add_query);
		// if($add_result)
		// {
		// 	echo "T,Delivery Added Sucessfully";
		// }
		// else
		// {
		// 	echo "Error: " . $sql_query. "<br>" . mysqli_error($con);
		// }
		if(addDelivery($con,$_POST["SALE_ID"],$_POST["dDate"],$_POST["ADDRESS_ID"],1))
		{
			echo "T,Delivery Added Sucessfully";
		}
		else
		{
			echo "F,Delivery Not Added";
		}
	}
	mysqli_close($con);
?>