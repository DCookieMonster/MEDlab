<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
     <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta http-equiv="imagetoolbar" content="no" />
    <link rel="stylesheet" href="styles/layout.css" type="text/css" />
    <!-- Add custom CSS here -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
     <div class="wrapper" >
        <div id="topmenu" class="topmenu">
            <!-- ####################################################################################################### -->
         
            <div id="header">
                <div class="fl_left">
					<table style="width:100%">
					<tr>
					  <td>	<img src="img/logo-small.png" width="40" height="70" alt="Med Logo">
					</td>
					  <td><h1 style="color: orangered; width: 523px;"><a href="index.html">Medical Informatics</a></h1>
                    <p>Research Center</p></td> 
					</tr>
					</table>
                    
                </div>
                <br>

            </div>
            <!-- ####################################################################################################### -->
            <div id="topbar">
                <div class="fl_left">
                    <form action="search.php" method="get">
                        <div>
                            <br/>
                           <input type="text" name="input" value="<?php echo $_GET['input']; ?>" />
                            <input type="submit" name="go" id="go" value="GO" />
                        </div>
                    </form>
                </div>
                 <div id="topnav">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li ><a href="about.html">Members</a></li>
                        <li><a href=" Publications.php">Publications</a></li>
                        <li><a href="#">Projects</a>
                            <ul>
                                <li><a href="Projects/OldProjects.html">Old Projects</a></li>
                                <li><a href="Projects/UGProjects.html">Undergraduate Projects</a></li>
                                <li><a href="Projects/NewProjects.html">New Projects</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
       <div class="clear"></div>
            </div>
			<br/>
        </div>
        <!-- ####################################################################################################### -->
      <div id="intro">

		         <?php
		$input = $_GET['input'];//Note to self $input in the name of the search feild
		$terms = explode(" ", $input);
		$query = "SELECT * FROM search WHERE ";
		$query_pub="SELECT * FROM Publications WHERE ";
		$i=0;
		
		foreach ($terms as $each){
			$i++;
            $eacht = mysql_real_escape_string($each);
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
		// connecting to our mysql database
		mysql_connect("localhost", "root", "9670");
		mysql_select_db("site_db");
		
		$query = mysql_query($query);
		$numrows = mysql_num_rows($query);

		if ($numrows > 0){
			
			while ($row = mysql_fetch_assoc($query)){
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
			
		// connecting to our mysql database
		mysql_connect("localhost", "root", "9670");
		mysql_select_db("site_db");
		
		$query_pub = mysql_query($query_pub);
		$numrows = mysql_num_rows($query_pub);

		if ($numrows > 0){
			while ($row = mysql_fetch_assoc($query_pub)){
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
		mysql_close();
	?>
          </div>

		                    
          <!-- ####################################################################################################### -->

          <div id="footer">
              <div>
                  <div align="center">
                      <table width="100%" border="0">
                          <tr>
                              <td height="25" valign="top" bgcolor="#663366">
                                  <p align="center">
                                      <a href="index.html"  style="color: white; background-color: #663366">Home Page</a> | <a href="Projects/NewProjects.html" style="color: white; background-color: #663366">New
                                                                                                                                                    Projects</a> | <a href="Publications.php" style="color: white; background-color: #663366">Publications</a>
                                      | <a href="about.html"  style="color: white; background-color: #663366">Research 
                                            Members</a> | <a href="http://www.bgu.ac.il" target="_blank" style="color: white; background-color: #663366">BGU</a> | <a href="http://www.ise.bgu.ac.il/" target="_blank" style="color: white; background-color: #663366">ISE</a>
                                                                            | <a href="contact.html" style="color: white; background-color: #663366">Contact Us</a>  | <a href="map.html" style="color: white; background-color: #663366">Map</a>
                                  </p>
                              </td>
                          </tr>
                      </table>
                      <p class="bottomMenu">&nbsp;</p>
                  </div>

              </div>

              <!-- ####################################################################################################### -->
              <div id="copyright">
                  <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">BGU</a></p>
                  <br class="clear" />
              </div>
              <!-- ####################################################################################################### -->
              <br class="clear" />
          </div>
      </div>
         </div>
</body>

</html>
