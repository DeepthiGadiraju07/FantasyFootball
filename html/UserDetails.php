<!DOCTYPE html>
<head>
<title>User Registration Details</title>
</head>
<body>
<p>Your username has been successfully stored in our database. Now, tell us about yourself.</p>
<form action="" method="POST">
<p>
<label>First Name</label>
 <input type="text" id="FirstName" name="FirstName" >
</p>
<p>
<label>Last Name</label>
 <input type="text" id ="LastName" name="LastName">
</p>
<p>
<p>
<label>Email</label>
 <input type="text" id ="Email" name="Email">
</p>
<p>
<input type="submit" value="Submit" name="Submit">
</p>
</form>
<?php
session_start();
#only if submit button is clicked
if(isset($_POST['Submit'])){
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$Email=$_POST['Email'];
$database="Fantasyfootball";
$Username=$_SESSION['Username'];
//get username and data from session

#echo "Attempting to connect to dbms\n";
$Connection=mysqli_connect("localhost","root","deepthi123") or die("Database connection failed. Please check your connection");
#echo "Connected to Mariadb\n";
mysqli_select_db($Connection, $database) or die("Database not found");
#echo "Connected to database $database\n";


# now insert into that table 
$insertion_query = "insert into UserDetails(Username, Firstname, Lastname, Email) values ('$Username','$FirstName', '$LastName', '$Email')"; 

$insertion_output = mysqli_query($Connection, $insertion_query);
   if(mysqli_error($Connection)){
     echo "Error in insertion. Check query";
   }
    else{
     echo "User details successfully inserted";
     header("location:Login1.php");
   }
}
?>
</body>
</html>

