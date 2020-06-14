<?php
/* get the data from table doctor */
$query='SELECT * FROM doctor';
if(empty($query)){
die("there is no any doctor!");
}
$result=mysqli_query($connection, $query);
if(!$result){
die("database query failed.");
}
echo '<ol>';
while($row=mysqli_fetch_assoc($result)){
/* create the button contains doctor's name */
echo '<input type="radio" name="existDoctor" value="';
echo $row["licensenumber"];
echo '">' . $row["firstname"]. " " . $row["lastname"] . "<br>";
}
echo '</ol>';
mysqli_free_result($result);
?>
