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
<!-- <img src="backLogin.jpg"> -->

<h1 class="glow"><u>SIGN IN</u></h1>
<form method="post">
	
  <label for="MEMBER_ID">Member ID:</label><br>
	<input type="number" id="MEMBER_ID" name="MEMBER_ID" size="30"><br><br>
	<label for="PASSWORD">Password:</label><br>
	<input type="text" id="PASSWORD" name="PASSWORD" size="30"><br><br>
	<input type="submit" value="Sign In"/>
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
  $mem_id = NULL;   
  $db_user = "scott";   // Oracle username e.g "scott"
  $db_pass = "1234";    // Password for user e.g "1234"
  $con = oci_connect($db_user,$db_pass,$db_sid); 
  if($con){ 
    echo "Oracle Connection Successful."; 
    //$sql_select = "exec SIGNIN({$_POST["MEMBER_ID"]}, '{$_POST["PASSWORD"]}');";
    //echo $sql_select;
    $memid = $_POST["MEMBER_ID"];
    $pass = $_POST["PASSWORD"];
    $sql_select = "select Member_id from users where member_id='$memid' and password='$pass'";
     $query_id3 = oci_parse($con, $sql_select);
     $runselect = oci_execute($query_id3);
     if ($runselect) {
       while ($data = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURNS_NULLS)) {
         $mem_id = $data["MEMBER_ID"];
       }
     }
      if ($mem_id) {
        header("Location: /signinform.php");
        exit();
      }
      else {
        echo "USER NOT THERE";
      }

} 
else{ 
    die('Could not connect to Oracle: '); 
  } 

       
?>

</html>
