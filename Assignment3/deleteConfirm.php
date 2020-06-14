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
$decide=$_POST["decision"];
if(empty($decide)){
die("Please choose a button!");
}
/* find the existance of that particular doctor */
$query3='SELECT COUNT(licensenumber) AS numDoctor FROM doctor WHERE licensenumber="'.$decide.'"';
/* delete all the information related to that particular doctor */
$query='DELETE FROM treat WHERE licensenumber= "'.$decide.'"';
$query1='DELETE FROM hospital WHERE headdocid= "'.$decide.'"';
$query2='DELETE FROM doctor WHERE licensenumber= "'.$decide.'"';
$result3=mysqli_query($connection, $query3);
if(!mysqli_query($connection, $query)){
die("database delete query failed." .mysqli_error($connection));
}
if(!mysqli_query($connection, $query1)){
die("database delete query1 failed." .mysqli_error($connection));
}
if(!mysqli_query($connection, $query2)){
die("database delete query2 failed." .mysqli_error($connection));
}
$row3=mysqli_fetch_assoc($result3);
/* if the user is still want to delete this doctor, then display the success message*/
/* otherwise, display the failure message */
if($row3["numDoctor"] > 0){
echo "Doctor has deleted successfully!";
}else{
echo "Doctor is still existing!";
}
mysqli_close($connection);
?>
</ol>
</body>
</html>
