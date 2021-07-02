<html>

<head>
<title>Task3</title>
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
   $db_user = "scott";   // Oracle username e.g "scott"
   $db_pass = "1234";    // Password for user e.g "1234"
   $con = oci_connect($db_user,$db_pass,$db_sid); 
    if($con) 
      { echo "Oracle Connection Successful."; 
        
    } 
   else 
      { die('Could not connect to Oracle: '); } 
      $sql_select="Select * from WorkoutPlan w join exercise e on (w.exercise_id = e.exe_name) join musclegroup m on (w.muscle_id = m.mus_name)";
	  		$query_id3 = oci_parse($con, $sql_select);
        	$runselect = oci_execute($query_id3);
           // echo $sql_select;
           echo "<br>Workout PLANS<br>";
           echo "<br>";
	        echo "WorkoutPlanID"." | ";
	        echo "Time"." | ";
			echo "BurnCal"." | ";
			echo "Muscle_ID"." | ";
            echo "Exercise_ID"." | ";
            echo "EXE_NAME"." | ";
            echo "EXE_TYPE"." | ";
            echo "MUS_NAME"." | ";
            echo "MUS_TYPE"." | ";
            echo "MASS"." | ";
            echo "<br>";
           while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  {
            echo "<br>";
	        echo $row["WORKOUTPLANID"]." | ";
	        echo $row["TIME"]." | ";
			echo $row["BURNCAL"]." | ";
			echo $row["MUSCLE_ID"]." | ";
            echo $row["EXERCISE_ID"]." | ";
            echo $row["EXE_NAME"]." | ";
            echo $row["EXE_TYPE"]." | ";
            echo $row["MUS_NAME"]." | ";
            echo $row["MUS_TYPE"]." | ";
            echo $row["MASS"]." | ";
            echo "<br>"; 
        } 
	
	  	  
?>

<body>
    <form action="addWorkout.php" method="post">
    <label for="MEMBER_ID">Member ID:</label><br>
	<input type="text" id="MEMBER_ID" name="MEMBER_ID"><br><br>
    <label for="WORKOUTPLANID">Workout Plan ID:</label><br>
	<input type="text" id="WORKOUTPLANID" name="WORKOUTPLANID"><br>
	<br>
	<br>
  <input type="submit" value="Enter Values"/>
</form>

</body>
</html> 