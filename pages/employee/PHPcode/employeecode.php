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
	mysqli_close($con);
?>