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

    $vals = array();
    //if($_POST["choice"]==2)
	//{
        $sql_query ="SELECT * FROM `USER`
        WHERE `USER_STATUS_ID` = '1'";
	    $result = mysqli_query($DBConnect,$sql_query);
	    //$row = mysqli_fetch_array($result);

        if (mysqli_num_rows($result)>0) 
        {
            $count=0;
           $temp;
           $vals;
           $access;
           $i = 0;
           $accessID;
           $finalArray = array();
	     while ( $row=mysqli_fetch_assoc($result))
	        {
	        	//$vals[]=$row;
                //$vals[$count]["ID"]=$row["SUPPLIER_ID"];
               
                //var_dump($row);

                $vals = array("USER_ID" =>$row["USER_ID"],"EMPLOYEE_ID"=> $row["EMPLOYEE_ID"]);
                //var_dump($vals);
                $tempID = $row["EMPLOYEE_ID"];
                $accessID = $row["ACCESS_LEVEL_ID"];

                ///GET NAME,SURNAME
                $employee_query ="SELECT * FROM `EMPLOYEE`
                WHERE `EMPLOYEE_ID` = '$tempID'";
                $submit = mysqli_query($DBConnect,$employee_query);
              
               while( $filter=mysqli_fetch_assoc($submit))
                {
                  
                    $temp = array("NAME" =>$filter["NAME"],"SURNAME"=>$filter["SURNAME"]);

                    //var_dump($temp);
                    //GET ROLE NAME
                    $access_query ="SELECT * FROM `ACCESS_LEVEL`
                    WHERE `ACCESS_LEVEL_ID` = '$accessID'";
                    $submitAccess = mysqli_query($DBConnect,$access_query);

                  //var_dump($submitAccess);
                   $accessArray=mysqli_fetch_assoc($submitAccess);
                
                        $access = array("ROLE_NAME"=>$accessArray["ROLE_NAME"]);
                       // var_dump($access);

                }
                $finalArray[$count] = array($vals,$temp,$access);
                 var_dump($finalArray);
                break;

	        	$count=$count+1;
            }
           var_dump($finalArray[0][0]["EMPLOYEE_ID"]);
            //var_dump($vals);
           /*for($i=0; $i<$count;$i++)
           {
                ;
           }
	        echo json_encode($vals);
            // echo mysqli_num_rows($result);*/
        }
    //}












  }
  mysqli_close($DBConnect);
?>





array(1) { [0]=> array(3) 
            { [0]=> array(2) 
                { ["USER_ID"]=> string(1) "1" ["EMPLOYEE_ID"]=> string(1) "1" } 
                    [1]=> array(2) 
                    { ["NAME"]=> string(5) "Rangy" ["SURNAME"]=> string(8) "Ranganai" } 
                        [2]=> array(1) 
                        { ["ROLE_NAME"]=> string(5) "Admin" } 
            } 
        }