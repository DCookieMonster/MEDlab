<?php
 function getDB ($tb_name,$query){
	  // connection parameters
	require('admin/con.php');

	$db_name = "cms";

	// connection variables + connection to mysql and db
	$db_con = mysql_connect($db_host, $username, $password);
	$result = mysql_select_db($db_name, $db_con);

	$result = mysql_query($query, $db_con);
	// successful result

	return mysql_fetch_array($result);
	
} 

function CheckIfCanBeEdit ($title){
	  // connection parameters
	require('admin/con.php');

	$db_name = "cms";
	$tb_name = "Pages";


	// connection variables + connection to mysql and db
	$db_con = mysql_connect($db_host, $username, $password);
	$result = mysql_select_db($db_name, $db_con);
	$tag=mysql_real_escape_string($title);


	// page variables
	$query = "SELECT * FROM $tb_name WHERE title='$tag'" ;
	$result = mysql_query($query, $db_con);
	// successful result

	$count=mysql_num_rows($result);
	if ($count==1)
		{
		
		return 1;
	}
	return 0;
}

function editable($title){
	// Check if session is not registered, redirect back to main page. 
	// Put this code in first line of web page. 
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	$edit = CheckIfCanBeEdit($title);

	//if(!session_is_registered($myusername)){
	if (isset($_SESSION['myusername']) && $edit==1){
		
		if ($title=="about"){
				echo '      <div id="topnav" style="position:fixed; z-index:100;" >
		                    <ul>
		                        <li ><a href="editable.php?title='.$title.'" target="_top">edit</a></li>
							<li><a href="admin/add/addPic.php">add Picture	</a></li>
							<li><a href="admin/view/viewImage.php">delete Picture	</a></li>
							
								<li><a href="admin/dash.php">dashboard	</a></li>
		                        <li><a href="admin/logout.php">logout</a></li>

		                      </ul>
		                </div>
		       <div class="clear"></div>';
		}
		else{
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
	
}
 function getRuData ($tb_name,$query){
	  // connection parameters
	require('admin/con.php');

	$db_name = "cms";

	// connection variables + connection to mysql and db
	$db_con = mysql_connect($db_host, $username, $password);
	$result = mysql_select_db($db_name, $db_con);

	return mysql_query($query, $db_con);
	// successful result


	
}
function Memeditable($title){
	// Check if session is not registered, redirect back to main page. 
	// Put this code in first line of web page. 
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	//if(!session_is_registered($myusername)){
	if (isset($_SESSION['myusername']))
			if ($_SESSION['myusername']==$title or $_SESSION['myusername']=="admin"){

		echo '      <div id="topnav" style="position:fixed; z-index:100;" >
                    <ul>
                        <li ><a href="editable.php?title='.$title.'" target="_top">edit</a></li>';

						if ($_SESSION['myusername']=="admin")
									echo '<li><a href="../admin/dash.php">dashboard	</a></li>';

                      echo'	  <li><a href="../admin/logout.php">logout</a></li>
						
                      </ul>
                </div>
       <div class="clear"></div>';
}
			}
	
function Pubeditable(){
				// Check if session is not registered, redirect back to main page. 
				// Put this code in first line of web page. 
				if (session_status() == PHP_SESSION_NONE) {
				    session_start();
				}

				//if(!session_is_registered($myusername)){
				if (isset($_SESSION['myusername']) && $_SESSION['myusername']=="admin")
					{

					echo '      <div id="topnav" style="position:fixed; z-index:100;" >
			                    <ul>
			                        <li ><a href="admin/view/viewPublications.php" target="_blank">edit</a></li>
 										<li ><a href="admin/add/addpublications.php" target="_blank">add</a></li>
										<li ><a href="admin/view/viewpublications.php" target="_blank">delete</a></li>
 							
										<li><a href="../admin/dash.php">dashboard	</a></li>

			                        <li><a href="../admin/logout.php">logout</a></li>

			                      </ul>
			                </div>
			       <div class="clear"></div>';
			}
						}


?>