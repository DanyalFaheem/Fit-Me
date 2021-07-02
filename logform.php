<html>
 
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
    $dpl = NULL;
    $wpl = NULL;  
  //getting dietplanID and workoutplanID
    $memID = $_POST["MEMBER_ID"];
    $sql_select="select dietplanID, workoutPlanID from member where member_id = '$memID'";
	$query_id3 = oci_parse($con, $sql_select);
    $runselect = oci_execute($query_id3);
    echo $sql_select;
    if ($runselect) {
    while ($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURNS_NULLS)) {
          $dpl = $row["DIETPLANID"];
          $wpl = $row["WORKOUTPLANID"];
        }
    }
    //inserting log 
    $sql_select= "insert into DailyLog Values('{$_POST["EX_DONE"]}', {$_POST["INTAKE"]}, SYSDATE, 'Deficit', '{$dpl}', '{$wpl}', {$memID})";
	$query_id3 = oci_parse($con, $sql_select);
    $runselect = oci_execute($query_id3);
    if($runselect){
         echo "Insertion Successful";
    }
    else echo "Insertion Failed";   
      
?>
</html>
