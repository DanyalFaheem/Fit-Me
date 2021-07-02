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
   if($con) 
      { echo "Oracle Connection Successful."; 
        } 
   else 
      { die('Could not connect to Oracle: '); } 
      //getting food id
      $sql_select="Select * FROM   (SELECT * FROM   Food ORDER BY DBMS_RANDOM.RANDOM) WHERE  rownum < 2";
	  $query_id3 = oci_parse($con, $sql_select);
      $runselect = oci_execute($query_id3);
      echo $sql_select;
      if ($runselect) {
        while ($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURNS_NULLS)) {
          $fid = $row["FOODID"];
        }
      }
      //inseritng into diet plan
      $sql_select="insert into DietPlan 
      Values (seq_diet.nextval,{$_POST["TCAL"]}, {$_POST["CAL"]}, '{$fid}')";
	  $query_id3 = oci_parse($con, $sql_select);
      $runselect = oci_execute($query_id3);
      echo $sql_select;
      if ($runselect) {
        echo "Insert Successfully";
      }
      else echo "Insert Failed";
      //getting diet id
      $sql_select="Select * FROM dietplan";
	  $query_id3 = oci_parse($con, $sql_select);
      $runselect = oci_execute($query_id3);
      echo $sql_select;
      if ($runselect) {
        while ($row = oci_fetch_array($query_id3, OCI_BOTH+OCI_RETURNS_NULLS)) {
          $dpl = $row["DIETPLANID"];
        }
      }
      //updating member
      $sql_select= "Update MEMBER Set dietplanID = '$dpl' Where Member_id = '$_POST[MEMBER_ID]'";
	  	$query_id3 = oci_parse($con, $sql_select);
        $runselect = oci_execute($query_id3);
        if($runselect){
            echo "Insertion Successful";
        }
        else echo "Insertion Failed";   
        
?>
</html>
