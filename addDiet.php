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
   $memID = $_POST["MEMBER_ID"];
   $dpl = $_POST["DIETPLANID"];
   $db_user = "scott";   // Oracle username e.g "scott"
   $db_pass = "1234";    // Password for user e.g "1234"
   $con = oci_connect($db_user,$db_pass,$db_sid); 
    if($con) 
      { echo "Oracle Connection Successful."; 
        $sql_select= "Update MEMBER Set dietplanID = '$dpl' Where Member_id = '$memID'";
	  	$query_id3 = oci_parse($con, $sql_select);
        $runselect = oci_execute($query_id3);
        if($runselect){
            echo "Insertion Successful";
        }
        else echo "Insertion Failed";   
          
    } 
   else 
      { die('Could not connect to Oracle: '); } 
        
          
?>
</html> 