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
      if($choice == 0 )
      {
        $vals = array();

        $get_query = "SELECT * FROM `ACCESS_LEVEL`";
		$get_result = mysqli_query($DBConnect,$get_query);
		if(mysqli_num_rows($get_result)>0){
			while($row=mysqli_fetch_assoc($get_result))
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
      else if($choice > 0 )
      {
          
      }


      
    
    //Close database connection
    mysqli_close($DBConnect);
  }
?>