 <?php

$db_host = "localhost";
$username = "root";
$password = "9670";
$db_name = "cms"; //DB name
$tbl_name="Pages"; // Table name 


$tb_name="Pages";
$title=mysql_real_escape_string($_POST['title']);
$content=$_POST['content'];
$con=addslashes($content);
//$con=mysql_real_escape_string($content);




$query="UPDATE $tb_name SET content=\"$con\"  WHERE title=\"$title\"";
$db_con = mysql_connect($db_host, $username, $password);
$result = mysql_select_db($db_name, $db_con);
$result=mysql_query($query,$db_con);

// if successfully updated. 
if($result){
//echo "<script>alert(You successfully updated ID: $id)</script>";
echo "wow";
//echo "<a href='viewdata.php'>View result</a>";
header("location:ugprojects.php");
}

else {
echo "ERROR";
}

?>


