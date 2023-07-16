<?php
            session_start() ;
            if(!isset($_SESSION['status'])){
               header("Location:index.html");
            }
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="http://codeorigin.jquery.com/jquery-2.0.3.min.js"></script>
    <title>Choose Pic</title>
    <style>
        .propicedit{
  border: 1px solid #00ffce;
  background-color: #00ffce;
  display: inline-block;
  padding: 6px 12px;
  cursor: pointer;
  color:black;
  border-radius:4px;
}
input[type="file"] {
  display: none;
}
#passsub{
  background-color:#00ffce;
  border-radius:5px;
  width:70%;
  max-width:250px;
  height:60px;
  border:none;
  margin:10px;
  position:relative;
  top:60px;
  cursor:pointer;
}
#passsub:hover{
  background-color:#00fff7;
  transition:0.7s
}
#passsub:focus{
  background-color: #00a39e;
  transition:0.3s;
}
</style>
</head>
<body>
    <center>
        <br><br>
        <div class="header">
            <h1>Choose Profile Pic</h1>
        </div>
        <br><br><br><br><br><br>
        <div class ="content">
            <br><br><br>
            <form name="dinomi" method= "post" action="procc.php" enctype="multipart/form-data">
            
            <label class="propicedit">
                  <h2>Choose Profile Picture</h2>
                  <input type="file" id="propicedit" name="newpic"  accept="image/*" Required>
               </label><br><br>
               <a href="main.php">
                  <input type="submit" id="passsub" name="chosenow" value="Continue"><br>
                  <input type="submit" id="passsub" style="background-color:red; color:white;" name="skipnow" value="Skip" formnovalidate><br>
               </a>
            </form>
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