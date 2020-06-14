<!DOCTYPE html>
<html>
<head>
<title>CS3319 Assignment3</title>
<link rel="stylesheet" type="text/css" href="assign3.css">
<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
</head>
<body>
<ol>
<?php
include 'connectdb.php';
/* connect to database */
?>
<?php
$patient=$_POST["pname"];
$doctor=$_POST["existDoctor"];
/* if $patient is empty */
if(empty($patient)){
die("Please choose a patient!");
}
/* if $doctor is empty */
if(empty($doctor)){
die("Please choose a doctor!");
}
/* assign that patient to treat with that doctor */
$query='INSERT INTO treat values("'.$patient.'", "'.$doctor.'")';
if(!mysqli_query($connection, $query)){
die("Error: insert failed ".mysqli_error($connection));
}
/* display success message */
echo "The doctor is treating the patient now! <br>";
$query1='SELECT * FROM doctor WHERE licensenumber= "'.$doctor.'"';
$result1=mysqli_query($connection, $query1);
if(!$result1){
die("Error: select failed ".mysqli_error($connection));
}
$row1=mysqli_fetch_assoc($result1);
/* display the new information about the doctor and those patient who treated by this doctor */
echo "Now, Doctor " . $row1["firstname"] , " " . $row1["lastname"] . " is treating: <br>";
$query2='SELECT * FROM patient, treat WHERE patient.OHIPnumber=treat.OHIPnumber AND treat.licensenumber="'.$doctor.'"';
$result2=mysqli_query($connection, $query2);
if(!$result2){
die("Error: select failed ".mysqli_error($connection));
}
echo '<ol>';
while($row2=mysqli_fetch_assoc($result2)){
echo '<li>';
echo $row2["firstname"] . " " . $row2["lastname"];
}
echo '</ol>';
mysqli_close($connection);
?>
</ol>
</body>
</html>

