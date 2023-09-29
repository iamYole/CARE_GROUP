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
<title>CARE GROUP | Paitents</title>
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
                    <li><a href="Locations.php" title="">Locations</a></li>
                    <li><a class="current" href="#" title="">Paitents</a></li>
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
    <p><font size="+3">All Users</font></p>
    <div id="programMenu">    
      <table width="830" border="0" align="center">
        
        <tr bgcolor="#E8EFF2">
          <th width="102"><strong>User Name</strong></th>
          <th width="124"><strong>FIRST NAME</strong></th>
          <th width="113"><strong>LAST NAME</strong></th>
          <th width="84"><strong>SEX</strong></th>
          <th width="113">MOBILE No.</th>
          <th width="146">EMAIL ADDRESS</th>
        </tr>        
        <?php    
			$result=$db->getPaitents();
			while($row=mysql_fetch_array($result))
			{			  
			  echo '
				<tr align="center" valign="baseline">
				  <td>'.$row['PaitentID'].'</td>
				  <td>'.$row['First_Name'].'</td>
				  <td>'.$row['Last_Name'].'</td>
				  <td>'.$row['Gender'].'</td>
				  <td>'.$row['Mobile_No'].'</td>
				  <td>'.$row['EmailAddy'].'</td>
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