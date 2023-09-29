<?php  
require_once("Include/db.php");
$db=new DataManager();

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {   
		  if(empty($_POST['userid']) || empty($_POST['password']))
		  {
			  $notValid=true;
			  $msg="Enter your Username and/or Password";
		  } 
		  else
		  {
			   $result=$db->authenticateAdmin($_POST['userid'], $_POST['password']);

			  if(mysql_num_rows($result) > 0 )
			  { 
				  session_start();        
				  $_SESSION["User"]="ADMINISTRATOR";  
				  $_SESSION['ROLE']="ADMIN";      
				  $_SESSION['ID']=$_POST['userid'];
				  header('Location: AdminHome.php' );  
			  }
			  else
			  {
				  $notValid=true;
				  $msg="Invalid User And/Or Password";
			  } 
		  }         
                         
    }
	   
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CARE GROUP | Admin Login</title>
<link rel="stylesheet" type="text/css" href="Style/style.css" media="screen" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" href="iecss.css" />
<![endif]-->
</head>

<body>
<div id="main_container">
  <div class="header">
    	<div id="logo"><a href="index.php"><img src="Style/images/logo.png" alt="" title="" width="162" height="54" border="0" /></a></div>
    <div class="right_header">
        	
            <div class="top_menu">
            <a href="login.php" class="login">login</a>
            <a href="#" class="sign_up">signup</a>
            </div>    
        </div>
<div class="right_header">
        	
        <div class="top_menu"></div>
   	  </div>
    
    </div>
    <div class="pattern_bg1">
   <marquee> <h1><font size="+6">CARE GROUP, MEDICAL SERVICE AT YOUR FINGER TIP</font></h1></p></marquee>
    	
        </div>
  <div id="main_content">
    <div align="center"><font size="+1">ADMIN LOGIN</font></div>
		  <div class="box_content2">
					<div class="box_title">
                    	<div class="title_icon"></div>
                        <h2><span class="dark_blue">Sign Up</span></h2>
                         </div>
                    
                    <div class="box_text_content">
                    <?php
                        if($notValid)
                        echo $msg;
                    ?>
                    </div>

                    <div class="box_text_content">
                    <form method="post">
                        <ol>
                            <li>
                            	<label for="userid"> User ID :</label> 
                            	<input type="text" name="userid" id="userid" autofocus size="25">
                            </li>  
                            <li>
                            	<label for="password"> Password:</label> 
                            	<input type="password" name="password" id="password" size="25">
                            </li>                             
                            <li><p/></li> 
                            <li>
                            	<input type="submit" value="Login">
                            </li>
                        </ol>                      
                    </form>
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

