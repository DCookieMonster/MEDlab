 <?php

require('admin/_con.php');

$db_name = "cms"; //DB name
$tbl_name="Pages"; // Table name 

$db_con = mysqli_connect($GLOBALS['db_host'],$GLOBALS['db_username'],$GLOBALS['db_pass'],$db_name);

$tb_name="Pages";
$title=mysqli_real_escape_string($db_con,$_POST['title']);
$content=$_POST['content'];
$con=addslashes($content);
//$con=mysqli_real_escape_string($content);




$query="UPDATE $tb_name SET content=\"$con\"  WHERE title=\"$title\"";
$result = mysqli_query($db_con,$query );

// if successfully updated. 
if($result){
//echo "<script>alert(You successfully updated ID: $id)</script>";
echo "wow";
//echo "<a href='viewdata.php'>View result</a>";
header("location:$title.php");
}

else {
echo "ERROR";
}

?>


