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

    //$vals = array();
    
        $sql_query ="SELECT * FROM `USER`
        WHERE `USER_STATUS_ID` = '1'";
	    $result = mysqli_query($DBConnect,$sql_query);
	    //$row = mysqli_fetch_array($result);

        if (mysqli_num_rows($result)>0) 
        {
           $userID;
           $employeeID;
           $userName;
           $email;
           $accessLevelID;
           $userSurname;
           $roleName;
	     while ( $row=mysqli_fetch_assoc($result))
	        {
	        	

                //$vals = array("USER_ID" =>$row["USER_ID"],"EMPLOYEE_ID"=> $row["EMPLOYEE_ID"]);
                //var_dump($vals);
                $employeeID = $row["EMPLOYEE_ID"];
                $accessLevelID = $row["ACCESS_LEVEL_ID"];
                $userID = $row["USER_ID"];
                $email = $row["USERNAME"];

                ///GET NAME,SURNAME
                $employee_query ="SELECT * FROM `EMPLOYEE`
                WHERE `EMPLOYEE_ID` = '$employeeID'";
                $submit = mysqli_query($DBConnect,$employee_query);
              
               while( $filter=mysqli_fetch_assoc($submit))
                {
                  
                   // $temp = array("NAME" =>$filter["NAME"],"SURNAME"=>$filter["SURNAME"]);

                   $userName = $filter["NAME"];
                   $userSurname = $filter["SURNAME"];
                    
                    //GET ROLE NAME
                    $access_query ="SELECT * FROM `ACCESS_LEVEL`
                    WHERE `ACCESS_LEVEL_ID` = ' $accessLevelID'";
                    $submitAccess = mysqli_query($DBConnect,$access_query);

                  //var_dump($submitAccess);
                   $accessArray=mysqli_fetch_assoc($submitAccess);
                
                        //$access = array("ROLE_NAME"=>$accessArray["ROLE_NAME"]);
                      $roleName = $accessArray["ROLE_NAME"];

                }
               
                
                $formView="<form target='_blank' action='maintain-user.php' method='POST'><input type='hidden' name='USER_ID' value='".$userID."'>"."<input type='hidden' name='EMPLOYEE_ID' value='".$employeeID."'>"."<input type='hidden' name='NAME' value='".$userName."'>"."<input type='hidden' name='SURNAME' value='".$userSurname."'>"."<input type='hidden' name='ROLE_NAME' value='".$roleName."'>"."<input type='hidden' name='USERNAME' value='".$email."'>"."<button class='btn btn-icon btn-2 btn-success btn-sm' type='submit'><span class='btn-inner--icon'><i class='fas fa-user'></i></span><span class='btn-inner--text'>Edit</span></button>"."</form>";
				echo "<tr><td>".$userID."</td><td>".$employeeID."</td><td>".$userName."</td><td>".$userSurname."</td><td>".$roleName."</td><td>".$formView."</td></tr>";
			

	        
            }
           
            
        }
    //}









//var_dump($finalArray[0][0]["EMPLOYEE_ID"]);

mysqli_close($DBConnect);
  }
  
?>




