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

<h1 class="glow"><u>Workout Plan</u></h1>
<form action="addNewWorkout.php" method="post">
  <label for="MEMBER_ID">Member ID:</label><br>
	<input type="text" id="MEMBER_ID" name="MEMBER_ID"><br><br>
    
  <label for="TIME">Time(in minutes):</label><br>
	<input type="text" id="TIME" name="TIME"><br><br>
  <label for="BCAL">Calorie Burn Target:</label><br>
	<input type="text" id="BCAL" name="BCAL"><br>
	<br>
	<br>
  <input type="submit" value="Enter Values"/>
</form>


</body>
</html>
