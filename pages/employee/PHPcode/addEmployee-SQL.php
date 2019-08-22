<?php
include "meRaviQr/qrlib.php";
  $url ='mysql://lf7jfljy0s7gycls:qzzxe2oaj0zj8q5a@u0zbt18wwjva9e0v.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/c0t1o13yl3wxe2h3';
 ///////////////////////////////////
	function checkSuburb($con,$suburbName)
	{
		$suburb_query="SELECT * FROM SUBURB WHERE NAME='$suburbName'";
		$suburb_result=mysqli_query($con,$suburb_query);
		if(mysqli_num_rows($suburb_result)>0)
		{
			return true;
		}
		else
		{
			return false;
		}
		

	}
	///////////////////////////////
	function checkCity($con,$cityName)
	{
		$city_query="SELECT * FROM CITY WHERE CITY_NAME='$cityName'";
		$city_result=mysqli_query($con,$city_query);
		if(mysqli_num_rows($city_result)>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	///////////////////////////////////
	function addSuburb($con,$suburbName,$cityID,$zip)
	{
		$add_query="INSERT INTO SUBURB (NAME,ZIPCODE,CITY_ID) VALUES ('$suburbName','$zip','$cityID')";
		$add_result=mysqli_query($con,$add_query);
		if($add_result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//////////////////////////////////////////////
	function addCity($con,$cityName)
	{
		$add_query="INSERT INTO CITY (CITY_NAME) VALUES('$cityName')";
		$add_result=mysqli_query($con,$add_query);
		if($add_result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	///////////////////////////////////////
	function getCityID($con,$cityName)
	{
		$get_query="SELECT * FROM CITY WHERE CITY_NAME='$cityName'";
		$get_result=mysqli_query($con,$get_query);
		if(mysqli_num_rows($get_result)>0)
		{
			$row=$get_result->fetch_assoc();
			$cityID=$row["CITY_ID"];
		}
		else
		{
			$cityID="City ID does not exist";
		}
		return $cityID;
	}
	/////////////////////////////////////////
	function getSuburbID($con,$suburbName)
	{
		$get_query="SELECT * FROM SUBURB WHERE NAME='$suburbName'";
		$get_result=mysqli_query($con,$get_query);
		if(mysqli_num_rows($get_result)>0)
		{
			$row=$get_result->fetch_assoc();
			$suburbID=$row["SUBURB_ID"];
		}
		else
		{
			$suburbID="Suburb does now exist";
		}
		return $suburbID;
	}
	/////////////////////////////////////////
	function addressCheck($con,$addressName)
	{
		$address_query="SELECT * FROM ADDRESS WHERE ADDRESS_LINE_1='$addressName'";
		$address_result=mysqli_query($con,$address_query);
		if(mysqli_num_rows($address_result)>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//////////////////////////////////////////////
	function addAddress($con,$addressName,$suburbID)
	{
		$add_query="INSERT INTO ADDRESS (ADDRESS_LINE_1,SUBURB_ID) VALUES ('$addressName','$suburbID')";
		$add_result=mysqli_query($con,$add_query);
		if($add_result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	////////////////////////////////////
	function getAddressID($con,$addressName)
	{
		$get_query="SELECT * FROM ADDRESS WHERE ADDRESS_LINE_1='$addressName'";
		$get_result=mysqli_query($con,$get_query);
		if(mysqli_num_rows($get_result)>0)
		{
			$row=$get_result->fetch_assoc();
			$addressID=$row["ADDRESS_ID"];
		}
		else
		{
			$addressID="Address does not exist";
		}
		return $addressID;
	}
	//////////////////////////////////////////////////
	function checkEmployee($con,$name,$surname,$contact)
	{
		$check_query="SELECT * FROM EMPLOYEE WHERE NAME='$name' AND SURNAME='$surname' AND CONTACT_NUMBER='$contact'";
		$check_result=mysqli_query($con,$check_query);
		if(mysqli_num_rows($check_result)>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//////////////////////////////////////////////////
	function addEmployee($con,$name,$surname,$contact,$passID,$email,$addID,$titleID,$eTypeID,$eStatusID)
	{
		$add_query="INSERT INTO EMPLOYEE (NAME,SURNAME,CONTACT_NUMBER,EMAIL,IDENTITY_NUMBER,ADDRESS_ID,TITLE_ID,EMPLOYEE_TYPE_ID,EMPLOYEE_STATUS_ID) VALUES ('$name','$surname','$contact','$email','$passID','$addID','$titleID','$eTypeID','$eStatusID')";
		$add_result=mysqli_query($con,$add_query);
		if($add_result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	///////////////////////////////////////////////////
	function getEmployeeID($con,$name,$surname,$contact)
	{
		$get_query="SELECT * FROM EMPLOYEE WHERE NAME='$name' AND SURNAME='$surname' AND CONTACT_NUMBER='$contact' ";
		$get_result=mysqli_query($con,$get_query);
		if(mysqli_num_rows($get_result)>0)
		{
			$row=$get_result->fetch_assoc();
			$employeeID=$row["EMPLOYEE_ID"];
		}
		else
		{
			$employeeID="Employee does not exist";
		}
		return $employeeID;
	}
	///////////////////////////////////////////////////
	function addWage($con,$employeeID)
	{
		$add_query="INSERT INTO WAGE (EMPLOYEE_ID) VALUES('$employeeID')";
		$add_result=mysqli_query($con,$add_query);
		if($add_result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
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
	$Ename = $_POST["name"]; //mysqli_real_escape_string($DBConnect,$_POST["employeeName"]);
	$Esurname = $_POST["surname"];//5
	$Econtact = $_POST["contact"];//8
	$fileTo= $_FILES["file"];
	$check=false;

	if(checkEmployee($DBConnect,$_POST["name"],$_POST["surname"],$_POST["contact"]))
	{
		echo "Employee Exists";
	}
	else
	{
		if(addressCheck($DBConnect,$_POST["address"]))
		{
			if(addEmployee($DBConnect,$_POST["name"],$_POST["surname"],$_POST["contact"],$_POST["IDPASS"],$_POST["email"],getAddressID($DBConnect,$_POST["address"]),$_POST["title"],$_POST["employeeType"],$_POST["status"]))
			{
				if(addWage($DBConnect,getEmployeeID($DBConnect,$_POST["name"],$_POST["surname"],$_POST["contact"])))
				{
					$check=true;	
				}
				else
				{
					$check=false;
				}
				
			}
			else
			{
				// echo "Employee Not Added";
				$check=false;
			}
		}
		else
		{
			if(checkSuburb($DBConnect,$_POST["suburb"]))
			{
				if(addAddress($DBConnect,$_POST["address"],getSuburbID($DBConnect,$_POST["suburb"])))
				{
					if(addEmployee($DBConnect,$_POST["name"],$_POST["surname"],$_POST["contact"],$_POST["IDPASS"],$_POST["email"],getAddressID($DBConnect,$_POST["address"]),$_POST["title"],$_POST["employeeType"],$_POST["status"]))
					{
						if(addWage($DBConnect,getEmployeeID($DBConnect,$_POST["name"],$_POST["surname"],$_POST["contact"])))
						{
							$check=true;	
						}
						else
						{
							$check=false;
						}
					}
					else
					{
						// echo "Address Added but employee not added";//
						$check=false;
					}
				}
				else
				{
					// echo "Suburb found but address not added";//
					$check=false;
				}
			}
			else
			{
				if(checkCity($DBConnect,$_POST["city"]))
				{
					if(addSuburb($DBConnect,$_POST["suburb"],getCityID($DBConnect,$_POST["city"]),$_POST["zip"]))
					{
						if(addAddress($DBConnect,$_POST["address"],getSuburbID($DBConnect,$_POST["suburb"])))
						{
							if(addEmployee($DBConnect,$_POST["name"],$_POST["surname"],$_POST["contact"],$_POST["IDPASS"],$_POST["email"],getAddressID($DBConnect,$_POST["address"]),$_POST["title"],$_POST["employeeType"],$_POST["status"]))
							{
								if(addWage($DBConnect,getEmployeeID($DBConnect,$_POST["name"],$_POST["surname"],$_POST["contact"])))
								{
									$check=true;	
								}
								else
								{
									$check=false;
								}
							}
							else
							{
								// echo "City found suburb added address added but employee not added";//
								$check=false;
							}
						}
						else
						{
							echo "City found suburb added but address not added.";//
							// $check=false;
						}
					}
					else
					{
						// echo "City Found Suburb not added";
						$check=false;
					}
				}
				else
				{
					if(addCity($DBConnect,$_POST["city"]))
					{

						if(addSuburb($DBConnect,$_POST["suburb"],getCityID($DBConnect,$_POST["city"]),$_POST["zip"]))
						{
							if(addAddress($DBConnect,$_POST["address"],getSuburbID($DBConnect,$_POST["suburb"])))
							{
								if(addEmployee($DBConnect,$_POST["name"],$_POST["surname"],$_POST["contact"],$_POST["IDPASS"],$_POST["email"],getAddressID($DBConnect,$_POST["address"]),$_POST["title"],$_POST["employeeType"],$_POST["status"]))
								{
									if(addWage($DBConnect,getEmployeeID($DBConnect,$_POST["name"],$_POST["surname"],$_POST["contact"])))
									{
										$check=true;	
									}
									else
									{
										$check=false;
									}
								}
								else
								{
									// echo "City added suburb added address added but employee not addded";//
									$check=false;
								}
							}
							else
							{
								// echo "City added suburb added but address not added";//
								$check=false;
							}
						}
						else
						{
							// echo "City Added Suburb not added";
							$check=false;
						}
					}
				}
			}
		}
	}
	if($check)
	{
	
		$query = "SELECT `EMPLOYEE_ID` FROM `EMPLOYEE` WHERE (NAME='$Ename' and SURNAME ='$Esurname' and CONTACT_NUMBER ='$Econtact')";
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
						//$counter = count($fileTo["name"]);
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
												//var_dump($res);



												  
												  //var_dump($employeeID);
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
													echo "success";
													
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
							echo  'There was an error within the picture upload';
							
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
		echo "Couldnt insert details";
	}
    //Close database connection
    mysqli_close($DBConnect);
  }
?>


