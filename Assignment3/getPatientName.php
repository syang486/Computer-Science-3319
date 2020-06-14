<?php
/* get the data from table patient */
$query='SELECT * FROM patient';
if(empty($query)){
die("There is no any patient!");
}
$result=mysqli_query($connection, $query);
if(!$result){
die("database query failed.");
}
echo '<ol>';
while($row=mysqli_fetch_assoc($result)){
/* create the button contains the name of patient */
echo '<input type="radio" name="pname" value="';
echo $row["OHIPnumber"];
echo '">' . $row["firstname"] . " " . $row["lastname"]. "<br>";
}
echo '</ol>';
mysqli_free_result($result);
?>
