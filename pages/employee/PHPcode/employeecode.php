<?php
	include_once("connection.php");
	include_once("functions.php");
	//////////////////////////////////////////////////////////
	if($_POST["choice"]==0)
	{
		getAllEmployeeType($con);
	}
	elseif($_POST["choice"]==1)
	{
		if(addressCheck($con,$_POST["address"]))
		{
			if(maintainEmployee($con,$_POST["employeeID"],$_POST["name"],$_POST["surname"],$_POST["contact"],$_POST["email"],$_POST["IDPASS"],getAddressID($con,$_POST["address"]),$_POST["title"],$_POST["employeeType"],$_POST["status"]))
			{
				echo "T,Employee Maintained";
			}
			else
			{
				echo "F,Address found but Employee not Maintained";
			}
		}
		else
		{
			if(checkSuburb($con,$_POST["suburb"]))
			{
				if(addAddress($con,$_POST["address"],getSuburbID($con,$_POST["suburb"])))
				{
					if(maintainEmployee($con,$_POST["employeeID"],$_POST["name"],$_POST["surname"],$_POST["contact"],$_POST["email"],$_POST["IDPASS"],getAddressID($con,$_POST["address"]),$_POST["title"],$_POST["employeeType"],$_POST["status"]))
					{
						echo "T,Employee Maintained";
					}
					else
					{
						echo "F,Suburb Found Address Added but Employee not Maintained";
					}
				}
				else
				{
					echo "F,Suburb Found Address Not Added";
				}
			}
			else
			{
				if(checkCity($con,$_POST["city"]))
				{
					if(addSuburb($con,$_POST["suburb"],getCityID($con,$_POST["city"]),$_POST["zip"]))
					{
						if(addAddress($con,$_POST["address"],getSuburbID($con,$_POST["suburb"])))
						{
							if(maintainEmployee($con,$_POST["employeeID"],$_POST["name"],$_POST["surname"],$_POST["contact"],$_POST["email"],$_POST["IDPASS"],getAddressID($con,$_POST["address"]),$_POST["title"],$_POST["employeeType"],$_POST["status"]))
							{
								echo "T, Employee Maintained";
							}
							else
							{
								echo "F,City found Suburb Addedd Address Added but Employee not Maintained";
							}
						}
						else
						{
							echo "F,City found suburb added but address not added.";
						}
					}
					else
					{
						echo "F,City Found but Suburb not added";
					}
				}
				else
				{
					if(addCity($con,$_POST["city"]))
					{

						if(addSuburb($con,$_POST["suburb"],getCityID($con,$_POST["city"]),$_POST["zip"]))
						{
							if(addAddress($con,$_POST["address"],getSuburbID($con,$_POST["suburb"])))
							{
								if(maintainEmployee($con,$_POST["employeeID"],$_POST["name"],$_POST["surname"],$_POST["contact"],$_POST["email"],$_POST["IDPASS"],getAddressID($con,$_POST["address"]),$_POST["title"],$_POST["employeeType"],$_POST["status"]))
								{
									echo "T,Employee Maintained";
								}
								else
								{
									echo "F,City Added Suburb Added Address Added but Employee not Maintained";
								}
							}
							else
							{
								echo "F,City Added Suburb Added but Address not added";
							}
						}
						else
						{
							echo "F,City Addedbut Suburb not added.";
						}
					}
				}
			}
		}
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