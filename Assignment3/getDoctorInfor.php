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
<h1>Doctor's Information</h1>
<ol>
<?php
$doctorID=$_POST["doctorInfor"];
if(empty($doctorID)){
die("No doctor is chosen!");
}
$query='SELECT * FROM doctor,hospital WHERE doctor.worksinhoscode=hospital.code AND doctor.licensenumber="' . $doctorID . '"';
/* get the information of doctor from table doctor and table hospital */
$result=mysqli_query($connection, $query);
if(!$result){
die("database query failed.");
}
echo"<br>";
while($row=mysqli_fetch_assoc($result)){
/* display all the information about the doctor */
echo "Doctor's first name: " . $row["firstname"] . "</br>";
echo "Doctor's last name:  " . $row["lastname"] . "</br>";
echo "Doctor's license number: " . $row["licensenumber"] . "</br>";
echo "Doctor's licensed date: " . $row["licenseddate"] . "</br>";
echo "Doctor's specialty: " . $row["specialty"] . "</br>";
echo "The name of hospital that " . $row["firstname"] . " " . $row["lastname"] . " works at: " . $row["name"] . " (Located at " . $row["city"] . " " . $row["province"] . ")" ."</br>";
}
mysqli_free_result($result);
?>
</ol>
<?php
mysqli_close($connection);
?>
</body>
</html>
