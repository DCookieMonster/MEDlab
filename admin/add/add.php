<?php
require('../_con.php');
$con=mysqli_connect("$db_host", "$username", "$password","site_db");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$title = mysqli_real_escape_string($con, $_POST['title']);
$description = mysqli_real_escape_string($con, $_POST['description']);
$keywords = mysqli_real_escape_string($con, $_POST['keywords']);
$links = mysqli_real_escape_string($con, $_POST['links']);
$query = "SELECT MAX(id) FROM search"; 



//$sql="INSERT INTO dor (id,title, description, keywords,link)
//VALUES ('$id','$title', '$description', '$keywords','$links')";

$sql="INSERT INTO search (title, description, keywords,link)
VALUES ('$title', '$description', '$keywords','$links')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "'$title' was added";
header("location:../view/viewsearch.php");
mysqli_close($con);
?>

