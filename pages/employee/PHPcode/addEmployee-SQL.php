<?php
include "meRaviQr/qrlib.php";
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
	$fileTo= $_FILES["UploadsPic"];

	//GET IDs

	//INSERT INTO TABLE
	$subm = "INSERT INTO `EMPLOYEE`(`NAME`, `SURNAME`, `CONTACT_NUMBER`) VALUES ('$name','$surname','$contact')";
	$check= mysqli_query($DBConnect,$subm);
	
	if($check)
	{
	
		$query = "SELECT `EMPLOYEE_ID` FROM `EMPLOYEE` WHERE (NAME='$name' and SURNAME ='$surname' and CONTACT_NUMBER ='$contact')";
		$submitQuery = mysqli_query($DBConnect,$query);
		
		//$object = array();
		if($submitQuery)
		{
			$savedID = mysqli_fetch_assoc($submitQuery);
		
			$employeeID = $savedID["EMPLOYEE_ID"];
			
				//Upload picture.
			if(empty($employeeID))
			{
				echo "Employee ID not created, something is wrong with the code";
			}
			else
			{
						$dir= "../images/ProfilePic/";		
						$counter = count($fileTo["name"]);
					if(($fileTo["type"] == "image/jpeg")&& ($fileTo["size"] < 125000))
					{
						
								if($fileTo["error"] > 0)
								{
										echo "Error: " . $fileTo["error"]  . "<br/>";
								}
						else
						{
							
								$faker = true;
										if(file_exists($dir . $fileTo["name"] ))
										{
											echo $fileTo["name"] . " already exists.";
										} 
										else
										{
												
												
											
											
												$temp = explode(".", $fileTo["name"]);
											
												$newfilename = $employeeID . '.' . end($temp);
												move_uploaded_file($fileTo["tmp_name"] , $dir . $newfilename);
											
			
													//Upload pic on database.
												
												$query = "INSERT INTO EMPLOYEE_PICTURE (FILENAME, EMPLOYEE_ID) VALUES ('$newfilename', '$employeeID')"; // insert the user_id for specific pictures
												$res = mysqli_query($DBConnect, $query);
												var_dump($res);



												  
												  var_dump($employeeID);
												  $hash = sha1($employeeID);
											  
												  $qrImgName = "StockPath".rand();
												 
												 
												  $final = $employeeID ; //.$dev;
												  $qrs = QRcode::png($final,"userQr/$qrImgName.png","H","3","3");
												  $qrimage = $qrImgName.".png";
												  $workDir = $_SERVER['HTTP_HOST'];
												  $qrlink = $workDir."/qrcode".$qrImgName.".png";
												  $date = date("Y-m-d H:i:s");
												  
												  $sql = "INSERT INTO EMPLOYEE_QR(HASH,DATE_GENERATED,EMPLOYEE_ID) VALUES('$hash','$date','$employeeID')";
												  //var_dump($sql);
												  $query_QR = mysqli_query($DBConnect , $sql);
												 
												  //var_dump($query_QR);
														  //return $query;
											  
											  
												  //$insQr = $meravi->insertQrCode($qrUname,$final,$qrimage,$qrlink);
													
												if(($res== true) && ($query_QR==true))
												{
													$obj = array();
													$obj[0] = "success";
													$myJson = json_encode($obj);
													echo $myJson;
													
												}
												else
												{
													echo "error in saving employee pic or generated employee tag";
												}
																
										}
										
						}
			
					}
					else
					{
							echo  '<div class="alert alert-danger mt-3" role="alert">
							There was an error within the picture upload<br/>
					</div>';
							
					}

			}
			
		}
		else
		{
			echo "Couldnt get ID of employee details";
		}
	}
	else
	{
		echo "Couldnt insert details ";
	}
    //Close database connection
    mysqli_close($DBConnect);
  }
?>


