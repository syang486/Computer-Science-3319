<!DOCTYPE html>
<html>
<head>
<title>CS3319 Assignment3</title>
<link rel="stylesheet" type="text/css" href="assign3.css">
<link href="https://fonts.googlapis.com/cs?family=Mali" rel="stylesheet">   
</head>
<body>
<?php
include 'connectdb.php';
/* connect to database */
?>
<h1>List of Doctors:</h1>
<ol>
<form /*display the information of doctor in getDoctorInfor.php file*/
action="getDoctorInfor.php" method="post">
<?php
$whichName=$_POST["sortName"];
$whichOrder=$_POST["sortOrder"];
$query = 'SELECT * FROM doctor ORDER BY ' .$whichName. ' ' .$whichOrder. '';
/* get the data from table doctor order by firstname/lastname with ascending/decsending order */
$result=mysqli_query($connection, $query);
if(!$result){
die("database order query failed.");
}
echo "Doctor's information that you would like to see:</br>";
while($row=mysqli_fetch_assoc($result)){
//create the button contains the name of doctor
echo'<input type="radio" name="doctorInfor" value="';
echo $row["licensenumber"];
echo '">' . $row["firstname"] . " " . $row["lastname"] . "<br>";
}
mysqli_free_result($result);
?>
<input type="submit" value="Get Doctor Information">
</form>
</ol>
<?php
mysqli_close($connection);
?>
</body>
</html>

