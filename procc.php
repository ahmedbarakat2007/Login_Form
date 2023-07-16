<?php
//Make a database name bmw then make a table with 7 columns as each [username,password,email,pic,birthDate,sex,id]
$con=mysqli_connect("localhost","root","","bmw"/*Put Thr Name Of Your Database Insted Of bmw*/);
        // Check connection
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
		
		
#password status, to turn it off write false.
$is_pass_Active=true;

#if it's require a password, type it here :
$Thepassword="123456";
//echo " hello world \n \n ";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	session_start() ;

  if($_POST['loveu'] == "Login")
  {
    $username =  $_POST['username'];
    $psswoord = $_POST['password'];

    $sql = "SELECT password FROM users WHERE username= '$username' ";

    $newLINK="";
    $result = $con->query($sql);
    while($row = $result->fetch_assoc()) {
    $newLINK = $row["password"];
    }
  
  if($psswoord == $newLINK) 

  {//
  $_SESSION["account"] = $username;
  $_SESSION["status"] = "true";

  header('Location:main.php');

  }
  else
  header('Location: loginerr.html');
  $con=mysqli_connect("localhost","root","","bmw");
  // Check connection
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


  }
  else if($_POST['editnow'] == "Submit Changes")
  {
  echo " new changes are save";



  $newname = $_POST['newname'];
  $filename = $_FILES["newpic"]["name"];
  $file = $_FILES['file']['name'];


  $tempname = $_FILES["newpic"]["tmp_name"];  
  
    $folder = "profile_pic/".$filename;   
    $nowuser = $_SESSION["account"];
    $update = "update users set username='$newname' where username ='$nowuser'";






    mysqli_query($con, $update); 
    $_SESSION["account"] = $newname;
    //mysqli_query($con, $sql);
    if($_FILES['newpic']['size']==0){

    }
    else{
      $sql = "update users set pic='$filename' where username ='$nowuser'";
      mysqli_query($con, $sql);

      $_SESSION['pic'] =$filename; 


    }

    if (move_uploaded_file($tempname, $folder)) {

      $msg = "Image uploaded successfully";
      header('Location: main.php');

  }else{

      $msg = "Failed to upload image";

  }
  if($file!="") {

    move_uploaded_file($_FILES['file']['tmp_name'],'profile_pic/'.$filename);
    
    } else {
    
    $file = $filename;
    
    }
  header('Location: main.php');
  }
  else if($_POST['chosenow'] == "Continue")
 {
 echo " new changes are save";


 $filename = $_FILES["newpic"]["name"];

 $tempname = $_FILES["newpic"]["tmp_name"];  

  $folder = "profile_pic/".$filename;   
  $nowuser = $_SESSION["account"];
  $sql = "update users set pic='$filename' where username ='$nowuser'";

  mysqli_query($con, $sql);
  $_SESSION['pic'] =$filename; 
  
  

  if (move_uploaded_file($tempname, $folder)) {

    $msg = "Image uploaded successfully";

 }else{

    $msg = "Failed to upload image";

 }
 header('Location: main.php');
 //$result = mysqli_query($con, "SELECT * FROM pic");
}
 else if($_POST['skipnow'] == "Skip")
 {
 echo " new changes are save";


 $filename = "system/sex.png";

 $tempname = "profile_pic/sex.png";  

  $username = $_SESSION["account"];
  $sql = "update users set pic='$filename' where username ='$username'";

  $_SESSION['pic'] = $filename; 

  mysqli_query($con, $sql);             

  if (move_uploaded_file($tempname, $folder)) {

    $msg = "Image uploaded successfully";

 }else{

    $msg = "Failed to upload image";

 }
 header('Location: main.php');
 //$result = mysqli_query($con, "SELECT * FROM pic");


}
else// signup
{

    $username =  $_POST['username'];
    $email = $_POST['email'];
    $psswoord = $_POST['password'];
    $propic = 'profile_pic/sex.png';
    $sex= $_POST['sex'];
    $birthdate=$_POST["birthDate"];
  //  $img = "update users set pic='sex.png' where username ='$username'";
  if ($sex == "0"){
    return false;
  }else if ($sex == "1"){
    $sex = "Male";
  }else if ($sex == "2"){
    $sex = "Female";
  }else{
     header('Location: index.html');
  }

    $sql = "INSERT INTO users (username, password,email,pic,sex,birthDate)
    VALUES ('$username', '$psswoord','$email','$propic','$sex','$birthdate')";
     
    $con -> multi_query($sql);
    
    //mysqli_query($con, $sql);
    
      // Close connection
      $con->close();
      $_SESSION["account"] = $username;
      $_SESSION["status"] = "true";
      header('Location: chosepic.php');
}



}