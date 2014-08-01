<?php

//logout after $timeoff in sec
//$timeoff=300;
//if (time()-$_SESSION['time']>$timeoff){
  //  header("location:logout.php");

//}
$_SESSION['time']=time();



require('../con.php');

$db_name="site_db"; // Database name 
$tbl_name="search"; // Table name


// Connect to server and select database.
mysql_connect("$db_host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// get value of id that sent from address bar
//$id=$_GET['edit'];
$tbl_name=$_GET['tbl_name'];
$idtmp=$_GET['del'];
//$id=mysql_real_escape_string($idtmp);
$id=mysql_real_escape_string($idtmp);

// Retrieve data from database 
$sql="DELETE FROM $tbl_name WHERE id='$id'";
$result=mysql_query($sql);
//$rows=mysql_fetch_array($result);

// close connection 
mysql_close();
header("location:../view/view".$tbl_name.".php");



?>
