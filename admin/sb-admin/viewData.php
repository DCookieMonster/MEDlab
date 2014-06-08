
<?php



// connection parameters
$db_host = "localhost";
$username = "root";
$password = "9670";
$db_name = "dor";


// connection variables + connection to mysql and db
$db_con = mysql_connect($db_host, $username, $password);
$result = mysql_select_db($db_name, $db_con);

// page variables
$query = 'SELECT * FROM dor';
$result = mysql_query($query, $db_con);
echo '<div align="center"><img src="../img/logo-small.png" ></div>';
// successful result
echo '<table border=1 align="center">
    <tr>
    <th>id</th>
    <th>title</th>
    <th>description</th>
    <th>keywords</th>
    <th>link</th>
</tr>';

while ($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['keywords'] . "</td>";
    echo "<td>" . $row['link'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysql_close($db_con);
?>

<html>
<headr>
    <link rel="stylesheet" type="text/css" href="experiment-style.css" />
    <link rel="stylesheet" type="text/css" href="TSP.css" />
    </headr>
    <body >
        <br>
        <br>
        <div align="center">
 <form action="edit.php" action="POST">
     <table aling="center">
         <td>  <input type="text" name="edit"  value="Insert ID&hellip;" onfocus="this.value=(this.value=='insert ID&hellip;')? '' : this.value ;" /></td>
        <td> <input type="submit" name="go" id="go" value="Edit" /> </td>
         </table>
	</form>
            </div>
    </body>
</html>