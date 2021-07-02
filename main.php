<html>
<head>
<style>
body {
    background-image: url(Background.jpg);
  background-color: black;
  font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
}
.glow {
  font-size: 100px;
  font-weight: bold;
  color: white;
  margin-left: 150px;
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
  )";            // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
  ?>
<body>
    <h1 class="glow"><u>FIT ME</u></h1>
    <A HREF="signin.php"><button class="button">Sign In</button></A>
    <br>
    <A HREF="newaccount.php"><button class="button">Create an account</button></A>
</body>
</html>
