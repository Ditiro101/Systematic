<?php
	include_once("connection.php");
	function getEmployeeType($con)
	{
		$get_query="SELECT * FROM EMPLOYEE_TYPE";
		$get_result=mysqli_query($con,$get_query);
		if(mysqli_num_rows($get_result)>0){
			while($row=$get_result->fetch_assoc())
			{
				$vals[]=$row;
			}
			echo json_encode($vals);
		}
		else
		{
			echo "False";
		}
	}
	//////////////////////////////////////////////////////////
	if($_POST["choice"]==0)
	{
		getEmployeeType($con);
	}
	elseif($_POST["choice"]==2)
	{
		$sql_query ="SELECT * FROM EMPLOYEE";
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