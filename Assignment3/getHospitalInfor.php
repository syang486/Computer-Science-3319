<?php
/*get the data of hospital, in alphabetical ordered by hospital name */
$query='SELECT * FROM hospital ORDER BY name';
if(empty($query)){
die("There is not any hospital!");
}
$result=mysqli_query($connection, $query);
if(!$result){
die("database query failed.");
}
/* get the head doctor information from table doctor and table hospital */
$query1='SELECT * FROM doctor, hospital WHERE headdocid=licensenumber';
$result1=mysqli_query($connection, $query1);
if(!$result1){
die("database query1 failed.");
}
echo "Hospital Name -- Head Doctor's Name -- Start Date As Head Doctor";
echo "<ol>";
/* display the name of hospital, and the name of head doctor and the start date that the doctor becomes a  head doctor */
while($row=mysqli_fetch_assoc($result) and $row1=mysqli_fetch_assoc($result1)){
echo "<li>";
echo $row["name"] . " -- " . $row1["firstname"] . " " . $row1["lastname"] . " -- " . $row["headdate"]; 
}
echo "</ol>";
mysqli_free_result($result);
mysqli_free_result($result1);
?>
