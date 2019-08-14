<?php
	//var_dump($_FILES);
	//var_dump($_POST);
	$customerID = 23;

    for($i=0; $i < count($_FILES); $i++)
    {
    	$name = $_FILES['file-'.($i+1)]["name"];
    	$extExplode = explode(".", $name);
		$ext = end($extExplode);
    	$newFileName = "";
    	if ($i==0) 
    	{
    		$newFileName = $customerID."_Bank-Statement.".$ext;

    	} 
    	else if ($i==1) 
    	{
    		$newFileName = $customerID."_ID-Copy.".$ext;
    	}
    	else 
    	{
    		$newFileName = $customerID."_Proof-Of-Residence.".$ext;
    	}

    	if (!file_exists('../../../documents/'.$customerID)) {
    		mkdir('../../../documents/'.$customerID, 0777, true);
    	}

	    if(move_uploaded_file($_FILES['file-'.($i+1)]['tmp_name'], '../../../documents/'.$customerID.'/'.$newFileName))
	    {

	    	$file = "../../../documents/".$customerID.'/'.$newFileName;
	    	uploadFile($file, $customerID);
	        echo "file has been uploaded successfully";
	    } 
	    else
	    {
	        echo "Error uploading file";
	    }
	}

	function uploadFile($filePath, $custID)
	{
		$filename = $filePath;

		$api_url = 'https://content.dropboxapi.com/2/files/upload'; //dropbox api url
	    $token = 'RNA9Y7I1qiAAAAAAAAAADbeKbConoiv8gUXYyb2xpMTKppDQQpRtXW6pBvHCfeMM'; // oauth token

	    $headers = array('Authorization: Bearer '. $token,
	        'Content-Type: application/octet-stream',
	        'Dropbox-API-Arg: '.
	        json_encode(
	            array(
	                "path"=> '/'.$custID.'/'. basename($filename),
	                "mode" => "add",
	                "autorename" => true,
	                "mute" => false
	            )
	        )
	    );

	    $ch = curl_init($api_url);

	   	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	   	curl_setopt($ch, CURLOPT_POST, true);

	    $path = $filename;


	    $fp = fopen($path, 'rb');
	    $filesize = filesize($path);

	    curl_setopt($ch, CURLOPT_POSTFIELDS, fread($fp, $filesize));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_VERBOSE, 1); // debug

	    $response = curl_exec($ch);
	    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

	    //echo($response.'<br/>');
	    //echo($http_code.'<br/>');

	    curl_close($ch);
	}

?>