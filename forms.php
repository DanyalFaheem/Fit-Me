<html>
 
<head>
<title>Database connection </title>
<style>
body {
  background-image: url(back7.jpg);
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
    position:relative;
    opacity:0.5;

}
</style>
</head>
 
 
<?php  // creating a database connection 
 
 $db_sid = 
 "(DESCRIPTION =
  (ADDRESS = (PROTOCOL = TCP)(HOST=LAPTOP-VQD15OIM)(PORT = 1521))
  (CONNECT_DATA =
    (SERVER = DEDICATED)
    (SERVICE_NAME = orcl.168.1.2)
  )
)"; 
$gender = $_POST["GENDER"];
$weight = $_POST["WEIGHT"];
$height = $_POST["HEIGHT"];
$age =$_POST["AGE"];
if($gender == "F"){
  $mcal= 655 + (9.6 * $weight ) + (1.8 * $height) - (4.7 * $age);
}
else if ($gender == "M"){
  $mcal = 66 + (13.7 *$weight) + (5 * $height) - (6.8 * $age);
 }
 $heightm = ($height * $height) / 10000;
 $bmi = (int)($weight/$heightm); 
   $db_user = "scott";   // Oracle username e.g "scott"
   $db_pass = "1234";    // Password for user e.g "1234"
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      { echo "Oracle Connection Successful.";
        $sql_select = "insert into member values(
          seq_member.nextval,
          '{$_POST["NAME"]}',
          '{$_POST["GENDER"]}',
          {$_POST["AGE"]},
          {$bmi},
          {$_POST["HEIGHT"]},
          {$_POST["WEIGHT"]},
          '{$_POST["ACTIVITY"]}',
          {$mcal},NULL,NULL)";
      echo $sql_select;
      $query_id3 = oci_parse($con, $sql_select);
      $runselect = oci_execute($query_id3);
      if ($runselect) {
         echo "Insertion Successful!";
        }
      else {	
         echo "	Insertion Failed!";
      }
      $sql_select = "Select MEMBER_ID from member";
      echo $sql_select;
      $query_id3 = oci_parse($con, $sql_select);
      $runselect = oci_execute($query_id3);
      $mID = 1;
      while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)) 
      	{
          $mID = $row["MEMBER_ID"];
		 	}
      $sql_select = "insert into Users values(
        {$mID},
        '{$_POST["PASSWORD"]}',
        'Active')";
    echo $sql_select;
    $query_id3 = oci_parse($con, $sql_select);
    $runselect = oci_execute($query_id3);  
    } 
   else 
      { die('Could not connect to Oracle: '); } 
?>
<body>
<A HREF="diet.html"><button class="button">Create a Diet Plans</button></A>
<A HREF="workout.html"><button class="button">Create a Workout Plan</button></A>
<A HREF="logform.html"><button class="button">Daily Log</button></A>
<A HREF="report.html"><button class="button">Report</button></A>
</body>
</html>