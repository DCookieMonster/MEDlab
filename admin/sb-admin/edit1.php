<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="9670"; // Mysql password 
$db_name="dor"; // Database name 
$tbl_name="dor"; // Table name

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// get value of id that sent from address bar
//$id=$_GET['edit'];
$idtmp=$_GET['edit'];
$id=mysql_real_escape_string($idtmp);

// Retrieve data from database 
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);
?>

    <link rel="stylesheet" type="text/css" href="experiment-style.css" />
    <link rel="stylesheet" type="text/css" href="TSP.css" />
<table align="center" width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<form name="form1" method="post" action="update_ac.php">
<td>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
<tr>
<td>&nbsp;</td>
<td colspan="3" align="center"><strong >Update data in mysql</strong> </td>
</tr>
<tr>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
</tr>
<tr>
<td align="center">&nbsp;</td>
<td align="center"><strong>title</strong></td>
<td align="center"><strong>description</strong></td>
<td align="center"><strong>keywords</strong></td>
<td align="center"><strong>link</strong></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="center">
<input  type="text" id="title" name="title" value="<?php echo $rows['title']; ?>">
</td>
<td align="center">
<input name="description" type="text" id="description" value="<?php echo $rows['description']; ?>" size="15">
</td>
<td>
<input name="keywords" type="text" id="keywords" value="<?php echo $rows['keywords']; ?>" size="15">
</td>
<td>
<input name="link" type="text" id="link" value="<?php echo $rows['link']; ?>" size="15">
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>
<input name="id" type="hidden" id="id" value="<?php echo $rows['id']; ?>">
</td>
<td align="center">
<input type="submit" name="Submit" value="Submit">
</td>
<td>&nbsp;</td>
</tr>
</table>
</td>
</form>
</tr>
</table>

<?php
// close connection 
mysql_close();
?>