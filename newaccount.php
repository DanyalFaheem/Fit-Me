<html>
 
<head>
<title>Database connection </title>
<style>
body {
  background-image: url(back5.jpg);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  opacity:1;
  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
}
.glow {
  font-size: 50px;
  font-weight: bold;
  color: white;
  text-align: center;
  position:relative;
  margin-top: 100px;
  text-shadow: 
    0 0 20px black,
    0 0 30px blue,
    0 0 40px skyblue, 
    0 0 50px skyblue, 
    0 0 60px skyblue, 
    0 0 70px skyblue, 
    0 0 80px skyblue;
}
.button {
  background-color: transparent;
  color: white;
  padding: 4px 2px;
  font-family: 'Courier New', Courier, monospace;
  font-size: 40px;
  margin-left: 80px;
  margin-top: 50px;
  text-shadow: 
    0 0 20px black,
    0 0 30px yellowgreen,
    0 0 40px yellow, 
    0 0 50px yellow;
}
form{
    text-align: center;
    font-family: 'Courier New', Courier, monospace;
    font-size: 35px;
    font-weight: bold; 
    position:relative;
    color: white;
    padding: 20px 40px;
    
}
img{
    width:500px;
    height:800px;
    margin-left:400px;
    
    position:absolute;

}
</style>
</head>
 
<body>
<hr>
<img src="backLogin.jpg">

<h1 class="glow"><u>Create an Account</u></h1>
<form action="forms.php" method="post">
  <label for="NAME">Name:</label><br>
	<input type="text" id="NAME" name="NAME"><br>
  <label for="PASSWORD">Password:</label><br>
	<input type="text" id="PASSWORD" name="PASSWORD"><br>
	<br>
  <label for="GENDER">Gender:</label><br>
	  <select name="GENDER" id="GENDER">
      <option value="M">Male</option>
      <option value="F">Female</option>
    </select>
    <br>
	<label for="AGE">Age:</label><br>
	<input type="text" id="AGE" name="AGE"><br>
	<br>
	<label for="HEIGHT">Height(in cm):</label><br>
	<input type="text" id="HEIGHT" name="HEIGHT"><br>
	<br>
	<label for="WEIGHT">Weight(in kgs):</label><br>
	<input type="text" id="WEIGHT" name="WEIGHT"><br>
	<br>
  <label for="ACTIVITY">Activity:</label><br>
	  <select name="ACTIVITY" id="ACTIVITY">
      <option value="Little">Little or no exercise</option>
      <option value="Some">Somewhat active(1-3 days)</option>
      <option value="High">Highly active</option>
    </select>
	<br>
  <input type="submit" value="Create Account"/>
</form>

</body>

<?php  // creating a database connection 
 
 $db_sid = 
 "(DESCRIPTION =
  (ADDRESS = (PROTOCOL = TCP)(HOST=LAPTOP-VQD15OIM)(PORT = 1521))
  (CONNECT_DATA =
    (SERVER = DEDICATED)
    (SERVICE_NAME = orcl.168.1.2)
  )
)"; 
  $db_user = "scott";   // Oracle username e.g "scott"
  $db_pass = "1234";    // Password for user e.g "1234"
  $con = oci_connect($db_user,$db_pass,$db_sid); 
  if($con){ 
    echo "Oracle Connection Successful.";
  }  
  else{ 
    die('Could not connect to Oracle: '); 
  } 
?>
</html>
