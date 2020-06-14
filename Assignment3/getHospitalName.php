<?php
/* get the data from table hospital */
$query='SELECT * FROM hospital';
if(empty($query)){
die("There is not any hospital!");
}
$result=mysqli_query($connection, $query);
if(!$result){
die("database query failed.");
}
echo '<ol>';
/* use select tag to let user choose the hospital */
echo '<select name="dhospital">';
while($row=mysqli_fetch_assoc($result)){
echo '<option value="';
echo $row["code"];
echo '">' . "hospital " . $row["name"]. " (Located at " . $row["city"] . " " . $row["province"] . ")" . "<br>";
}
echo '</select>';
echo '</ol>';
mysqli_free_result($result);
?> 
