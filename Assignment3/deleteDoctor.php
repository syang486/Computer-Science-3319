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
/* connect  to database */
?>
<form action="deleteConfirm.php" method="post">
<?php
$doctorID=$_POST["existDoctor"];
if(empty($doctorID)){
die("Please choose a doctor!");
}
/* find the data from table treat and table patient */
$query='SELECT * FROM treat, patient WHERE patient.OHIPnumber=treat.OHIPnumber AND licensenumber= "' .$doctorID. '"';
$result=mysqli_query($connection, $query);
if(!$result){
die("database query failed.");
}
/* find the number of patient who is treated by the same doctor */
$query1='SELECT COUNT(OHIPnumber) AS numtreat FROM treat WHERE licensenumber= "' .$doctorID. '"';
$result1=mysqli_query($connection, $query1);
/* find the data of that particular doctor in table doctor */
$query2='SELECT * FROM doctor WHERE licensenumber="'.$doctorID.'"';
$result2=mysqli_query($connection, $query2); 
if(!$result1){
die("database count query1 failed.");
}
if(!$result2){
die("database query2 failed.");
}
$row1=mysqli_fetch_assoc($result1);
$row2=mysqli_fetch_assoc($result2);
/* if the doctor treats one or more than one patients, display the name of these patients */ 
if($row1["numtreat"] > 0){ 
echo '<h1>';
echo "Doctor ". $row2["firstname"] . " " . $row2["lastname"] . " is treating:";
echo '</h1>';
echo '<ol>';
while($row=mysqli_fetch_assoc($result)){ 
echo '<li>'; 
echo "patient: " . $row["firstname"] . " " . $row["lastname"];
}
echo '</ol><br>';
echo "There are ". $row1["numtreat"] ." patients are treated by doctor ".$row2["firstname"] . " " . $row2["lastname"] . "<br>"; 
echo "Are you still willing to delete this doctor?" . "<br>";
echo '<ol>';
/* create two buttons for choosing the decision */ 
echo '<input type="radio" name="decision" value="'.$doctorID.'">Yes,I still want to' . "<br>";
echo '<input type="radio" name="decision" value="N">No, I do not' . '<br>';
echo '<input type="submit" value="Decision!">';
echo '</ol>';
}else{
/* delete all the information related to this doctor */
$query4='DELETE FROM hospital WHERE headdocid= "'.$doctorID.'"';
$query5='DELETE FROM doctor WHERE licensenumber= "'.$doctorID.'"';
$result4=mysqli_query($connection, $query4);
$result5=mysqli_query($connection, $query5);
if(!$result4){
die("database delete query failed.".mysqli_error($connection));
}
if(!$result5){
die("database delete query failed.".mysqli_error($connection));
}
echo "Doctor has deleted successfully!";
}
?>
</form>
<?php
mysqli_close($connection);
?>
</body>
</html>
