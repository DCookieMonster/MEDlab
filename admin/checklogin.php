<?php
require('_con.php');

//$db_host="localdb_host"; // db_host name 
//$username="root"; // Mysql username 
//$password="pass"; // Mysql password 
$db_name="site_db"; // Database name 
$tbl_name="members"; // Table name 

// Connect to server and select databse.
$db_con=mysqli_connect("$db_host", "$username", "$password","$db_name")or die("cannot connect"); 

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($db_con,$myusername);
$mypassword = mysqli_real_escape_string($db_con,$mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername'and `password` = ENCRYPT('$mypassword', `password`)";
$result=mysqli_query($db_con,$sql);
$row = mysqli_fetch_array($result);
// Mysqli_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
session_start ();
$_SESSION['time']=time();
$_SESSION['howLong']=600;
$_SESSION['myusername']=$myusername;
$_SESSION['mypassword']=$mypassword;
$_SESSION['tag']=$row['tag'];
if ($_SESSION['tag']!="admin")
{
	header("location:../members/mem.php?tag=".$row['tag']."");
	
}
else{
	header("location:dash.php");
}
}
else {
echo "Wrong Username or Password";
}
?>
