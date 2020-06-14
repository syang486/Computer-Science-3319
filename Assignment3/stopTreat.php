<!DOCTYPE html>
<html>
<head>
<title>CS3319 Assignment3</title>
<link rel="stylesheet" type="text/css" href="assign3.css">
<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<?php
include 'connectdb.php';
/* connect to database */
?>
<?php
$doctor=$_POST["existDoctor"];
$patient=$_POST["pname"];
/* if $doctor is empty then display the follow message */
if(empty($doctor)){
die("Please choose a doctor!");
}
/* if $patient is empty then display the follow message */
if(empty($patient)){
die("Please choose a patient!");
}
/* find the name of patient */
$query='SELECT * FROM patient WHERE OHIPnumber="'.$patient.'"';
$result=mysqli_query($connection, $query);
if(!$result){
die("Error query failed ".mysqli_error($connection));
}
$row=mysqli_fetch_assoc($result);
/* find the name of doctor */
$query1='SELECT * FROM doctor WHERE licensenumber="'.$doctor.'"';
$result1=mysqli_query($connection, $query1);
if(!$result1){
die("Error query1 failed ".mysqli_error($connection));
}
$row1=mysqli_fetch_assoc($result1);
/* find the realtionship between the particular doctor and the particular patient */
$query2='SELECT COUNT(OHIPnumber) AS num FROM treat WHERE licensenumber="'.$doctor.'" AND OHIPnumber="'.$patient.'"';
$result2=mysqli_query($connection, $query2);
if(!$result2){
die("Error count query2 failed ".mysqli_error($connection));
}
$row2=mysqli_fetch_assoc($result2);
/* if the doctor does not treat with that patient */
if($row2["num"] == 0){
echo "Patient " . $row["firstname"] . " " . $row["lastname"] . " is not treated by Doctor " . $row1["firstname"] . " " . $row1["lastname"] . "<br>";
echo "Please choose a different doctor or a different patient!";
}else{ 
/* delete the realtionship between the doctor and the patient */
$query3='DELETE FROM treat WHERE licensenumber="'.$doctor.'" AND OHIPnumber="'.$patient.'"';
if(!mysqli_query($connection, $query3)){
die("Error delete query failed ".mysqli_error($connection));
}
/* display the success message */
echo "Patient " . $row["firstname"] . " " . $row["lastname"] . " is not treated by Doctor " . $row1["firstname"] . " " . $row1["lastname"] . " anymore";
}
?>
<?php
mysqli_close($connection);
?>
</body>
</html>

