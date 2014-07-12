 <?php
require('func.php');
$tb_name="Pages";
$query="SELECT * FROM $tb_name WHERE title=\"index\"";
$row=getDB($tb_name,$query);

$tb_name="template";
$query="SELECT * FROM $tb_name WHERE id='1'";
$main_rows=getDB($tb_name,$query);



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Med lab</title>
<?php echo $main_rows['head']?>
</head>

<body  dir="ltr" >
	<?php
			editable("index");

	?>
     <div class="wrapper" >
        <div id="topmenu" class="topmenu">

<?php echo $main_rows['header']?>

<?php echo $main_rows['topbar']?>
  
		      <?php echo stripslashes($row['content']); ?>
			   
     
<?php echo $main_rows['footer'];?>
   
			<?php echo $main_rows['copyright'];?>



      </div>
         </div>
</body>

</html>
