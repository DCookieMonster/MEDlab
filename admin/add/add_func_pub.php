<?php
$con=mysqli_connect("localhost","root","9670","site_db");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$tbl_name="publications";
// escape variables for security
$tag = mysqli_real_escape_string($con, $_POST['tag']);
$name = mysqli_real_escape_string($con, $_POST['name']);
$title = mysqli_real_escape_string($con, $_POST['title']);
$abstract = mysqli_real_escape_string($con, $_POST['abstract']);
$link = mysqli_real_escape_string($con, $_POST['link']);

$sql="INSERT INTO $tbl_name (name,tag, title, abstract, link)
VALUES ('$name','$tag','$title', '$abstract','$link')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "'$title' was added";
header("location:../view/view".$tbl_name.".php");
mysqli_close($con);
?>

