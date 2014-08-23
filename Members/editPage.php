 <?php

require('../admin/_con.php');

$db_name = "cms"; //DB name
$tbl_name="about"; // Table name 


$tb_name="about";
$title=mysqli_real_escape_string($_POST['title']);
$content=$_POST['content'];
$con=addslashes($content);
//$con=mysqli_real_escape_string($content);




$query="UPDATE $tb_name SET content=\"$con\"  WHERE tag=\"$title\"";
$db_con = mysqli_connect($db_host, $username, $password,$db_name);
$result=mysqli_query($db_con,$query);

// if successfully updated. 
if($result){
//echo "<script>alert(You successfully updated ID: $id)</script>";
echo "wow";
//echo "<a href='viewdata.php'>View result</a>";
header("location:mem.php?tag=$title");
}

else {
echo "ERROR";
}

?>


