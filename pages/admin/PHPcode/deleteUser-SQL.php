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
    $choice = $_POST["choice"];



        if($choice == 2)
        {
            $sql = "SELECT USER.USER_ID, USER.USERNAME, USER.USER_PASSWORD , USER.EMPLOYEE_ID, EMPLOYEE.NAME , EMPLOYEE.SURNAME , USER_STATUS.USER_STATUS_NAME
            FROM USER
            INNER JOIN EMPLOYEE ON USER.EMPLOYEE_ID = EMPLOYEE.EMPLOYEE_ID
            INNER JOIN USER_STATUS on USER_STATUS.USER_STATUS_ID = USER.USER_STATUS_ID
            WHERE USER.USER_STATUS_ID = '1'";
            //var_dump($sql);
            $submit = mysqli_query($DBConnect,$sql);
            if($submit)
            {
            if (mysqli_num_rows($submit)>0)
            {
                $count=0;
                while ($row = mysqli_fetch_assoc($submit))
                {
                $vals[]=$row;
                //$vals[$count]["ID"]=$row["SUPPLIER_ID"];
                $count=$count+1;
                }
                echo json_encode($vals);
            }
            }
            else
            {
            echo "False";
            }
        }


        if($choice == 4)
        {


                        
                    $user_ID =  $_POST["user_ID"];
                
                    if(isset($user_ID))
                    {
                        $sql ="UPDATE `USER`
                        SET `USER_STATUS_ID` = '2'
                        WHERE `USER_ID` = '$user_ID'";
                        $submitQuery = mysqli_query($DBConnect,$sql);

                    
                            if($submitQuery)
                            {
                                echo "success";
                            }
                            else
                            {
                                echo "Could not change user status";
                            }
                    
                    }




    }
    
    //Close the connection
    mysqli_close($DBConnect);
  }
  
?>




