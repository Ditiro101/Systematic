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
		//Send error response
	  	$response = "databaseError";
      	echo $response;
	}
	else
	{
		$userID = $_POST['myUserID'];
		$sql_query = "SELECT B.TITLE_NAME, A.NAME, A.SURNAME, A.EMPLOYEE_ID, C.NAME, A.IDENTITY_NUMBER, A.EMAIL, A.CONTACT_NUMBER, D.ADDRESS_LINE_1, E.NAME, F.CITY_NAME, E.ZIPCODE
			FROM EMPLOYEE A
			JOIN TITLE B ON A.TITLE_ID = B.TITLE_ID
			JOIN EMPLOYEE_TYPE C ON A.EMPLOYEE_TYPE_ID = C.EMPLOYEE_TYPE_ID 
			JOIN ADDRESS D ON A.ADDRESS_ID = D.ADDRESS_ID 
			JOIN SUBURB E ON D.SUBURB_ID = E.SUBURB_ID
			JOIN CITY F ON E.CITY_ID = F.CITY_ID
			WHERE EMPLOYEE_ID = '$userID'";

		$result = mysqli_query($DBConnect,$sql_query);

		if (mysqli_num_rows($result)>0) 
		{
			$addresses = array();
			for ($i=0; $i < mysqli_num_rows($result); $i++) 
			{ 
				array_push($addresses, $result->fetch_assoc());
			}
		    echo json_encode($addresses);
	    }
	    else
	    {
		    echo "false";
	    }
	    mysqli_close($DBConnect);
	}
?>