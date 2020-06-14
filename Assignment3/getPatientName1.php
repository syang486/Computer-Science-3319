<!DOCTYPE html>
<html>
<head>
<title>CS3319 Assignment3</title>
<link rel="stylesheet" type="text/css" href="assign3.css">
<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>

<?php
$doctor=$_POST["existDoctor"];
$query='SELECT * FROM patient, treat WHERE patient.OHIPnumber=treat.OHIPnumber AND treat.licensenumber="'.$doctor.'"';
$query='SELECT COUNT(
$result=mysqli_query($connection, $query);
if(!$result){
die("database query failed.");
}
echo '<ol>';
while($row=mysqli_fetch_assoc($result)){
/* create the button contains the name of patient */
echo '<input type="radio" name="pname" value="';
echo $row["OHIPnumber"];
echo '">' . $row["firstname"] . " " . $row["lastname"]. "<br>";
}
echo '</ol>';
mysqli_free_result($result);
?>
