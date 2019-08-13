<?php
session_start();
require 'validate-login.php';
include 'header.php';
 if(isset($_POST["set"]))
 {
     $dir= "../images/ProfilePic/";
     $fileTo= $_FILES["picToUpload"];
     $counter = count($fileTo["name"]);
     $f_file;
     $imageFileType;
     //$email = $_POST['email'];
     //$pass = $_POST['pass'];
   if(($fileTo["type"] == "image/jpeg")&& ($fileTo["size"] < 125000))
   {
         if($fileTo["error"] > 0)
         {
             echo "Error: " . $fileTo["error"] . "<br/>";
         }
     else
     {
        /* echo "Upload: " . $fileTo["name"][$k] . "<br/>";
         echo "Type: " . $fileTo["type"][$k] . "<br/>";
         echo "Size: " . ($fileTo["size"][$k] / 1024) . "Kb<br/>";
         echo "Temp file: " . $fileTo["tmp_name"][$k]  . "<br/>";*/
         $faker = true;
             if(file_exists($dir . $fileTo["name"]))
             {
                // echo $fileTo["name"][$k] . " already exists.";
             } 
             else
             {
                 
                 
                //$filer = $fileTo["name"][$k];
                
                 $temp = explode(".", $fileTo["name"]);
                 var_dump(end($temp));
                 $newfilename = $_SESSION["users"] . '.' . end($temp);
                 var_dump($newfilename);
                 var_dump($fileTo["tmp_name"]);
                 move_uploaded_file($fileTo["tmp_name"], $dir . $newfilename);
                $_SESSION["picSet"]= "sett";


                header('location:profile.php');
                     //move_uploaded_file($fileTo["tmp_name"],
                     //$dir . $fileTo["name"][$k]);

                     
                    /* $query = "SELECT * FROM tbusers WHERE email = '$email' AND password = '$pass'";
                     $res = $mysqli->query($query);
                     if($row = mysqli_fetch_array($res)) //Does not override yet
                     {
                         $user = $row['user_id'];
                         $query = "INSERT INTO tbgallery (user_id, filename) VALUES ('$user', '$filer');"; // insert the user_id for specific pictures
                         $res = mysqli_query($mysqli, $query) == TRUE;
                     }

                   
                    */ 
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
 /*echo "<h1>
         <strong>Image Gallery</strong>
         </h1>";
  $query = "SELECT * FROM tbusers WHERE email = '$email' AND password = '$pass'";
 $res = $mysqli->query($query);
     if($row = mysqli_fetch_array($res))
     {
       $user = $row["user_id"];
       $query = "SELECT * FROM tbgallery WHERE user_id = '$user'";
       $res = $mysqli->query($query);
       
       echo "<div class='row imageGallery'>";
       while($row = mysqli_fetch_array($res))
       {
             
            
                 echo "<div class='col-3' style='background-image: url(gallery/".$row["filename"].")'>
                 </div><br/>";
             
            
       }
       echo "</div>";
     }
 
}				
else{
echo 	'<div class="alert alert-danger mt-3" role="alert">
     You are not registered on this site!
 </div>';
}
} 

else{
echo 	'<div class="alert alert-danger mt-3" role="alert">
 Could not log you in
</div>';
}*/
?>