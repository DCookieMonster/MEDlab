<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Med-Leb</title>

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
					  <td><h1 style="color: orangered; width: 523px;"><a href="/Default.html">Medical Informatics</a></h1>
                    <p>Research Center</p></td> 
					</tr>
					</table>
                    
                </div>
                <br>

            </div>
            <!-- ####################################################################################################### -->
            <div id="topbar">
                <div class="fl_left">
                    <form action="./search.php" method="post">
                        <div>
                            <br/>
                            <input type="text" name="input" value="<?php echo $_GET['input']; ?>" />
                            <input type="submit" name="go" id="go" value="GO" />
                        </div>
                    </form>
                </div>
                <div id="topnav">
                    <ul>
                        <li><a href="Default.html">Home</a></li>
                        <li ><a href="about.html">about</a></li>
                        <li><a href=" Publications.html"> Publications </a></li>
                        <li><a href="#">DropDown</a>
                            <ul>
                                <li><a href="#">Link 1</a></li>
                                <li><a href="#">Link 2</a></li>
                                <li><a href="#">Link 3</a></li>
                            </ul>
                        </li>
                        <li class="last"><a href="#">A Long Link Text</a></li>
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
		$query = "SELECT * FROM dor WHERE ";
		$i=0;
		
		foreach ($terms as $each){
			$i++;
			if ($i == 1)
				$query .= "keywords LIKE '%$each%' ";
			else
				$query .= "OR keywords LIKE '%$each%' ";
		}
		
		// connecting to our mysql database
		mysql_connect("localhost", "root", "9670");
		mysql_select_db("dor");
		
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
			echo "No results found for \"<b>$input</b>\"";
		
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
                                      <a href="Default.html" target="mainFrame" style="color: white; background-color: #663366">Home Page</a> | <a href="ResearchProjects.htm" target="mainFrame" style="color: white; background-color: #663366">Research 
                                                                                                                                                    Projects</a> | <a href="Pablication.htm" target="mainFrame" style="color: white; background-color: #663366">Publications</a>
                                      | <a href="../MembersHomePages/GroupMember.htm" target="mainFrame" style="color: white; background-color: #663366">Research 
                                            Members</a> | <a href="UsefulLinks.htm" target="mainFrame" style="color: white; background-color: #663366">Useful Links</a>
                                      | <a href="map.html" style="color: white; background-color: #663366">Map</a>
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
