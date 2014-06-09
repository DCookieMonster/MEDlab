
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Publications</title>

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
    <form id="form1" runat="server">
        <div class="wrapper">
            <div id="topmenu">
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
                            <input type="text" name="input"  value="Search the site&hellip;" onfocus="this.value=(this.value=='Search the site&hellip;')? '' : this.value ;" />
                            <input type="submit" name="go" id="go" value="GO" />
                        </div>
                    </form>
                </div>
                <div id="topnav">
                    <ul>
                        <li ><a href="index.html">Home</a></li>
                        <li ><a href="about.html">Members</a></li>
                        <li class="active"><a href=" Publications.html">Publications</a></li>
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
                <!-- Custom CSS for the 'Round About' Template -->
                <link href="styles/style.css" rel="stylesheet" />



                <div class="container">

                    <div class="row wrap"> 

                        <div class="col-lg-12">
                            <h1 class="page-header-top">Publications
                            </h1>
                            <ol class="breadcrumb">
                                <li><a href="index.html">Home</a>
                                </li>
                                <li class="active">Publications</li>
                            </ol>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-10">
<?php
  // connection parameters
$db_host = "localhost";
$username = "root";
$password = "9670";
$db_name = "site_db";
$tb_name = "Publications";

// connection variables + connection to mysql and db
$db_con = mysql_connect($db_host, $username, $password);
$result = mysql_select_db($db_name, $db_con);
$name_tmp =mysql_select_db($db_name, $db_con);
$name_query="SELECT name From $tb_name";
$tag_query ="SELECT tag From $tb_name";
$name_tmp = mysql_query($name_query, $db_con);
$tag_tmp = mysql_query($tag_query, $db_con);

//array for subjects
$subjectArr = array("master");

$flag =true;
$flag_sub=true;
$sub_name="";
$tmp_name="";
while ($row_tmp = mysql_fetch_array($name_tmp)) {
$row_tag = mysql_fetch_array($tag_tmp);
$name=$row_tmp['name'];
$tag=$row_tag['tag'];
if ($name!=$tmp_name){
    $tmp_name=$name;
    $flag =true;
}
// page variables
if ($flag==true){
$sub_query ="SELECT subject From $tb_name WHERE name=\"$name\"";
$sub_tmp = mysql_query($sub_query, $db_con);

// successful result
$i=1;
echo'<div class="panel-group" id="accordion'.$tag.'">';
echo'<h2 class="page-header" id="'.$tag.'"style="font-size: 28px">'.$name.'</h2>';

while ($row_sub = mysql_fetch_array($sub_tmp)){

if ($row_sub['subject']!=NULL and $row_sub['subject']!=$sub_name and in_array($row_sub['subject'].$name,$subjectArr)!=true){
    $sub_name=$row_sub['subject'];
	array_push($subjectArr,$sub_name.$name);
    $flag_sub =true;
}
$query = "SELECT * FROM $tb_name WHERE name=\"$name\" ORDER BY year";
if ($sub_name!="")
$query = "SELECT * FROM $tb_name WHERE name=\"$name\" and subject=\"$sub_name\" ORDER BY year";
$result = mysql_query($query, $db_con);



if ($flag_sub==true){
	  echo'   <div id="'.$sub_name.'">';
	if ($sub_name!="")
		echo'<h4 class="panel-header">'.$sub_name.'</h4>';
while ($row = mysql_fetch_array($result)) {
    echo ' <div class="panel panel-default">
                                    <div class="panel-heading ">
                                        <h4 class="panel-title">';
    echo ' <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion'.$tag.'" href="#collapse'.$row['tag'].$i.'">'.$row['title'].'</a>';
    echo '  </a></h4></div>';
    echo ' <div id="collapse'.$row['tag'].$i.'" class="panel-collapse collapse">
                                        <div class="panel-body">';
    echo $row['abstract'];
    if ($row['link']==null){
    } //if there is not a link
    else{
	echo  "<br>";
        echo '<a target="_blank" href="'.$row['link'].'">PDF file</a>';
    }
    echo '   </div>
                                    </div>
                                </div>';
    $i=$i+1;
}
echo '</div>';
}//if sub

$flag_sub=false;
}//while sub
echo '</div>';
}

    $flag=false;
}
mysql_close($db_con);
?>
     
                                
                                
</div>
                        </div>

                    </div>

                </div>
                <!-- /.container -->

          <!-- ####################################################################################################### -->
          <div id="footer" class="col-lg-12">
              <div>
                  <div align="center"   >
                      <table width="100%" border="0">
                          <tr>
                              <td height="25" valign="top" bgcolor="#663366">
                                  <p align="center">
                                      <a href="index.html"  style="color: white; background-color: #663366">Home Page</a> | <a href="Projects/NewProjects.html" style="color: white; background-color: #663366">New
                                                                                                                                                    Projects</a> | <a href="Publications.html" style="color: white; background-color: #663366">Publications</a>
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
    </form>
    
    
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>
