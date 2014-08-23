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
	<title>Search</title>
<?php echo $main_rows['head']?>
</head>

<body  dir="ltr" >
	<?php
			editable("search");

	?>
     <div class="wrapper" >
        <div id="topmenu" class="topmenu">

<?php echo $main_rows['header']?>

<?php echo $row['topbar']?>
        <!-- ####################################################################################################### -->
      <div id="intro">

		         <?php
		$input = $_GET['input'];//Note to self $input in the name of the search feild
		$terms = explode(" ", $input);
		$query = "SELECT * FROM search WHERE ";
		$query_pub="SELECT * FROM Publications WHERE ";
		$i=0;
		// connecting to our mysql database
		require('admin/_con.php');
		$db_con=mysqli_connect($db_host, $username, $password,"site_db");
		
		foreach ($terms as $each){
			$i++;
            $eacht = mysqli_real_escape_string($db_con,$each);
			if ($i == 1){
				$query .= "keywords LIKE '%$eacht%' ";
                $query_pub .= "abstract LIKE '%$eacht%' OR title LIKE '%$eacht%' ";
}
			else{
				$query_pub .= "OR abstract LIKE '%$eacht%' OR title LIKE '%$eacht%' ";
                $query .= "OR keywords LIKE '%$eacht%' ";
			}
		}
		$flag=true;

		
		$query = mysqli_query($db_con,$query);
		$numrows = mysqli_num_rows($query);

		if ($numrows > 0){
			
			while ($row = mysqli_fetch_assoc($query)){
				$id = $row['id'];
				$title = $row['title'];
				$description = $row['description'];
				$keywords = $row['keywords'];
				$link = $row['link'];
				echo "<h2><a href='$link'>$title</a></h2>
				$description<br /><br />";

			}
		
		}
		else
			$flag=false;
			
	
		$query_pub =  mysqli_query($db_con,$query_pub);
		$numrows = mysqli_num_rows($query_pub);

		if ($numrows > 0){
			while ($row = mysqli_fetch_assoc($query_pub)){
				$title = $row['title'];
				$abstract = $row['abstract'];
				$link = $row['link'];
				if ($link!=NULL){
				echo "<h2><a href='$link' target=\"_blank\">$title</a></h2>
				$abstract<br /><br />";}
				else {
					echo "<h2><a href='#' onClick=\"NullFunc()\">$title</a></h2>
					$abstract<br /><br />";
				}

			}
		
		echo"	<script>
function NullFunc() {
alert(\"Sorry, This publication is not available.\");
}
</script>";
		}
		else{
			if ($flag==false)
			echo "<p style='font-size:18px'>No results found for \"<b>$input</b>\"</p>";
		}
		// disconnect
		mysqli_close($db_con);
	?>
          </div>

		                    
          <!-- ####################################################################################################### -->
		<?php echo $main_rows['footer'];?>

					<?php echo $main_rows['copyright'];?>



		      </div>
		         </div>
		</body>

		</html>
