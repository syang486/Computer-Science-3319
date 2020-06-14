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
$ohipnum=$_POST["ohip"];
if(empty($ohipnum)){
die("Please enter a patient's OHIP number!");
}
/* get the information of that particular patient from table patient */
$query='SELECT * FROM patient WHERE OHIPnumber="'.$ohipnum.'"';
$result=mysqli_query($connection, $query);
if(!$result){
die("database query failed.");
}
$row=mysqli_fetch_assoc($result);
/* get the infromation of doctors who treats a particular patient */
$query1='SELECT * FROM doctor,treat WHERE doctor.licensenumber=treat.licensenumber AND treat.OHIPnumber="'.$ohipnum.'"';
$result1=mysqli_query($connection, $query1);
if(!$result1){
die("database query1 failed.");
}
/* find the existance of that particular patient */
$query2='SELECT COUNT(OHIPnumber) AS ohip FROM patient WHERE OHIPnumber="'.$ohipnum.'"';
$result2=mysqli_query($connection, $query2);
if(!$result2){
die("database count query2 failed.");
}
$row2=mysqli_fetch_assoc($result2);
/* if that particular patient is exist */
if($row2["ohip"] > 0){
echo '<h1>';
echo "Here is our patient: <br>";
echo '</h1>';
echo '<ol>';
/*display the information of that patient */
echo "Patient's First Name: " . $row["firstname"] . "<br>";
echo "Patient's Last Name: " . $row["lastname"] . "<br>";
echo "Doctor's Name who treat that patient: <br>";
echo '<ol>';
while($row1=mysqli_fetch_assoc($result1)){
echo '<li>';
echo $row1["firstname"] . " " . $row1["lastname"];
}
echo '</ol>';
echo '</ol>';
}else{
/* otherwise, display the message that patient does not exist in the table */
echo '<ol>';
echo "There doesn't exist a patient whose OHIP number is " . "$ohipnum."; 
echo '</ol>';
}
mysqli_close($connection);
?>
</body>
</html>

