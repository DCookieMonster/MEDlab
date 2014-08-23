<?php
require('../_con.php');

$db_name = "cms"; //DB name
$tbl_name="about"; // Table name 
//$id=$_POST['id'];
//$title=$_POST['title'];
//$description=$_POST['description'];
//$keywords=$_POST['keywords'];
//$link=$_POST[   'link'];
// Connect to server and select database.
$db_con = mysqli_connect($db_host, $username, $password,$db_name);

$id=mysqli_real_escape_string($db_con,$_POST['id']);
$text=mysqli_real_escape_string($db_con,$_POST['text']);


//$db_host = "localhost";
//$username = "root";



// update data in mysql database 
$sql="UPDATE $tbl_name SET content='$text'
WHERE id='$id'";
$result=mysqli_query($db_con,$sql);

// if successfully updated. 
if($result){
//echo "<script>alert(You successfully updated ID: $id)</script>";
echo "<BR>";
//echo "<a href='viewdata.php'>View result</a>";
header("location:../view/viewabout.php");

}

else {
echo "ERROR";
}

?>