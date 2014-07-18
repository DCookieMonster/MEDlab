 <?php
require('func.php');


$tb_name="template";
$query="SELECT * FROM $tb_name WHERE id='1'";
$main_rows=getDB($tb_name,$query);

$tb_name="Pages";
$query="SELECT * FROM $tb_name WHERE id='1'";
$row=getDB($tb_name,$query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Med lab</title>
<?php echo $main_rows['head']?>
</head>

<body  dir="ltr" >

<?php 
editable("err404");
?>
     <div class="wrapper" >
        <div id="topmenu" class="topmenu">

<?php echo $main_rows['header']?>

<?php echo $row['topbar']?>
<br class="clear"/>
  <div align="center">
		  <h1>Sorry,we have an error:</h1>
			   <h4>Page Not Found</h4>
			<p><a href="sendmail.html">Inform us about the problem</a></p>
     </div>
<?php echo $main_rows['footer'];?>
   
			<?php echo $main_rows['copyright'];?>



      </div>
         </div>
</body>

</html>
