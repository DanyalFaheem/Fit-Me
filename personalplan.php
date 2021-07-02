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
        $sql_select="Select * FROM   (SELECT * FROM   DietPlan natural join WorkoutPlan ORDER BY DBMS_RANDOM.RANDOM) WHERE  rownum < 3";
	  	$query_id3 = oci_parse($con, $sql_select);
        $runselect = oci_execute($query_id3);
            echo "<br>Personalization PLANS<br>";
            echo "<br>";
	        echo "DIETPLANID"." | ";
	        echo "TARGETCAL"." | ";
			echo "CALCOUNT"." | ";
			echo "FOODID"." | ";

            echo "WorkoutPlanID"." | ";
	        echo "Time"." | ";
			echo "BurnCal"." | ";
			echo "Muscle_ID"." | ";
            echo "Exercise_ID"." | ";
            echo "<br>";
           while($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURN_NULLS)) 
      	  {
            echo "<br>";
            echo $row["DIETPLANID"]." | ";
	        echo $row["TARGETCAL"]." | ";
			echo $row["CALCOUNT"]." | ";
			echo $row["FOODID"]." | ";
            
	        echo $row["WORKOUTPLANID"]." | ";
	        echo $row["TIME"]." | ";
			echo $row["BURNCAL"]." | ";
			echo $row["MUSCLE_ID"]." | ";
            echo $row["EXERCISE_ID"]." | ";
            echo "<br>"; 
        } 
	
	  	  
?>
</html> 