<?php
require('../con.php');

$db_name = "site_db"; //DB name
$tbl_name="publications"; // Table name 
//$id=$_POST['id'];
//$title=$_POST['title'];
//$description=$_POST['description'];
//$keywords=$_POST['keywords'];
//$link=$_POST[   'link'];

$id=mysql_real_escape_string($_POST['id']);
$title=mysql_real_escape_string($_POST['title']);
$abstract=mysql_real_escape_string($_POST['abstract']);
$name=mysql_real_escape_string($_POST['name']);
$tag=mysql_real_escape_string($_POST['tag']);
$subject=mysql_real_escape_string($_POST['subject']);
$year=mysql_real_escape_string($_POST['year']);
$link=mysql_real_escape_string($_POST['link']);

//$db_host = "localhost";
//$username = "root";
//$password = "9670";
//$db_name = "dor";

// Connect to server and select database.
$db_con = mysql_connect($db_host, $username, $password);
$result = mysql_select_db($db_name, $db_con);
// update data in mysql database 
$sql="UPDATE $tbl_name SET title='$title', abstract='$abstract', name='$name', link='$link', tag='$tag' ,year='$year', subject='$subject'
WHERE id='$id'";
$result=mysql_query($sql,$db_con);

// if successfully updated. 
if($result){
//echo "<script>alert(You successfully updated ID: $id)</script>";
echo "<BR>";
//echo "<a href='viewdata.php'>View result</a>";
header("location:../view/viewpublications.php");

}

else {
echo "ERROR";
}

?>