<?php
require('con.php');

//$db_host="localdb_host"; // db_host name 
//$username="root"; // Mysql username 
//$password="9670"; // Mysql password 
$db_name="site_db"; // Database name 
$tbl_name="members"; // Table name 

// Connect to server and select databse.
mysql_connect("$db_host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername'and `password` = ENCRYPT('$mypassword', `password`)";
$result=mysql_query($sql);
$row = mysql_fetch_array($result);
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
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
