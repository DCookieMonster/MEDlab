<?php
$con=mysqli_connect("localhost","root","9670","cms");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$tbl_name="aboutPic";
// escape variables for security
$name = mysqli_real_escape_string($con, $_POST['name']);
$path = mysqli_real_escape_string($con, $_POST['path']);

$sql="INSERT INTO $tbl_name (img,name)
VALUES ('$path','$name')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "'$title' was added";
mysqli_close($con);
header("location:../../about.php");

?>

