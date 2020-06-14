<?php
/* get the doctor who does not treat any patient */
$query='SELECT * FROM doctor WHERE licensenumber NOT IN (SELECT licensenumber FROM treat)';
/*if the query is empty, then display the follow message */
if(empty($query)){
die("There is not any doctor who has no patients!");
}
$result=mysqli_query($connection, $query);
if(!$result){
die("database query failed.");
}
echo '<ol>';
while($row=mysqli_fetch_assoc($result)){
/* display the name of those doctors */
echo '<li>';
echo "Doctor " . $row["firstname"] ." ". $row["lastname"] . "</li>";
}
echo '</ol>';
mysqli_free_result($result);
?> 
