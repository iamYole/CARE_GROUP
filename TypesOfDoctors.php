<?php 
require_once("Include/db.php");
$db=new DataManager();
session_start();

    if (array_key_exists("User", $_SESSION) && $_SESSION['ROLE']=='ADMIN')
    {       
        $isValid=false;
		$user=$_SESSION['User'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
			
		}
     }
    else
    {
        header('Location: login.php' );
    }
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Types Of Doctors</title>
<link href="Style/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="main_container">
  <div class="header">
    	<div id="logo"><a href="index.php"><img src="Style/images/logo.png" alt="" title="" width="162" height="54" border="0" /></a></div>
    
   	<div class="right_header">
        	
      <div class="top_menu">
        <h3>Welcome  <span class="dark_blue"><?php echo $user;?></span></h3>
            <h4><a href="changePW.php">Reset Password</a></h4>
      </div>
        
      <div id="menu">
                <ul>                                              
                     <li><a href="AdminHome.php" title="">Home</a></li>
                    <li><a href="ViewDoctors.php" title="">Doctors</a></li>
                    <li><a class="current" href="Locations.php" title="">Locations</a></li>
                    <li><a href="Paitents.php" title="">Paitents</a></li>
                    <li><a href="AddContent.php" title="">Contents</a></li>
                </ul>
      </div>
        
    </div>
    
  </div>
	
    <div class="pattern_bg1">
   <marquee> <h1><font size="+6">CARE GROUP, MEDICAL SERVICE AT YOUR FINGER TIP</font></h1></p></marquee>
  </div>
    <div id="main_content">
     <br/>
    <table width="540" align="center">
      <tr align="center">
        <td width="117"><h2><a href="Locations.php"><strong>Add City</strong></a></h2></td>
        <td width="133"><h2><a href="ViewCities.php"><strong>View Cities</strong></a></h2></td>
        <td width="125"><h2><a href="Locations.php"><strong>Add Speciality</strong></a></h2></td>
        <td width="145"><h2><a href="TypesOfDoctors.php"><strong>View Specialities</strong></a></h2></td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <div id="programMenu">    
      <table width="830" border="0" align="center">
        
        <tr bgcolor="#E8EFF2">
          <th width="184"><strong>Type Of Doctor</strong></th>
          <th width="636"><strong>Description</strong></th>
        </tr>  
        <?php
			$result=$db->getSpecs();
			while($row=mysql_fetch_array($result))
			{
			echo '       
			  <tr align="center" valign="baseline">
				<td>'.$row[0].'</td>
				<td>'.$row[1].'</td>
			  </tr>';
			}
		?>
      </table>
    </div>
      
    </div>
    <div class="clear"></div>    
</div>     
            
            
     <div id="footer">
     	<div class="copyright">
        <img src="Style/images/footer_logo.gif" alt="" title="" />
        </div>
        <div class="center_footer">&copy;care group 2008. All Rights Reserved</div>
   	   <div class="footer_links">
        <a href="http://csstemplatesmarket.com"><img src="Style/images/csstemplatesmarket.gif" alt="csstemplatesmarket" title="csstemplatesmarket" border="0" /></a><br />
   	   </div>
    
    
    </div>


</div>
</body>
</html>