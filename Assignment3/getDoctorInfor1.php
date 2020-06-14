<?php
$query="SELECT * FROM doctor";
/* get the data from table doctor */
if(empty($query)){
die("There is not any doctor!");
}
$result=mysqli_query($connection, $query);
if(!$result){
die("database query failed.");
}
echo "FirstName LastName -- Specialty -- License Date:</br>";
echo "<ol>";
/* display the name, specialty and license date of the doctor */
while($row=mysqli_fetch_assoc($result)){
/* create a button contains the information of the doctor */
echo '<input type="radio" name="chooseDoctor" value="';
echo $row["licensenumber"];
echo '">' . $row["firstname"] . " " . $row["lastname"] . "--" . $row["specialty"] . "--" . $row["licenseddate"] . "</br>"; 
}
mysqli_free_result($result);
echo "</ol>";
?>
