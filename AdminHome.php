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
<title>CARE GROUP | Admin Home</title>
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
                    <li><a class="current" href="#" title="">Home</a></li>
                    <li><a href="ViewDoctors.php" title="">Doctors</a></li>
                    <li><a href="Locations.php" title="">Locations</a></li>
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
    
 			<div class="box_content">
					<div class="box_title">
                    	<div class="title_icon"><img src="Style/images/mini_icon2.gif" alt="" title="" /></div>
                        <h2>Manage <span class="dark_blue"> Doctors</span></h2>
                    </div>
                    
                    <div class="box_text_content">
                    	<img src="Style/images/checked.gif" alt="" title="" class="box_icon" />
                        <div class="box_text">                        
                          <p>Add, Edit, delete Doctors</p>
                          <p>Modify Doctors Details</p>
                          <p>Add Doctor's Speciallities</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p><br/>
                            <br/>
                          </p>
                      </div>
                    </div>

                    <div class="box_text_content"></div>
	
            </div>
	
  </div>
            
            
 			<div class="box_content">
					<div class="box_title">
                    	<div class="title_icon"><img src="Style/images/mini_icon2.gif" alt="" title="" /></div>
                        <h2>Manage <span class="dark_blue"> Cities</span></h2>
                    </div>
                    
                    <div class="box_text_content">
                    	<img src="Style/images/checked.gif" alt="" title="" class="box_icon" />
                        <div class="box_text">
                          <p>View, Edit, Add and Delete Various Locations of  Medical Personel</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                      </div>
                    </div>

                    <div class="box_text_content"></div>
	
            </div>            
            
            
  			<div class="box_content">
					<div class="box_title">
                    	<div class="title_icon"><img src="Style/images/mini_icon3.gif" alt="" title="" /></div>
                        <h2>Manage <span class="dark_blue">Site's Content</span></h2>
                    </div>
                    
                    <div class="box_text_content">
                    	<img src="Style/images/checked.gif" alt="" title="" class="box_icon" />
                        <div class="box_text">
                          <p>Manage Site's content</p>
                          <p>Add New Medical News</p>
                          <p>Add new Diesease and Preventions</p>
                          <p>Add health Tips</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                        </div>
                    </div>

                    <div class="box_text_content">
                      
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
