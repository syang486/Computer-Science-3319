<!DOCTYPE html>
<html>
<head>
<title>CS3319 Assignment3</title>
<link rel="stylesheet" type="text/css" href="assign3.css">
<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<?php
include 'connectdb.php'
?>
<?php
$doctor=$_POST["existDoctor"];
$patient=$_POST["treatPatient"];
$query='DELETE FROM treat WHERE licensenumber="'.$doctor.'" AND OHIPnumber="'.$patient.'"';
$result=mysqli_query($connection, $query);
if(!$result){
die("Error: delete failed ".mysqli_error($connection));
}
$query1='SELECT * FROM doctor WHERE licensenumber="'.$doctor.'"';
$query2='SELECT * FROM patient WHERE OHIPnumber="'.$patient.'"';
$result1=mysqli_query($connection, $query1);
$result2=mysqli_query($connection, $query2);
if(!$result1){
die("Error: select failed ".mysqli_error($connection));
}
if(!$result2){
die("Error: select failed ".mysqli_error($connection));
}
$row1=mysqli_fetch_assoc($result1);
$row2=mysqli_fetch_assoc($result2);
echo "Doctor " . $row1["firstname"] . " " . $row1["lastname"] . " does not treat the patient " . $row2["firstname"] . " " . $row2["lastname"] . " anymore";
?>
<?php
mysqli_close($connection);
?>
</body>
</html>


