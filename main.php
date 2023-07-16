<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="http://codeorigin.jquery.com/jquery-2.0.3.min.js"></script>
    <title><?php
   session_start() ;
      if(isset($_SESSION["status"])=="true")
      echo  $_SESSION["account"];
      else
      header('Location: index.html');
   ?></title>
</head>
<style>
     #propic{
  width:100px;
  height:100px;
  border-radius:90px;
 }
 </style>
<body>
    <center>
        <br><br>
        <div class="header">
            <h1>My Profile</h1>
        </div>
        <?php
               $usssr = $_SESSION["account"];
                  if(isset($_SESSION["status"])=="true");
                  else
                     echo "Login";
                     $con=mysqli_connect("localhost","root","","bmw");
                     // Check connection
                     if (mysqli_connect_errno())
                     {
                     echo "Failed to connect to MySQL: " . mysqli_connect_error();
                     }
               ?>
        <?php
    $sql = "SELECT * FROM users WHERE username= '$usssr' ";
    $result = $con->query($sql);
    $result1;
    $birth;
    while($row = $result->fetch_assoc()) {
    $result1 = $row["pic"];
    $birth = $row["birthDate"];
    $sex1 = $row['sex'];
    $email = $row['email'];
    }          
            ?>
        <br><br><br><br><br><br>
        <div class ="content">
            <br><br><br>
            <img src="
            <?php
            echo "profile_pic/",$result1;
            ?>
            " draggable="false" id="propic">
            <h1>
              <?php
              if(isset($_SESSION["status"])=="true")
              echo "Name : ", $_SESSION["account"];
              else 
              echo "Not Signed In";
              ?>
            </h1>
            <br>
            <h1>Birth Date : <?php echo $birth;?></h1>
            <br>
            <h1>Sex : <?php echo $sex1;?></h1>
            <br>
            <h1>Email : <?php echo $email;?></h1>
            <br>
            <a href="logout.php"><button id="logbtn">Logout</button></a>
            <a href="about.html"><button id="logbtn">About</button></a>
            <br><br><br>
        </div>
    </center>
</body>
<script>
function myFunction() {
    var x = document.getElementById("logbox1");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
</html>