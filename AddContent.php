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
			if(empty($_POST['name']) || empty($_POST['headline']) || empty($_POST['ctext']) || empty($_POST['author']))
			{				
				$isValid=true;
				$msg="Please Fill in All Fields";	
			}
			else
			{
				$db->insertContent($_POST['name'],$_POST['headline'],$_POST['ctext'],$_POST{'author'});
				$isValid=true;
				$msg="Content Published Sucessfully";				
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
<title>Add Content</title>
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
                    <li><a href="viewContents.php" title="">Contents</a></li>
                </ul>
      </div>
        
    </div>
    
  </div>
	
    <div class="pattern_bg1">
   <marquee> <h1><font size="+6">CARE GROUP, MEDICAL SERVICE AT YOUR FINGER TIP</font></h1></p></marquee>
  </div>
    <div id="main_content">
    <br/>
    <p><font size="+3">ADD SITE CONTENTS</font></p>
    <div id="programMenu">
    <?php
	  if($isValid)
		echo $msg;
		echo"<br/><br/>";
    ?>
    
    <form action="AddContent.php" method="POST">
    <ul>
    	<li>Title</li>
        <li><input name="name" type="text" size="35" placeholder="Content Title"></li>
      	<br/>
        <li>Author</li>
        <li><input name="author" type="text" size="35" placeholder="Content Title"></li>
      	<br/>
        <li>HeadLine</li>
        <li><input name="headline" type="text" size="60" placeholder="Content Headline"></li>
        <br/>
         <li>Content Text</li>
        <li><textarea name="ctext" cols="90" rows="40" placeholder="Content Information"></textarea></li>
        <br/>
        <li><input type="submit" value="PUBLISH"></li>
    </ul>
    </form>
      <div id="controlmenu">
   	  <ul>
        	<li><a href="#">Add Content</a></li>
        	<li><a href="viewContents.php">View Contents</a></li>
	        <!--<li><a href="Locations.php">Delete </a></li> -->           
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