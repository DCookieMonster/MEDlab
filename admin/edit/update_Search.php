<?php
require('../_con.php');

$db_name = "site_db"; //DB name
$tbl_name="search"; // Table name 

// Connect to server and select database.
$db_con = mysqli_connect($db_host, $username, $password,$db_name);

$id=mysqli_real_escape_string($db_con ,$_POST['id']);
$title=mysqli_real_escape_string($db_con ,$_POST['title']);
$description=mysqli_real_escape_string($db_con ,$_POST['description']);
$keywords=mysqli_real_escape_string($db_con ,$_POST['keywords']);
$link=mysqli_real_escape_string($db_con ,$_POST['link']);

// update data in mysql database 
$sql="UPDATE $tbl_name SET title='$title', description='$description', keywords='$keywords', link='$link'
WHERE id='$id'";
$result=mysqli_query($db_con,$sql);

// if successfully updated. 
if($result){
//echo "<script>alert(You successfully updated ID: $id)</script>";
echo "<BR>";
//echo "<a href='viewdata.php'>View result</a>";
header("location:../view.php");

}

else {
echo "ERROR";
}

?>