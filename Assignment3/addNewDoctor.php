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
<h1>Here are the new doctors:</h1>
<ol>
<?php
/* create variable that store the value for new doctor */
$fname=$_POST["dfname"];
$lname=$_POST["dlname"];
$licensenum=$_POST["dlicensenum"];
$licensedate=$_POST["dlicensedate"];
$specialty=$_POST["dspecialty"];
$hospital=$_POST["dhospital"];
/* count for the number of that particular doctor in the table*/
if(empty($fname)){
die("Please enter doctor's firstname!");
}
if(empty($lname)){
die("Please enter doctor's lastname!");
}
if(empty($licensenum)){
die("Please enter doctor's license number!");
}
if(empty($licensedate)){
die("Please enter doctor's license date!");
}
if(empty($specialty)){
die("Please enter doctor's specialty!");
}
if(empty($hospital)){
die("Please enter the name of hospital that doctor works at!");
}
$query='SELECT COUNT(licensenumber) AS count FROM doctor WHERE licensenumber="'.$licensenum.'"';
$result=mysqli_query($connection, $query);
if(!$result){
die("Error:count failed".mysqli_error($connection));
}
$row=mysqli_fetch_assoc($result);
/* if the doctor is already exist, then do nothing */
if($row["count"] >0){
echo "The doctor has already exist!";
}else{
/* insert the new doctor into the table doctor */
$query1='INSERT INTO doctor value("' .$fname. '", "' .$lname. '", "' .$licensenum. '", "' .$licensedate. '", "' .$specialty. '", "' .$hospital .'")';
if(!mysqli_query($connection, $query1)){
die("Error:insert failed".mysqli_error($connection));
}
/* add hospital code into the table doctor */
$query2='UPDATE doctor SET worksinhoscode="'.$hospital.'"  WHERE licensenumber="' . $licensenum . '"';
if(!mysqli_query($connection, $query2)){
die("Error:update failed" . mysqli_error($connection));
}
echo "New Doctors was added!";
}
mysqli_close($connection);
?>
</ol>
</body>
</html>
