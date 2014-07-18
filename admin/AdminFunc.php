<?php
 function getDB ($tb_name,$query){
	  // connection parameters
	$db_host = "localhost";
	$username = "root";
	$password = "9670";
	$db_name = "cms";

	// connection variables + connection to mysql and db
	$db_con = mysql_connect($db_host, $username, $password);
	$result = mysql_select_db($db_name, $db_con);

	$result = mysql_query($query, $db_con);
	// successful result

	return mysql_fetch_array($result);
	
} 

function editable($title){
	// Check if session is not registered, redirect back to main page. 
	// Put this code in first line of web page. 
	session_start();

	//if(!session_is_registered($myusername)){
	if (isset($_SESSION['myusername'])){
		echo '      <div id="topnav" style="position:fixed; z-index:100;" >
                    <ul>
                        <li ><a href="editable.php?title='.$title.'" target="_top">edit</a></li>
	<li><a href="admin/dash.php">dashboard	</a></li>
                        <li><a href="admin/logout.php">logout</a></li>
						
                      </ul>
                </div>
       <div class="clear"></div>';
			}
	
}


?>