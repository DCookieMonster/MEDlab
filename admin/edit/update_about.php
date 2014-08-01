<?php
require('../con.php');

$db_name = "cms"; //DB name
$tbl_name="about"; // Table name 
//$id=$_POST['id'];
//$title=$_POST['title'];
//$description=$_POST['description'];
//$keywords=$_POST['keywords'];
//$link=$_POST[   'link'];

$id=mysql_real_escape_string($_POST['id']);
$text=mysql_real_escape_string($_POST['text']);


//$db_host = "localhost";
//$username = "root";
//$password = "9670";
//$db_name = "dor";

// Connect to server and select database.
$db_con = mysql_connect($db_host, $username, $password);
$result = mysql_select_db($db_name, $db_con);
// update data in mysql database 
$sql="UPDATE $tbl_name SET content='$text'
WHERE id='$id'";
$result=mysql_query($sql,$db_con);

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