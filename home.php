<?php 
require_once("Include/db.php");
$db=new DataManager();
session_start();

    if (array_key_exists("User", $_SESSION)&& $_SESSION['ROLE']=='USER')
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
<title>CARE GROUP | HOME</title>
<link href="Style/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="main_container">
	<div class="header">
    	<div id="logo"><a href="home.php"><img src="Style/images/logo.png" alt="" title="" width="162" height="54" border="0" /></a></div>
    
    	<div class="right_header">
        	
            <div class="top_menu">
            <h3>Welcome  <span class="dark_blue"><?php echo $user;?></span></h3>
            <h4><a href="userProfile.php">Edit Profile</a></h4>
            
            </div>
        
            <!--<div id="menu">
                <ul>                                              
                    <li><a class="current" href="#" title="">Home</a></li>
                    <li><a href="#" title="">My Profile</a></li>
                    <li><a href="#" title="">Appointments</a></li>
                    <li><a href="#" title="">My Doctors</a></li>
                </ul>
            </div>-->
        
        </div>
    
    </div>
    
    
    <div id="middle_box">
    	<div class="middle_box_content"><img src="Style/images/banner_content.jpg" alt="" title="" /></div>
    </div>
    
    
    <div class="pattern_bg">
    
    	<div class="pattern_box">
            <div class="pattern_box_icon"><img src="Style/images/icon1.png" alt="" title="" width="70" height="112" /></div>
            <div class="pattern_content">
            <h1><span class="blue">Diesases, Preventions & Cure </span></h1>
            <p class="pat">Read articles on helath tips to find information on common dieseases, their prevention as well as cure.</p>
            </div>
        </div>
        
        
    	<div class="pattern_box">
            <div class="pattern_box_icon"><img src="Style/images/icon2.png" alt="" title="" width="70" height="112" /></div>
            <div class="pattern_content">
            <h1><span class="blue"> Latest Medical News</span></h1>
            <p class="pat">Seven, which provides great value to the business is a medical-office management software package.
             Please download the Trial Edition and check specific regulations for your country before buying the application. </p>
            </div>
        </div>        
        
    
    </div>
    
    <div id="main_content">
    
 			<div class="box_content">
					<div class="box_title">
                    	<div class="title_icon"><img src="Style/images/mini_icon2.gif" alt="" title="" /></div>
                        <h2>Search <span class="dark_blue"> Doctors</span></h2>
                    </div>
                    
                    <div class="box_text_content">
                    	<img src="Style/images/checked.gif" alt="" title="" class="box_icon" />
                        <div class="box_text">
                          <p>We have doctors from all over the world and from different expertise in our database.</p>
                          <p>You can serch doctors based on location and/or speciality here.</p>
<p>&nbsp;</p>
</div>
                        <a href="searchDoctors.php" class="details">click</a>
                    </div>

                    <div class="box_text_content"></div>
	
            </div>
	
            </div>
            
            
 			<div class="box_content">
					<div class="box_title">
                    	<div class="title_icon"><img src="Style/images/mini_icon2.gif" alt="" title="" /></div>
                        <h2>Health <span class="dark_blue"> Tips</span></h2>
                    </div>
                    
                    <div class="box_text_content">
                    	<img src="Style/images/checked.gif" alt="" title="" class="box_icon" />
                        <div class="box_text">
                          <p>Health tips are articles written by reknowned medical expertise and publish on Care Group's website..</p>
                          <p>It covers all areas releting to the human body</p>
<p>&nbsp;</p>
</div>
                        <a href="viewContents.php" class="details">click</a>
                    </div>

                    <div class="box_text_content"></div>
	
            </div>            
            
            
  			<div class="box_content">
					<div class="box_title">
                    	<div class="title_icon"><img src="Style/images/mini_icon3.gif" alt="" title="" /></div>
                        <h2>View <span class="dark_blue">Appointments</span></h2>
                    </div>
                    
                    <div class="box_text_content">
                    	<img src="Style/images/checked.gif" alt="" title="" class="box_icon" />
                        <div class="box_text">
                          <p>Your can serch for doctors within your location as well as book an appointment with him/her</p>
                          <p>. </p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                        </div>
                        <a href="viewAppointment.php" class="details">click</a>
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
