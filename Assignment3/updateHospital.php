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
<ol>
<?php
$newName=$_POST["newHospName"];
$oldName=$_POST["dhospital"];
if(empty($newName)){
die("Please enter a new name for hospital!");
}
if(empty($oldName)){
die("Please choose a hospital!");
}
/* update the name of that particular hospital using new inputted name */
$query='UPDATE hospital SET name= "'. $newName .'" WHERE code="'.$oldName.'"';
$result=mysqli_query($connection, $query);
if(!$result){
die("database query1 failed.");
}
/*display the success message */
echo "The name of hospital has updated successfully!";
mysqli_close($connection);
?>
</ol>
</body>
</html>

