 <?php
require('func.php');


$tb_name="template";
$query="SELECT * FROM $tb_name WHERE id='1'";
$main_rows=getDB($tb_name,$query);



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Map</title>
<?php echo $main_rows['head']?>
</head>

<body  dir="ltr" >
	<?php
			editable("map");

	?>
     <div class="wrapper" >
        <div id="topmenu" class="topmenu">

<?php echo $main_rows['header']?>

<?php echo $main_rows['topbar']?>
  
		    <div id="intro">
	                 <ol class="breadcrumb">
	                    <li><a href="Default.html">Home</a>
	                    </li>
	                    <li class="active">Map</li>
	                </ol>
	             <img src="img/campusMap.jpg"width="90%" height="90%" />

	         </div>
			   
     
<?php echo $main_rows['footer'];?>
   
			<?php echo $main_rows['copyright'];?>



      </div>
         </div>
</body>

</html>
