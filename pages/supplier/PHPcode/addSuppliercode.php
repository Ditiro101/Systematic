<?php
	include_once("connection.php");
	function checkSuburb($con,$suburbName)
	{
		$suburb_query="SELECT * FROM SUBURB WHERE NAME='$suburbName'";
		$suburb_result=mysqli_query($con,$suburb_query);
		if(mysqli_num_rows($suburb_result)>0)
		{
			return true;
		}
		else
		{
			return false;
		}
		

	}
	if($_POST["choice"]==1)
	{
		if(checkSuburb($con,$_POST["suburb"]))
		{
			echo "True";
		}
		else
		{
			echo $_POST["suburb"];
		}
		// $name=$_POST["name"];
		// $vat=$_POST["vat"];
		// $contact=$_POST["contact"];
		// $email=$_POST["email"];
		// $sql_query ="INSERT INTO SUPPLIER (NAME,VAT_NUMBER,CONTACT_NUMBER,EMAIL)
		// VALUES('$name','$vat','$contact','$email')";
		// $result = mysqli_query($con,$sql_query);
		// if($result)
		// {
		// 	echo "True";
		// }
		// else
		// {
		// 	echo "Error: " . $sql_query. "<br>" . mysqli_error($con);
		// }
	}
	elseif ($_POST["choice"]==2) 
	{
		$supID=$_POST["ID"];
		$name=$_POST["Name"];
		$vat=$_POST["VAT"];
		$contact=$_POST["Phone"];
		$email=$_POST["Email"];
		$addID=$_POST["ADDID"];
		$address=$_POST["Address"];
		$city=$_POST["City"];
		$suburb=$_POST["Suburb"];
		$zip=$_POST["Zip"];
		$sql_query="UPDATE SUPPLIER SET NAME='$name',VAT_NUMBER='$vat',CONTACT_NUMBER='$contact',EMAIL='$email' WHERE SUPPLIER_ID='$supID'";
		$result=mysqli_query($con,$sql_query);
		$sql_query="SELECT * FROM ADDRESS WHERE ADDRESS_ID='$addID'";
		$result2=mysqli_query($con,$sql_query);
		$row2=$result2->fetch_assoc();
		$dataAddress=$row2["ADDRESS_LINE_1"];
		if($dataAddress!=$address)
		{
			$sql_query="SELECT * FROM ADDRESS WHERE ADDRESS_LINE_1='$address";
			$result=mysqli_query($con,$sql_query);
			if($result)
			{
				$row=$result->fetch_assoc();
				$dataAddID=$row["ADDRESS_ID"];
				$sup_query="INSERT INTO SUPPLIER_ADDRESS (ADDRESS_ID, SUPPLIER_ID) VALUES ('$dataAddID',$supID')";
				$sup_result=mysqli_query($con,$sup_query);
				if($sup_result)
				{
					echo "True";
				}
				else
				{
					echo "Error5: " . $sup_query. "<br>" . mysqli_error($con);
				}
			}
			else
			{
				$sql_query="SELECT * FROM SUBURB WHERE NAME='$suburb'";
				$result3=mysqli_query($con,$sql_query);
				if(!(mysqli_num_rows($result3)>0))
				{
					$sql_query2="SELECT * FROM CITY WHERE CITY_NAME='$city'";
					$result4=mysqli_query($con,$sql_query2);
					if(mysqli_num_rows($result4)<=0)
					{
						$sql_query3="INSERT INTO CITY (CITY_NAME) VALUES ('$city')";
						$result5=mysqli_query($con,$sql_query3);
						
					}
					$sql_query3="SELECT * FROM CITY WHERE CITY_NAME='$city'";
					$result5=mysqli_query($con,$sql_query3);
					$row5=$result5->fetch_assoc();
					$dataCityID=$row5["CITY_ID"];
					$sql_query2="INSERT INTO SUBURB (NAME,ZIPCODE,CITY_ID) VALUES ('$suburb','$zip'.$dataCityID)";
					$result5=mysqli_query($con,$sql_query2);
					
				}
				$sql_query="SELECT * FROM SUBURB WHERE NAME='$suburb'";
				$result3=mysqli_query($con,$sql_query);
				$row3=$result3->fetch_assoc();
				$dataSubID=$row3["SUBURB_ID"];
				$sql_query="INSERT INTO ADDRESS (ADDRESS_LINE_1,SUBURB_ID) VALUES ('$address','$dataSubID')";
				$result3=mysqli_query($con,$sql_query);
				$sql_query="SELECT * FROM ADDRESS WHERE ADDRESS_LINE_1='$address'";
				$result6=mysqli_query($con,$sql_query);
				$row6=$result6->fetch_assoc();
				$dataAddID=$row6["ADDRESS_ID"];
				$sup_query="INSERT INTO SUPPLIER_ADDRESS (ADDRESS_ID,SUPPLIER_ID) VALUES ('$dataAddID','$supID')";
				$sup_result=mysqli_query($con,$sup_query);
				if($sup_result)
				{
					echo "True";
				}
				else
				{
					echo $dataAddID."Error5: " . $sup_query. "<br>" . mysqli_error($con);
				}
			}
			

		}

		


		


	}
	elseif ($_POST["choice"]==3)
	{
		$sql_query ="SELECT * FROM  SUPPLIER";
	    $result = mysqli_query($con,$sql_query);
	    //$row = mysqli_fetch_array($result);

	    if (mysqli_num_rows($result)>0) {
	        $count=0;
	        while ($row=$result->fetch_assoc())
	        {
	        	$vals[]=$row;
	        	//$vals[$count]["ID"]=$row["SUPPLIER_ID"];
	        	$count=$count+1;
	        }
	        echo json_encode($vals);
	        // echo mysqli_num_rows($result);
	        
	    }
	    else{
	         echo "Error: " . $sql_query. "<br>" . mysqli_error($con);
	    }
	}
	mysqli_close($con);	
	
	      
	    
?>