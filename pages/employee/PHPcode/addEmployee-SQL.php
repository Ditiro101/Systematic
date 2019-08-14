<?php

  $url ='mysql://lf7jfljy0s7gycls:qzzxe2oaj0zj8q5a@u0zbt18wwjva9e0v.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/c0t1o13yl3wxe2h3';

  $dbparts = parse_url($url);

  $hostname = $dbparts['host'];
  $username = $dbparts['user'];
  $password = $dbparts['pass'];
  $database = ltrim($dbparts['path'],'/');

  $DBConnect = mysqli_connect($hostname, $username, $password, $database);

  if($DBConnect === false)
  {
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  else
  {
	$name = mysqli_real_escape_string($DBConnect,$_POST["employeeName"]);
	$surname = $_POST["employeeSurname"];//5
	$contact = $_POST["employeeNumber"];//8
	
	//GET IDs

	//INSERT INTO TABLE
	$subm = "INSERT INTO `EMPLOYEE`(`NAME`, `SURNAME`, `CONTACT_NUMBER`) VALUES ('$name','$surname','$contact')";
	$check= mysqli_query($DBConnect,$subm);
	
	if($check)
	{
		$query = "SELECT `EMPLOYEE_ID` FROM `EMPLOYEE` WHERE (NAME='$name' and SURNAME ='$surname' and CONTACT_NUMBER ='$contact')";
		$submitQuery = mysqli_query($DBConnect,$query);

		$object = array();
		if($submitQuery)
		{
			
			$employeeID = mysqli_fetch_assoc($submitQuery);
			
				echo $employeeID["EMPLOYEE_ID"];	
		}
		else
		{
			echo "Couldnt get ID of employee details";
		}
	}
	else
	{
		echo "Couldnt insert details ". $subm;
	}
    //Close database connection
    mysqli_close($DBConnect);
  }
?>


