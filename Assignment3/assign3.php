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
/* connect to connectdb.php */
?>
<h1>Welcome to Doctor's Page</h1>
<h2>Our Doctors</h2>
<form action="sortDoctor.php" method="post">
Sort the doctors by:<br>
<ol>
<input type="radio" name="sortName" value="firstname">FirstName<br>
<input type="radio" name="sortName" value="lastname">LastName<br>
</ol>
Sort the doctors by:<br>
<ol>
<input type="radio" name="sortOrder" value="ASC">Ascending<br>
<input type="radio" name="sortOrder" value="DESC">Descending<br>
</ol>
<input type="submit" value="Get List of Doctors">
</form>
<p>
<hr>
<p>
<h1>Give a License Date for the Doctor</h1>
<h2>Choose the Doctor that you would like to change his/her license date:</h2>
<form action="changeLicense.php" method="post">
<?php
include 'getDoctorInfor1.php'
/*display the information of doctor */
?>
Enter new License Date for that doctor: <input type="text" name="changeLicense"><br>
<input type="submit" value="Change License Date of the Doctor">
</form>
<p>
<hr>
<p>
<h1>Add New Doctor</h1>
<form action="addNewDoctor.php" method="post">
New Doctor's First Name: <input type="text" name="dfname"><br>
New Doctor's Last Name: <input type="text" name="dlname"><br>
New Doctor's License Number: <input type="text" name="dlicensenum"><br>
New Doctor's Licensed Date: <input type="text" name="dlicensedate"><br>
New Doctor's Specialty: <input type="text" name="dspecialty"><br>
The Name of Hospital where new doctor works at:<br>
<?php
include 'getHospitalName.php'
/*display the name of hospital*/
?>
<input type="submit" value="Add New Doctor">
</form>
<p>
<hr>
<p>
<h1>Delect An Existing Doctor</h1>
<form action="deleteDoctor.php" method="post">
<?php
include 'getDoctorName.php';
/* display the name of doctor */
?>
<input type="submit" value="Delete that Doctor">
</form>
<p>
<hr>
<p>
<h1>Update a Hospital's Name</h1>
<form action="updateHospital.php" method="post">
<?php
include 'getHospitalName.php'
/* display the name of hospital */
?>
New name for the hospital: <input type="text" name="newHospName"><br>
<input type="submit" value="Update Hospital's Name">
</form>
<p>
<hr>
<p>
<h1>Hospital's Information</h1>
<?php
include 'getHospitalInfor.php';
/* display the information of hospital */
?>
<p>
<hr>
<p>
<h1>Find the Patient</h1>
<form action="findPatient.php" method="post">
Enter a OHIP number: <input type="text" name="ohip"><br>
<input type="submit" value="Find that Patient">
</form>
<p>
<hr>
<p>
<h1>Assign a Doctor to Treat a Patient</h1>
<form action="assignTreat.php" method="post">
<h2>Choose a Doctor</h2>
<?php
include 'getDoctorName.php';
/* display the name of doctor */ 
?>
<h2>Choose a Patient</h2>
<?php
include 'getPatientName.php';
/* display the name of patient */
?>
<input type="submit" value="ASSIGN">
</form>
<p>
<hr>
<p>
<h1>Stop a Doctor from Treating a Patient</h1>
<form action="stopTreat.php" method="post">
<h2>Choose a Doctor</h2>
<from action="stopTreat.php" method="post">
<?php
include 'getDoctorName.php';
/* display the name of doctor */
?>
<h2>Choose a Patient</h2>
<?php
include 'getPatientName.php';
/* diplay the name of patient */
?>
<input type="submit" value="STOP">
</form>
<p>
<hr>
<p>
<h1>Doctors Who has no Patients</h1>
<?php
include 'getDoctorNoPatient.php';
/* display the doctor with no patient */
?>
<?php
mysqli_close($connection);
?>
</body>
</html>
