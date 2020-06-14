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
/* connect to databases */
?>
<?php
$whichDoctor=$_POST["chooseDoctor"];
$newLicensedate=$_POST["changeLicense"];
if(empty($whichDoctor)){
die("Please select one doctor!");
}
if(empty($newLicensedate)){
die("Please enter a new license date for that doctor");
}
/* update the license date of that doctor using new license date */
$query='UPDATE doctor SET licenseddate = "' . $newLicensedate . '" WHERE licensenumber= "' . $whichDoctor . '"';
$result=mysqli_query($connection, $query);
if(!$result){
die("database query failed.");
}
echo "License date of that doctor has updated successfully!<br>";
/* display the new license date of that doctor */
echo "Here is the new list:<br>";
$query1='SELECT * FROM doctor';
$result1=mysqli_query($connection, $query1);
if(!$result1){
die("database query1 failed.");
}
echo "<ol>";
/* display the new information of that doctor */
while($row=mysqli_fetch_assoc($result1)){
echo '<li>';
echo $row["firstname"] . " " . $row["lastname"] . "--" . $row["specialty"] . "--" . $row["licenseddate"] . '</li>';
}
mysqli_free_result($result1);
echo "</ol>";
?>
</ol>
<?php
mysqli_close($connection);
?>
</body>
</html>

