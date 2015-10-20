<?php
include('header.php');
include('connection.php');
$u_name=$_SESSION['uname'];
$p_word=$_SESSION['pword'];
//Authenticate users
$p_word=sha1($p_word);// encrypt password 	
	$q="select * from admins where uname='$u_name' and password='$p_word'";
	if(mysqli_query($db, $q))
		echo "You have Logged in to the STS<br /><br />";
	else{
		echo 'your password or user name is incorrect!!!!< a href="index.php"/> go back</a>';
		break;
	}
//echo 'Hello <b>'.$uname.' </b> Welcome to the FDU Student Tracking System <br />'; 
$q="select * from students "; // create a query
$result= mysqli_query($db, $q); // execute the query
echo 'there are '.mysqli_num_rows($result).'student in the database<br /><br />';
?>
<a href="add_student_form.php" />ADD STUDENT</a>
<hr>
<center> <h1><b>Student List</b> </h1> 
<table border ="1">
<tr><th>Student ID</th><th>First Name</th><th>Last Name </th> <th> email</th><th> Subject</th><th>More Info</th></tr>
<?php
while($row=mysqli_fetch_array($result)){
echo'<tr><td>'.$row['student_id'].'</td><td>'.$row['fname'].'</td> <td>'.$row['lname'].'</td><td>'.$row['email'].'</td><td>'.$row['subject'].'</td><td><a href="#"/>view </a></td></tr>';
}
echo '<table></center>';
include('footer.php');
?>