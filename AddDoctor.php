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
			if(empty($_POST['docid']) || empty($_POST['location']) || empty($_POST['spec']))
			  {
				  $isValid=true;
				  $msg="Fill in All Fields Correctly";
			  } 
			  else
			  {
				  $isValid=true;
				  $db->addAdoctor($_POST['docid'],$_POST['location'],$_POST['spec']);
				  $msg="Record Saved Sucessfully !!!";	  
			  }
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
<title>CARE GROUP | Add Doctor</title>
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
                    <li><a class="current" href="#" title="">Doctors</a></li>
                    <li><a href="Paitents.php" title="">Locations</a></li>
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
    <p><font size="+3">DOCTOR ID</font></p>
    <div id="programMenu">
    <?php
	  if($isValid)
		echo $msg;
    ?>
    
    <form action="AddDoctor.php" method="POST">
      <table width="393" border="0" cellpadding="8" cellspacing="8">
        
        <tr>
          <th width="137" align="right" bgcolor="#CBCBCB">DOCTOR ID</th>
          <td width="200"><input name="docid" type="text" id="docid" size="25"  placeholder="CGDOC101"></td>
        </tr>        
        <tr>
          <th align="right" bgcolor="#CBCBCB">LOCATION</th>
          <td><select name="location" id="ciyt">
				<?php
                	$result=$db->getLocations();
					while($row=mysql_fetch_array($result))
					{
						echo'<option value='.$row[0].'>'.$row[1].','.$row[2].'</option>';
					}  
				?>
                </select>
          </td>
        </tr>
        <tr>
          <th width="137" align="right" bgcolor="#CBCBCB">SPECAILTY</th>
          <td width="200"><select name="spec" id="location">
          					<?php
							  $result=$db->getSpecs();
							  while($row=mysql_fetch_array($result))
							  {
								  echo'<option value='.$row[0].'>'.$row[0].'</option>';
							  }  
							?>
		  </select></td>
        </tr> 
       <tr>
          <th width="137" align="right" ></th>
          <td width="200"><input type="submit" value="Save"></td>
        </tr> 
      </table>
      </form>
      <div id="controlmenu">
   	  <ul>
        	<!--<li><a href="">Add Doctor</a></li>-->
        	<li><a href="ViewDoctors.php">View Doctors</a></li>
            <li><a href="Locations.php">Add Speciality</a></li>
            <li><a href="Locations.php">Add Location</a></li>
      	</ul>
      </div>
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