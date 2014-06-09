<!-- Place inside the <head> of your HTML -->
<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>
<?php
//logout after $timeoff in sec

    
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="9670"; // Mysql password 
$db_name="site_db"; // Database name 
$tbl_name="about"; // Table name

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// get value of id that sent from address bar
$id=$_GET['edit'];


// Retrieve data from database 
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);


echo'
<form method="post" action="./editor.php">
    <textarea id="dor" name="dor">'. $rows['text'].'</textarea>
	<button id="go"> go</button>
</form>';

// close connection 
mysql_close();
?>