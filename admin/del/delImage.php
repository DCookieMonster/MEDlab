<?php

//logout after $timeoff in sec
//$timeoff=300;
//if (time()-$_SESSION['time']>$timeoff){
  //  header("location:logout.php");

//}
$_SESSION['time']=time();


require('../_con.php');

$db_name="cms"; // Database name 
$tbl_name="aboutPic"; // Table name


// Connect to server and select database.
$db_con=mysqli_connect("$db_host", "$username", "$password","$db_name")or die("cannot connect"); 

// get value of id that sent from address bar
//$id=$_GET['edit'];
$tbl_name=$_GET['tbl_name'];
$idtmp=$_GET['del'];
//$id=mysqli_real_escape_string($idtmp);
$id=mysqli_real_escape_string($db_con,$idtmp);

// Retrieve data from database 
$sql="DELETE FROM $tbl_name WHERE id='$id'";
$result=mysqli_query($db_con,$sql);
//$rows=mysqli_fetch_array($result);

// close connection 
mysqli_close($db_con);
header("location:../../about.php");



?>
